<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class PagesController extends Controller
{
	public function index()
	{
		return view('beranda');
	}
	public function data_peserta_didik_baru_terkonfirmasi()
	{
		 $data = DB::table('tokenpilihjurusanpeserta')
					    ->join('pesertadidikbaru', 'tokenpilihjurusanpeserta.id_token_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		 $data2 = DB::table('verifiksipersertadidikbaru')
					    ->join('pesertadidikbaru', 'verifiksipersertadidikbaru.id_verifikasi_perserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		return view('pesertakonfirmasi', ['data' => $data, 'data2' => $data2]);	
	}
}
