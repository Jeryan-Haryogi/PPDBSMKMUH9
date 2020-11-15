<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\KontakKamiModel;
use \App\Models\DaftarAkunPesertaModel;
use \App\Models\verifikasiPesertaDidikBaru;
use \App\Models\DataPeriodikPesertaDidikModel;
use \App\Exports\DataKonfirmasiExport;
use \App\Models\ResponseTransaksiModel;	
use \App\Models\PesertadidikbaruModel;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
class AdministratorController extends Controller
{
	public function index()
	{
		if (!session::get('login_akses_admin')) {
    		return redirect('login');
    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_peserta')) {
    		return redirect('login');
    	}
			$title = 'Dashboard / Operator ';
			$datapeserta = PesertadidikbaruModel::get();
			$jumlahpersertadidik = count($datapeserta);
			$dataterverifikasi = verifikasiPesertaDidikBaru::get();
			$jumlahpersertadidikverify = count($dataterverifikasi);
			$sudah_membayar = ResponseTransaksiModel::get();
			$jumlahsudahmembayar = count($sudah_membayar);
		echo view('administrator/thamplate/default');
		echo view('administrator/index', ['datapeserta' => $jumlahpersertadidik, 'dataterverifikasi' => $jumlahpersertadidikverify,'bayaran' => $jumlahsudahmembayar]);
		echo view('administrator/thamplate/footer');
	}
	public function data_operator()
	{	
	if (!session::get('login_akses_admin')) {
    		return redirect('login');
    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_peserta')) {
    		return redirect('login');
    	}
		$data_operator = DaftarAkunPesertaModel::get();
		echo view('administrator/thamplate/default');
	echo view('administrator/data-operator', ['operator' => $data_operator]);
		echo view('administrator/thamplate/footer');
	}
	public function tambah_data_operator(Request $Request)
	
	{
		$validasi = $Request->validate([
			'npwp' => 'required|unique:daftarakunpesertabaru,nisn',
			'nama_lengkap' => 'required',
			'password' => 'required|confirmed|'
		], [
			'npwp.unique' => 'NPWP Sudah Ada',
			'npwps.required' => 'NPWP Harus Diisi',
			'nama_lengkap.required' => 'Nama Lengkap Harus Diisi',
			'password.required' => 'Password Wajib Diisi',
			'password.confirmed' => 'Konfirmasi Password Anda Tidak Sama'
		]);
		DaftarAkunPesertaModel::create([
			'nisn' => htmlspecialchars($Request->npwp),
			'nama_lengkap' => htmlspecialchars($Request->nama_lengkap),
			'role_akses' => 'Operator',
			'password' => password_hash($Request->password, PASSWORD_DEFAULT)
		]);
		return redirect('Administrator/data-operator')->with('status', 'Data Operator Berhasil Di Tambah');
	}
	public function hapus_data_operator($id)
	{
		DaftarAkunPesertaModel::where('id_daftar_akun_peserta', $id)->delete();
		return redirect('Administrator/data-operator')->with('status', 'Data Operator Berhasil Di Hapus');
	}
	public function update_data_operator(Request $Request)
	{
		$validasi = $Request->validate([
			'npwp' => 'required',
			'nama_lengkap' => 'required',
			'password' => 'required|confirmed|'
		], [
			'npwp.unique' => 'NPWP Sudah Ada',
			'npwps.required' => 'NPWP Harus Diisi',
			'nama_lengkap.required' => 'Nama Lengkap Harus Diisi',
			'password.required' => 'Password Wajib Diisi',
			'password.confirmed' => 'Konfirmasi Password Anda Tidak Sama'
		]);
		$id = $Request->id_operator;
		DaftarAkunPesertaModel::where('id_daftar_akun_peserta', $id)->update([
			'nisn' => $Request->npwp,
			'nama_lengkap' => $Request->nama_lengkap,
			'role_akses' => 'Operator',
			'password' => password_hash($Request->password, PASSWORD_DEFAULT)
		]);

		return redirect('Administrator/data-operator')->with('status', 'Data Operator Berhasil Di Ubah');
	}
	public function data_peserta_didik_baru($date)
	{
		if (!session::get('login_akses_admin')) {
    		return redirect('login');
    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_peserta')) {
    		return redirect('login');
    	}
		 $data = DB::table('tokenpilihjurusanpeserta')
					    ->join('pesertadidikbaru', 'tokenpilihjurusanpeserta.id_token_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		echo view('administrator/thamplate/default');
		echo view('administrator/data-peserta-didik-baru', ['data' => $data]);
		echo view('administrator/thamplate/footer');	
	}
	public function hapus_peserta_didik_baru($date, $id)
	{
		PesertadidikbaruModel::where('id_peserta_didik', $id)->delete();
		return redirect('Administrator/ppdb/peserta-didik-baru/'.date('Y').'-'.date('Y',  strtotime('+1 year')))->with('status', 'Data Peserta Berhasil Di Hapus');
	}
	public function data_peserta_didik_baru_terkonfirmasi()
	{
		if (!session::get('login_akses_admin')) {
    		return redirect('login');
    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_peserta')) {
    		return redirect('login');
    	}
	 $data = DB::table('tokenpilihjurusanpeserta')
					    ->join('pesertadidikbaru', 'tokenpilihjurusanpeserta.id_token_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		 $data2 = DB::table('verifiksipersertadidikbaru')
					    ->join('pesertadidikbaru', 'verifiksipersertadidikbaru.id_verifikasi_perserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		echo view('administrator/thamplate/default');
		echo view('administrator/data-perserta-baru-terkonfirmasi', ['data' => $data, 'data2' => $data2]);
		echo view('administrator/thamplate/footer');	
	}
	public function hapus_peserta_didik_baru_konfirmasi($date, $id)
	{
	$data = verifikasiPesertaDidikBaru::where('id_verifikasi_perserta_didik', $id)->get();
	foreach ($data as $key => $value) {
		if ($value['id_verifikasi_perserta_didik'] == $id) {
			 verifikasiPesertaDidikBaru::where('id_verifikasi_perserta_didik', $id)->delete();
		}
	}

	return redirect('Administrator/ppdb/peserta-didik-baru-terkonfirmasi/'.date('Y').'-'.date('Y',  strtotime('+1 year')))->with('status', 'Data Peserta Berhasil Di Hapus');
	}
	public function export_to_excel_konfirmasi()
	{
		 return Excel::download(new DataKonfirmasiExport, 'data-konfirmasi-peserta-didik.xlsx');
	}
	public function pesan_masuk()
	{if (!session::get('login_akses_admin')) {
    		return redirect('login');
    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_peserta')) {
    		return redirect('login');
    	}
		$data  = KontakKamiModel::get();
		echo view('administrator/thamplate/default');
		echo view('administrator/Pesan-masuk', ['data' => $data]);
		echo view('administrator/thamplate/footer');		
	}
	public function view_setting()
	{
		if (!session::get('login_akses_admin')) {
    		return redirect('login');
    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_peserta')) {
    		return redirect('login');
    	}
		$getnisn = session::get('nisn');
		$getnama = session::get('nama_lengkap');
		echo view('administrator/thamplate/default');
		echo view('administrator/setting', ['getnisn' => $getnisn, 'getnama' => $getnama]);
		echo view('administrator/thamplate/footer');	
	
	}
	public function ubah_admin(Request $Request) 
	{
		$validasi = $Request->validate([
			'npwp' => 'required|unique:daftarakunpesertabaru,nisn',
			'password_baru' => 'required'
		]);
		$dataa = DaftarAkunPesertaModel::get();
		foreach ($dataa as $key => $data) {
			if ($data['nama_lengkap'] == $Request->nama_lengkap) {
				DaftarAkunPesertaModel::where('nama_lengkap', $Request->nama_lengkap)->update([
					'nisn' => htmlspecialchars($Request->npwp),
					'nama_lengkap' => htmlspecialchars($Request->nama_lengkap),
					'role_akses' => 'Super Admin'
				]);
				return redirect('Administrator/Setting')->with('status', 'Data Admin Berhasil Di Ubah');

			}else {

				return redirect('Administrator/Setting')->with('status2	', 'Data Admin Tidak Ditemukam');
			}
		}

	}
	public function delete_all_database(Request $Request)
	{
		$data = DaftarAkunPesertaModel::get();
		foreach ($data as $key => $d1) {
			if ($d1['nama_lengkap'] != $Request->nama_lengkap) {
				$ad =  $d1['nama_lengkap'];
				DaftarAkunPesertaModel::where('nama_lengkap', $ad)->delete();
				DB::table('pesertadidikbaru')->delete();
			}
			return redirect('Administrator/Setting')->with('status', 'Data Admin Berhasil Di hapus Semua');
		}
	}
	public function pesan_masuk_request(Request $Request)
	{
		 $data = array('name'=>"Virat Gandhi");
   
      Mail::send('Administrator/htmlpesan-masuk', $data, function($message) {
         $message->to('jeryanharyogi@gmail.com', 'Tutorials Point')->subject
            ('Laravel Basic Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
	}
	public function view_pesan()
	{if (!session::get('login_akses_admin')) {
    		return redirect('login');
    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_peserta')) {
    		return redirect('login');
    	}
		return view('administrator/htmlpesan-masuk');
	}
	public function admin_keluar()
	{
	session_unset();
	session()->flush();
	return redirect('login')->with('status', 'Anda Berhasil Keluar');
	}
}
