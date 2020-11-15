<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

use \App\Models\PesertadidikbaruModel;
use \App\Models\verifikasiPesertaDidikBaru;
use \App\Models\ResponseTransaksiModel;	
class OperatorController extends Controller
{
	public function index()
	{
	if (!session::get('login_akses_operator')) {
		return redirect('login');
	}else if (session::get('login_akses_peserta')) {
		return redirect('Operator/Keluar');
	}else if (session::get('login_akses_admin')) {
    		return redirect('login');
    }

			$title = 'Dashboard / Operator ';
			$datapeserta = PesertadidikbaruModel::get();
			$jumlahpersertadidik = count($datapeserta);
			$dataterverifikasi = verifikasiPesertaDidikBaru::get();
			$jumlahpersertadidikverify = count($dataterverifikasi);
			$sudah_membayar = ResponseTransaksiModel::get();
			$jumlahsudahmembayar = count($sudah_membayar);
		echo  view('operator/thamplate/default', ['title'=> $title]); 
		echo view('operator/index', ['jumlahpersertadidik' => $jumlahpersertadidik,'jumlahpersertadidikverify' => $jumlahpersertadidikverify,'jumlahsudahmembayar' => $jumlahsudahmembayar  ]);
		echo  view('operator/thamplate/footer');
	}
	public function peserta_didik_baru_get()
	{
		if (!session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_peserta')) {
    		return redirect('Operator/Keluar');
    	}else if (session::get('login_akses_admin')) {
    		return redirect('login');
    }

		 $datapeserta = DB::table('tokenpilihjurusanpeserta')
					    ->join('pesertadidikbaru', 'tokenpilihjurusanpeserta.id_token_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		$verifikasi = verifikasiPesertaDidikBaru::get();
		$title = 'Data Perserta Didik Baru / Operator ';
		echo  view('operator/thamplate/default', ['title'=> $title]); 
		echo view('operator/data-peserta-didik', ['datapeserta' => $datapeserta,
		 'verifikasi_data' => $verifikasi]);
		echo  view('operator/thamplate/footer');
	}
	public function verifikasi(Request $Request, $id=NULL)
	{
		if (!session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_peserta')) {
    		return redirect('Operator/Keluar');
    	}else if (session::get('login_akses_admin')) {
    		return redirect('login');
    }
		$value_id = $id;
		if ($value_id == 'belum') {
			echo "Data Belum Di Verifikasi";
		}else {
			$datapesertadidik = PesertadidikbaruModel::where('id_peserta_didik', $id)->get();
			foreach ($datapesertadidik as $key => $gondol) {
				if ($gondol['id_peserta_didik'] == $id) {
					verifikasiPesertaDidikBaru::create([
						'id_verifikasi_perserta_didik' => $gondol['id_peserta_didik'],
						'status_verifikasi' => 'Sudah Terverifikasi',
						'nama_lengkap' => $gondol['nama_lengkap'],
						'nama_panggilan' => $gondol['nama_panggilan'],
						'nisn' => $gondol['nisn'],
						'nis' => $gondol['nis']
					]);
					return redirect('Operator/Peserta-didik-baru')->with('status', 'Anda Berhasil Verifikasi peserta didik baru');
					}
					else {
						abort(406, 'Server Tidak Bisa Menerima Request Yang Tidak Sesuai Dengan Data');
					}
			}
		}
	}
	public function detail_perserta($id)
	{
		if (!session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_peserta')) {
    		return redirect('Operator/Keluar');
    	}else if (session::get('login_akses_admin')) {
    		return redirect('login');
    }

		 $datapeserta = DB::table('tokenpilihjurusanpeserta')
					    ->join('pesertadidikbaru', 'tokenpilihjurusanpeserta.id_token_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->where('id_peserta_didik', $id)
					    ->get();
		 $dataayahpeserta = DB::table('dataayahpesertadidik')
					    ->join('pesertadidikbaru', 'dataayahpesertadidik.id_ayah_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->where('id_peserta_didik', $id)
					    ->get();
		 $dataibupeserta = DB::table('dataibupesertadidik')
					    ->join('pesertadidikbaru', 'dataibupesertadidik.id_ibu_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->where('id_peserta_didik', $id)
					    ->get();
		$dataprestasipeserta = DB::table('dataprestasipesertadidik')
					    ->join('pesertadidikbaru', 'dataprestasipesertadidik.id_prestasi_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->where('id_peserta_didik', $id)
					    ->get();
		$datawali = DB::table('datawalipesertadidik')
					    ->join('pesertadidikbaru', 'datawalipesertadidik.id_wali_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->where('id_peserta_didik', $id)
					    ->get();
		$dataperiodik =  DB::table('dataperiodikpesertadidik')
					    ->join('pesertadidikbaru', 'dataperiodikpesertadidik.id_periodik_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->where('id_peserta_didik', $id)
					    ->get();

		$title = 'Data Perserta Didik Baru / Operator ';
		echo  view('operator/thamplate/default', ['title'=> $title]); 
		echo view('operator/detail-peserta-didik', ['datapeserta' => $datapeserta, 'dataayah' => $dataayahpeserta, 'dataibu' => $dataibupeserta, 'dataprestasi' => $dataprestasipeserta, 'datawali' => $datawali, 'dataperiodik' => $dataperiodik]);
		echo  view('operator/thamplate/footer');
	}
	public function keluar_operator()
	{

		
	session_unset();
	session()->flush();
	return redirect('login')->with('status', 'Anda Berhasil Keluar');
	}
}
