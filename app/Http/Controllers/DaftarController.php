<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\DaftarAkunPesertaModel;
class DaftarController extends Controller
{
	 public function index()
	{
		return view('daftar');
	}
	public function request_daftar(Request $request)
	{
		$validasi = $request->validate([
			'nisn' => 'required|unique:daftarakunpesertabaru,nisn',
			'nama_lengkap' => 'required',
			'password' => 'required|confirmed|'
		], [
			'nisn.unique' => 'NISN Sudah Ada',
			'nisn.required' => 'NISN Harus Diisi',
			'nama_lengkap.required' => 'Nama Lengkap Harus Diisi',
			'password.required' => 'Password Wajib Diisi',
			'password.confirmed' => 'Konfirmasi Password Anda Tidak Sama'
		]);
		DaftarAkunPesertaModel::create([
			'nisn' => $request->nisn,
			'nama_lengkap' => $request->nama_lengkap,
			'role_akses' => 'Peserta Didik Baru',
			'password' => password_hash($request->password, PASSWORD_DEFAULT)
		]);
		return redirect('login')->with('status', 'Akun Berhasil Dibuat');
	}
}
