<?php

namespace App\Exports;
use \App\Models\TokenJurusanModel;
use \App\Models\PesertadidikbaruModel;
use \App\Models\DataAyahPesertadidikModel;
use \App\Models\DataIbuPesertadidikModel;
use \App\Models\DataWaliPesertadidikModel;
use \App\Models\DataPrestasiPesertaDidikBaruModel;
use \App\Models\DataBeasiswaPesertaDidikBaruModel;
use \App\Models\ResponseTransaksiModel;	
use \App\Models\DataPeriodikPesertaDidikModel;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;



class DataKonfirmasiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
    	$data = DB::table('tokenpilihjurusanpeserta')
					    ->join('pesertadidikbaru', 'tokenpilihjurusanpeserta.id_token_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		 $data2 = DB::table('verifiksipersertadidikbaru')
					    ->join('pesertadidikbaru', 'verifiksipersertadidikbaru.id_verifikasi_perserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		$data3 = DB::table('dataayahpesertadidik')
					    ->join('pesertadidikbaru', 'dataayahpesertadidik.id_ayah_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		$data4 = DB::table('dataibupesertadidik')
					    ->join('pesertadidikbaru', 'dataibupesertadidik.id_ibu_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();

		$data5 = DB::table('datawalipesertadidik')
					    ->join('pesertadidikbaru', 'datawalipesertadidik.id_wali_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		$data6 = DB::table('dataprestasipesertadidik')
					    ->join('pesertadidikbaru', 'dataprestasipesertadidik.id_prestasi_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		$data7 = DB::table('databeasiswapesertadidik')
					    ->join('pesertadidikbaru', 'databeasiswapesertadidik.id_beasiswa_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		$data8 = DB::table('dataperiodikpesertadidik')
					    ->join('pesertadidikbaru', 'dataperiodikpesertadidik.id_periodik_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->get();
		return view('administrator.export-data', ['data1' => $data,
		 'data2' => $data2,'data3' => $data3, 'data4' => $data4, 'data5' => $data5, 'data6' => $data6, 'data7' => $data7,'data8' => $data8]);
    }
}
