<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\KontakKamiModel;
use \App\Models\DaftarAkunPesertaModel;
use \App\Models\PesertadidikbaruModel;
class KontakKamiController extends Controller
{
	public function index()
	{
		return view('kontak-kami');
	}
	public function pesan(Request $Request)
	{
		$validasi = $Request->validate([
			'nisn' => 'required|unique:kontakkami,nisn',
			'nama_lengkap' => 'required',
			'email' => 'required|unique:kontakkami,email',
			'pesan' => 'required'
		], [
			'nisn.unique' => "NISN Yang Anda Masukan Sudah Ada",
			"email.unique" => "Email Yang Anda Masukan Sudah Ada",
			"pesan.required" => "Pesan Tidak Boleh Kosong"
		]);
		$dataa = DaftarAkunPesertaModel::get();
		foreach ($dataa as $key => $d1) {
			if ($d1['nisn'] == $Request->nisn) {
			KontakKamiModel::create([
			'nisn' => $Request->nisn,
			'nama_lengkap' => $Request->nama_lengkap,
			'email' => $Request->email,
			'pesan' => $Request->pesan
			]);
			return redirect('kontak-kami')->with('status', 'Pesan Berhasil Dikirim');
			}else {
				return redirect('kontak-kami')->with('status2', 'Nisn Tidak Ada Di Daftar Pendaftaran');
			}
		}

		
	}
}
