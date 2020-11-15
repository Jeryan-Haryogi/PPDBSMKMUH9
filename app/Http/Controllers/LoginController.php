<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\DaftarAkunPesertaModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
    	return view('login');
    }
    public function request_login(Request $request)
    {
    	$validasi = $request->validate([
    		'nisn' => 'required', 
    		'password' => 'required'
    	]);

    	$nisn = DaftarAkunPesertaModel::where('nisn', $request->nisn)->get();
    	$password = DaftarAkunPesertaModel::where('password', $request->password)->get();
    	if ($nisn && $password) {
    		foreach ($nisn as $key => $nisnn) {
    			if ($nisnn['role_akses'] == 'Peserta Didik Baru') {
    				if (Hash::check($request->password, $nisnn['password'])) {
    					session::put('nama_lengkap', $nisnn['nama_lengkap']);
    					session::put('nisn', $nisnn['nisn']);
    					session::put('login_akses_peserta', TRUE);
    					return redirect('peserta/dashboard');
    				}
    			}
    			if ($nisnn['role_akses'] == 'Operator') {
    				if (Hash::check($request->password, $nisnn['password'])) {
    					session::put('nama_lengkap', $nisnn['nama_lengkap']);
    					session::put('nisn', $nisnn['nisn']);
    					session::put('login_akses_operator', TRUE);
    					return redirect('Operator/dashboard');
    				}
    			}
    			if ($nisnn['role_akses'] == 'Super Admin') {
    				if (Hash::check($request->password, $nisnn['password'])) {
    					session::put('nama_lengkap', $nisnn['nama_lengkap']);
    					session::put('nisn', $nisnn['nisn']);
    					session::put('login_akses_admin', TRUE);
    					return redirect('Administrator/dashboard');
    				}
    			}
    		}
    	}
    		return redirect('login')->with('status2', 'NISN atau Password Salah');
    	
    }
}
