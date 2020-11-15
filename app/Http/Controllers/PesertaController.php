<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\TokenJurusanModel;
use \App\Models\PesertadidikbaruModel;
use \App\Models\DataAyahPesertadidikModel;
use \App\Models\DataIbuPesertadidikModel;
use \App\Models\DataWaliPesertadidikModel;
use \App\Models\DataPrestasiPesertaDidikBaruModel;
use \App\Models\DataBeasiswaPesertaDidikBaruModel;
use Illuminate\Support\Facades\Session;

use \App\Models\verifikasiPesertaDidikBaru;
use \App\Models\ResponseTransaksiModel;	
use \App\Models\DataPeriodikPesertaDidikModel;	
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDF;
class PesertaController extends Controller
{
    public function index()
    {
    	if (!session::get('login_akses_peserta')) {
    		return redirect('login');
    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_admin')) {
    		return redirect('login');
    }

    	$title = 'Halaman Dashboard / Pendaftaran Peserta Didik Baru';
    	$title = 'Dashboard / Operator ';
			$datapeserta = PesertadidikbaruModel::get();
			$jumlahpersertadidik = count($datapeserta);
			$dataterverifikasi = verifikasiPesertaDidikBaru::get();
			$jumlahpersertadidikverify = count($dataterverifikasi);
			$sudah_membayar = ResponseTransaksiModel::get();
			$jumlahsudahmembayar = count($sudah_membayar);
    	echo  view('peserta/thamplate/defult', ['tile' => $title,]);
    	echo  view('peserta/index',[ 'datapeserta' => $jumlahpersertadidik, 'bayar' => $jumlahsudahmembayar, 'konfirmasi' => $jumlahpersertadidikverify]);
    	echo  view('peserta/thamplate/footer');
    }
    public function pendaftaran()
    {
    	if (!session::get('login_akses_peserta')) {
    		return redirect('login');
    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_admin')) {
    		return redirect('login');
    }
    $nama_login = session::get('nama_lengkap');
    $title = 'Pengisian Formulir Pendaftaran / Pendaftaran Peserta Didik Baru';
    $get_nisn = session::get('nisn');
    $get_nama_login = PesertadidikbaruModel::where('nisn', $get_nisn)->get();

    	echo  view('peserta/thamplate/defult', ['tile' => $title]);
    	echo  view('peserta/formulir-pendaftaran', ['nama_login' => $get_nama_login, 'namasilogin' => $nama_login, 'nisn_get' => $get_nisn]);
    	echo  view('peserta/thamplate/footer');	
    }
    public function get_token_jurusan($tokenjurusan)
    {
    	$result = TokenJurusanModel::where('jurusan', $tokenjurusan)->limit(1)->orderBy('token_jurusan', 'desc')->get();
    	if ($result) {

    	foreach ($result as $key => $data) {
    	
    		echo $data['token_jurusan']+1;	
    		die();
    	}
    	}
    		if ($tokenjurusan == 'Multimedia' ) {
    			echo "5091";
    		}else if ($tokenjurusan == 'Akuntansi'  ) {
    			echo "4091";
    		}else if ($tokenjurusan == 'Administrasi Perkantoran' ) {
    			echo "2091";
    		}	
    	
    }
    public function get_kabupaten_api($getkabupaten)
    {
    	$curl = curl_init();

			curl_setopt_array($curl, array(
			  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$getkabupaten,
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_ENCODING => "",
			  CURLOPT_MAXREDIRS => 10,
			  CURLOPT_TIMEOUT => 30,
			  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			  CURLOPT_CUSTOMREQUEST => "GET",
			  CURLOPT_HTTPHEADER => array(
			    "key: 1e170fd18b2707c6d1691655e7f21d98"
			  ),
			));

			$response = curl_exec($curl);
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
			  echo "cURL Error #:" . $err;
			} else {
			  $data2 = json_decode( $response, TRUE);
			  if ($data2['rajaongkir']['status']['code'] == 200) {

			  foreach ($data2['rajaongkir']['results'] as $kab) {
			  	 echo " <option value='$kab[city_name]'>$kab[city_name]</option>";
			  }
			  }
			 
			}
			    }
			    public function kirim_data(Request $request)
			    {	
			    	if ($request->Setuju) {
			    	if ($request->hasFile('upload_foto')) {
			    			if ($request->file('upload_foto')->isValid()) {
			    				$validasi = $request->validate([
				    			'nama_lengkap' => 'required',
				    			'nama_panggilan' => 'required',
				    			'upload_foto' => 'required|mimes:jpeg,png|max:1014',
				    			'jenis_kelamin' => 'required',
				    			'nisn' => 'required',
				    			'nis' => 'required|unique:pesertadidikbaru,nis',
				    			'asal_sekolah' => 'required',
				    			'nik' => 'required|unique:pesertadidikbaru,nik',
				    			'tanggal_lahir' => 'required',
				    			'jurusan' => 'required',
				    			'token_jurusasn' => 'required',
				    			'alamat' => 'required',
				    			'perumahan' => 'required',
				    			'rt' => 'required',
				    			'rw' => 'required',
				    			'provinsi' => 'required',
				    			'kabupaten' => 'required',
				    			'kelurahan_desa'=> 'required',
				    			'kecamatan' => 'required',
				    			'kodepos' => 'required',
				    			'transpotasi_sekolah' => 'required',
				    			'jns_tinggal' => 'required',
				    			'no_telp' => 'required',
				    			'no_hp' => 'required',
				    			'email_pribadi'=> 'required|unique:pesertadidikbaru,email_pribadi',
				    			'nama_ayah' => 'required',
				    			'tglahirayah' => 'required',
				    			'perkerjaanayah' => 'required',
				    			'pendidikan_ayah' => 'required',
				    			'penghasilan_ayah' => 'required',
				    			'nama_ibu' => 'required',
				    			'tahun_lahir_ibu' => 'required',
				    			'perkerjaanibu' => 'required',
				    			'pendidikan_ibu' => 'required',
				    			'penghasilan_ibu' => 'required',
				    			'tinggi_badan' => 'required',
				    			'berat_badan' => 'required',
				    			'jarak_tempuh' => 'required',
				    			'waktu_tempuh' => 'required',
				    			'anakkeberapa' => 'required',
				    			'dariberapa' => 'required',
				    			'sodara_kandung' => 'required',
				    			'sodara_tiri'=> 'required',
				    			'sodara_angkat' => 'required',
				    			'Setuju' => 'required'
				    		]);
			    				$extension = $request->upload_foto->extension();
			    				$namepoto = md5($request->upload_foto->getClientOriginalName().uniqid(rand(), TRUE));
			    				 $request->file('upload_foto')->move('peserta/assets/uploadfoto/', $namepoto);
			    				 $kasld = $request->nomer_ujian == NULL ? ' - '  :  $request->nomer_ujian;
			    				 $nomer_pks = $request->pks2 == NULL ? ' - ' :  $request->pks2 ;
			    				 PesertadidikbaruModel::create([
			    				 	'nama_lengkap' => htmlspecialchars($request->nama_lengkap),
			    				 	'nama_panggilan' => htmlspecialchars($request->nama_panggilan),
			    				 	'foto' => $namepoto,
			    				 	'jenis_kelamin' => $request->jenis_kelamin,
			    				 	'nisn' =>htmlspecialchars($request->nisn),
			    				 	'nis' => htmlspecialchars($request->nis),
			    				 	'asal_sekolah' =>htmlspecialchars( $request->asal_sekolah),
			    				 	'nik' => htmlspecialchars($request->nik),
			    				 	'ttgl' => htmlspecialchars($request->tanggal_lahir),
			    				 	'jurusan' =>htmlspecialchars( $request->jurusan),
			    				 	'agama' => htmlspecialchars($request->agama),
			    				 	'kebutuhan_khusus' => htmlspecialchars($request->kebutuhan_khusus),
			    				 	'alamat' => htmlspecialchars($request->alamat),
			    				 	'perumahan' => htmlspecialchars($request->perumahan),
			    				 	'rt' => htmlspecialchars($request->rt),
			    				 	'rw' => htmlspecialchars($request->rw),
			    				 	'provinsi' => htmlspecialchars($request->provinsi),
			    				 	'kabupaten' => htmlspecialchars($request->kabupaten),
			    				 	'kelu_des' => htmlspecialchars($request->kelurahan_desa),
			    				 	'kecamatan' => htmlspecialchars($request->kecamatan),
			    				 	'kodepos' => htmlspecialchars($request->kodepos),
			    				 	'alat_transpotasi' =>htmlspecialchars( $request->transpotasi_sekolah),
			    				 	'jenis_tinggal' => htmlspecialchars($request->jns_tinggal),
			    				 	'no_tlprumah' => htmlspecialchars($request->no_telp),
			    				 	'no_tlppribadi' => htmlspecialchars($request->no_hp),
			    				 	'email_pribadi' => htmlspecialchars($request->email_pribadi),
			    				 	'no_ujian' => htmlspecialchars($kasld),
			    				 	'penerima_pks' => htmlspecialchars($request->pks1),
			    				 	'no_pks' => htmlspecialchars($nomer_pks)
			    				 ]);
			    				 $relasi = PesertadidikbaruModel::where('nisn', $request->nisn)->
			    				 limit(1)->orderBy('nisn', 'desc')->get();
			    				 foreach ($relasi as $key => $relasasi) {
			    				 	// ayaj
			    				 		 DataAyahPesertadidikModel::create([
			    				 	'id_ayah_peserta_didik' => $relasasi['id_peserta_didik'],
                                    'nama_ayah' => $request->nama_ayah,
                                    'tahun_lahir_ayah' => htmlspecialchars($request->tglahirayah),
                                    'kebutuhan_khusus' => htmlspecialchars($request->kebutuhan_khususayah),
                                    'perkerjaan_ayah' => htmlspecialchars($request->perkerjaanayah),
                                    'pendidikan_ayah' => htmlspecialchars($request->pendidikan_ayah),
                                    'penghasilan_ayah' => htmlspecialchars($request->penghasilan_ayah)
                                 	]);
			    				 		 // ibu
			    				 	 DataIbuPesertadidikModel::create([
                                 	'id_ibu_peserta_didik' => $relasasi['id_peserta_didik'],
                                    'nama_ibu' => htmlspecialchars($request->nama_ibu),
                                    'tahun_lahir_ibu' => htmlspecialchars($request->tahun_lahir_ibu),
                                    'kebutuhan_khusus' => htmlspecialchars($request->kebutuhan_khusus_ibu),
                                    'perkerjaan_ibu' => htmlspecialchars($request->perkerjaanibu),
                                    'pendidikan_ibu' => htmlspecialchars($request->pendidikan_ibu),
                                    'penghasilan_ibu' => htmlspecialchars($request->penghasilan_ibu)
                                	 ]);
                                	 // wali
                                	 $nama_wali = $request->nama_wali != NULL ? $request->nama_wali : '-';
                                	 $tahun_lahir_wali = $request->tahun_lahir_wali != NULL ? $request->tahun_lahir_wali : '-';
                                	 $kebutuhan_khusus_wali = $request->kebutuhan_khusus_wali != NULL ? $request->kebutuhan_khusus_wali : '-';
                                	 $perkerjaanwali = $request->perkerjaanwali != NULL ? $request->perkerjaanwali : '-';
                                	 $pendidikan_wali = $request->pendidikan_wali != NULL ? $request->pendidikan_wali : '-';
                                	 $penghasilan_wali = $request->penghasilan_wali != NULL ? $request->penghasilan_wali : '-';
                                	 DataWaliPesertadidikModel::create([
                                 	'id_wali_peserta_didik' => $relasasi['id_peserta_didik'],
                                    'nama_wali' => htmlspecialchars($nama_wali),
                                    'tahun_lahir_wali' =>htmlspecialchars( $tahun_lahir_wali),
                                    'kebutuhan_khusus' => htmlspecialchars($kebutuhan_khusus_wali),
                                    'perkerjaan_wali' =>  htmlspecialchars($perkerjaanwali),
                                    'pendidikan_wali' => htmlspecialchars($pendidikan_wali),
                                    'penghasilan_wali' => htmlspecialchars($penghasilan_wali)
                                 ]); 
                                	 
	                                 // data periodik
	                                 $km_tempuh = $request->km_tempuh == NULL ? '-' : $request->km_tempuh;
	                                 $menit_tempuh = $request->menit_tempuh == NULL ? '-' : $request->menit_tempuh;
	                                 DataPeriodikPesertaDidikModel::create([
	                                 	'id_periodik_peserta_didik' => $relasasi['id_peserta_didik'],
	                                 	'tinggi_badan' => $request->tinggi_badan,
	                                 	'berat_badan' => $request->berat_badan,
	                                 	'jarak_sekolah' => $request->jarak_tempuh,
	                                 	'jarak_lebih_sekolah' => $km_tempuh,
	                                 	'waktu_ke_sekolah' => $request->waktu_tempuh,
	                                 	'waktu_lebih_ke_sekolah' => $menit_tempuh,
	                                 	'anak_ke_berapa' => $request->anakkeberapa,
	                                 	'dari_keberapa' => $request->dariberapa,
	                                 	'kandung' => $request->sodara_kandung,
	                                 	'tiri' =>  $request->sodara_tiri,
	                                 	'angkat' =>  $request->sodara_angkat
	                                 ]);
                                	 // token
	                                 TokenJurusanModel::create([
	                                 	'id_token_peserta_didik' => $relasasi['id_peserta_didik'],
	                                 	'jurusan' => htmlspecialchars($request->jurusan),
	                                 	'token_jurusan'  => htmlspecialchars($request->token_jurusasn)
	                                 ]);
	                                 // data prestasi
	                                    $jenis_lomba = count($request->jenis_prestasi);
	                                 if ($jenis_lomba > 0) {
	                                 	for ($i=0; $i < $jenis_lomba; $i++) { 
	                                 		if (trim($request->jenis_prestasi[$i] != NULL) && trim($request->tingkat[$i] != NULL) && trim($request->nama_prestasi[$i] != NULL) && trim($request->tahun_prestasi[$i] != NULL) && trim($request->penyelenggara != NULL) ) {
	                                 			DataPrestasiPesertaDidikBaruModel::create([
	                                 				'id_prestasi_peserta_didik' => $relasasi['id_peserta_didik'],
	                                 				'jenis_lomba' => $request->jenis_prestasi[$i],
	                                 				'tingkat' => htmlspecialchars($request->tingkat[$i]),
	                                 				'nama_prestasi' => htmlspecialchars($request->nama_prestasi[$i]),
	                                 				'tahun' => htmlspecialchars($request->tahun_prestasi[$i]),
	                                 				'penyelenggara' => htmlspecialchars($request->penyelenggara[$i])
	                                 			]);
	                                 		}else {
	                                 			DataPrestasiPesertaDidikBaruModel::create([
	                                 				'id_prestasi_peserta_didik' => $relasasi['id_peserta_didik'],
	                                 				'jenis_lomba' => "-",
	                                 				'tingkat' => "-",
	                                 				'nama_prestasi' => "-",
	                                 				'tahun' => "-",
	                                 				'penyelenggara' => "-"
	                                 			]);
	                                 		}
	                                 	}
	                                 }

			                                 $jenis_beasiswa = count($request->jenis_beasiswa);
			                                 if ($jenis_beasiswa > 0) {
			                                 	for ($i=0; $i < $jenis_beasiswa; $i++) { 
			                                 		if (trim($request->jenis_beasiswa[$i] != NULL) && trim($request->sumber_beasiswa[$i] != NULL) && trim($request->tahun_mulai[$i] != NULL) && trim($request->tahun_mulai[$i] != NULL) && trim($request->tahun_selesai[$i] != NULL) ) {
			                                 			DataBeasiswaPesertaDidikBaruModel::create([
			                                 				'id_beasiswa_peserta_didik' => $relasasi['id_peserta_didik'],
			                                 				'jenis_beasiswa' => $request->jenis_beasiswa[$i],
			                                 				'sumber_beasiswa' => $request->sumber_beasiswa[$i],
			                                 				'tahun_mulai' => $request->tahun_mulai[$i],
			                                 				'tahun_selesai' => $request->tahun_selesai[$i]
			                                 			]);
				                                 		}else {
				                                 			DataBeasiswaPesertaDidikBaruModel::create([
				                                 				'id_beasiswa_peserta_didik' => $relasasi['id_peserta_didik'],
				                                 				'jenis_beasiswa' => "-",
				                                 				'sumber_beasiswa' => "-",
				                                 				'tahun_mulai' => "-",
				                                 				'tahun_selesai' => "-"
				                                 			]);
			                                 		}
			                                 	}
			                                 }

			    				 }
			    				
                              
                              

                                 return redirect('peserta/formulir-pendaftaran')->with('status', 'Data Berhasil Dikirim!');
			    			}
			    			else {
			    				abort(406,'SERVE TIDAK MENERIMA REQUEST DATA');
			    			}
			    		}else {
			    				 return redirect('peserta/formulir-pendaftaran')->with('status2', 'Anda Belum Memasukan Data Foto');
			    			}
			    	}else {
			    			abort(406,'SERVER TIDAK MEN-SETUJUI DATA PENYETUJIAN');
			    	}
			    }
			    public function cetak_formulir()
			    {
			    	if (!session::get('login_akses_peserta')) {
				    		return redirect('login');
				    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_admin')) {
    		return redirect('login');
    }

				    	$title = 'Halaman Cetak Formulir / Pendaftaran Peserta Didik Baru';
				    	// data ayah
				    	
					    // data token 
					    $nama_session = session::get('nama_lengkap');
					    $nisn_session = session::get('nisn');


					    $data4 = DB::table('tokenpilihjurusanpeserta')
					    ->join('pesertadidikbaru', 'tokenpilihjurusanpeserta.id_token_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->where('nisn', $nisn_session)
					    ->orderBy('id_peserta_didik', 'asc')
					    ->get();

					    foreach ($data4 as $key => $kntl) {

					    	$id = $kntl->id_peserta_didik;
					    	 
					    }
					    $response_transaksi = DB::table('responsetransaksi')->orderBy('order_by_id', 'desc')->get();
					    // // data ibu
					    // $data2 =DB::table('dataibupesertadidik')
					    // ->join('pesertadidikbaru', 'dataibupesertadidik.id_ibu_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    // ->get();
					    // // data wali
					    // $data3 =DB::table('datawalipesertadidik')
					    // ->join('pesertadidikbaru', 'datawalipesertadidik.id_wali_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    // ->get();
					    // // data periodik
					    // $data3 =DB::table('datawalipesertadidik')
					    // ->join('pesertadidikbaru', 'datawalipesertadidik.id_wali_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    // ->get();
					   
				    	$title = 'Halaman Cetak Formulir / Pendaftaran Peserta Didik Baru';

			    	echo  view('peserta/thamplate/defult', ['tile' => $title]);
			    	echo  view('peserta/cetak_formulir', ['data' => $data4, 'response_transaksi' => $response_transaksi ]); 
			    	echo  view('peserta/thamplate/footer');
			    }
			    public function cetak_formulir_aksi($id)
			    {
			    	if (!session::get('login_akses_peserta')) {
				    		return redirect('login');
				    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_admin')) {
    		return redirect('login');
    }
			    		 $update = DB::table('tokenpilihjurusanpeserta')
					    ->join('pesertadidikbaru', 'tokenpilihjurusanpeserta.id_token_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->where('id_token_peserta_didik', $id)
					    ->get();
					    $title = 'Update Pengisian Formulir Pendaftaran / Pendaftaran Peserta Didik Baru';
					    $pdf = PDF::loadView('peserta/cetakk-formulir-pendaftaran', ['jancuk' => $update]);
						return $pdf->download('cetak_peserta_didik.pdf');
			    	// echo  view('peserta/cetakk-formulir-pendaftaran', ['jancuk' => $update]);
			    }
			    public function update_formulir($id)
			    {

			    	if (!session::get('login_akses_peserta')) {
				    		return redirect('login');
				    	}else if (session::get('login_akses_operator')) {
    		return redirect('login');
    	}else if (session::get('login_akses_admin')) {
    		return redirect('login');
    }
			    		 $update = DB::table('tokenpilihjurusanpeserta')
					    ->join('pesertadidikbaru', 'tokenpilihjurusanpeserta.id_token_peserta_didik', '=', 'pesertadidikbaru.id_peserta_didik')
					    ->where('id_token_peserta_didik', $id)
					    ->get();
					    $title = 'Update Pengisian Formulir Pendaftaran / Pendaftaran Peserta Didik Baru';
			    	echo  view('peserta/thamplate/defult', ['tile' => $title]);
			    	echo  view('peserta/update-formulir-pendaftaran', ['update_formulir' => $update]);
			    	echo  view('peserta/thamplate/footer');	
			    }
			    public function update_formulir_request( Request $request,$id)
			    {
			    	if ($request->hasFile('upload_foto')) {
			    		if ($request->file('upload_foto')->isValid()) {
			    			$validate = $request->validate([
			    				'nama_lengkap' => 'required',
				    			'nama_panggilan' => 'required',
				    			'upload_foto' => 'required|mimes:jpeg,png|max:1014',
				    			'jenis_kelamin' => 'required',
				    			'nisn' => 'required',
				    			'nis' => 'required',
				    			'asal_sekolah' => 'required',
				    			'nik' => 'required',
				    			'tanggal_lahir' => 'required',
				    			'jurusan' => 'required',
				    			'token_jurusasn' => 'required',
				    			'alamat' => 'required',
				    			'perumahan' => 'required',
				    			'rt' => 'required',
				    			'rw' => 'required',
				    			'provinsi' => 'required',
				    			'kabupaten' => 'required',
				    			'kelurahan_desa'=> 'required',
				    			'kecamatan' => 'required',
				    			'kodepos' => 'required',
				    			'transpotasi_sekolah' => 'required',
				    			'jns_tinggal' => 'required',
				    			'no_telp' => 'required',
				    			'no_hp' => 'required',
				    			'email_pribadi'=> 'required',
			    			]);
			    			$namepoto = md5($request->upload_foto->getClientOriginalName().uniqid(rand(), TRUE));
			    			$request->file('upload_foto')->move('peserta/assets/uploadfoto/', $namepoto);
			    			$kasld = $request->nomer_ujian == NULL ? ' - '  :  $request->nomer_ujian;
			    			$nomer_pks = $request->pks2 == NULL ? ' - ' :  $request->pks2 ;
			    			PesertadidikbaruModel::where('id_peserta_didik', $id)->update([
			    					'nama_lengkap' => htmlspecialchars($request->nama_lengkap),
			    				 	'nama_panggilan' => htmlspecialchars($request->nama_panggilan),
			    				 	'foto' => $namepoto,
			    				 	'jenis_kelamin' =>htmlspecialchars( $request->jenis_kelamin),
			    				 	'nisn' => htmlspecialchars($request->nisn),
			    				 	'nis' => htmlspecialchars($request->nis),
			    				 	'asal_sekolah' =>htmlspecialchars( $request->asal_sekolah),
			    				 	'nik' => htmlspecialchars($request->nik),
			    				 	'ttgl' => htmlspecialchars($request->tanggal_lahir),
			    				 	'jurusan' => htmlspecialchars($request->jurusan),
			    				 	'agama' =>htmlspecialchars( $request->agama),
			    				 	'kebutuhan_khusus' =>htmlspecialchars( $request->kebutuhan_khusus),
			    				 	'alamat' =>htmlspecialchars( $request->alamat),
			    				 	'perumahan' => htmlspecialchars($request->perumahan),
			    				 	'rt' => htmlspecialchars($request->rt),
			    				 	'rw' => htmlspecialchars($request->rw),
			    				 	'provinsi' => htmlspecialchars($request->provinsi),
			    				 	'kabupaten' => htmlspecialchars($request->kabupaten),
			    				 	'kelu_des' => htmlspecialchars($request->kelurahan_desa),
			    				 	'kecamatan' => htmlspecialchars($request->kecamatan),
			    				 	'kodepos' => htmlspecialchars($request->kodepos),
			    				 	'alat_transpotasi' => htmlspecialchars($request->transpotasi_sekolah),
			    				 	'jenis_tinggal' =>htmlspecialchars( $request->jns_tinggal),
			    				 	'no_tlprumah' => htmlspecialchars($request->no_telp),
			    				 	'no_tlppribadi' => htmlspecialchars($request->no_hp),
			    				 	'email_pribadi' => htmlspecialchars($request->email_pribadi),
			    				 	'no_ujian' => htmlspecialchars($kasld),
			    				 	'penerima_pks' => htmlspecialchars($request->pks1),
			    				 	'no_pks' => htmlspecialchars($nomer_pks)
			    			]);

			    			TokenJurusanModel::where('id_token_peserta_didik', $id)->update([
			    					'id_token_peserta_didik' => $id,
	                                'jurusan' => htmlspecialchars($request->jurusan),
	                                'token_jurusan'  =>htmlspecialchars( $request->token_jurusasn)
			    			]);
			    			return redirect('peserta/ceta-formulir-pendaftaran')->with('status', 'Data Formulir Berhasil Di Update');
			    		}
			    	}else {
			    		abort(406);
			    	}
			    }
			    public function keluar()
			    {
			    	session_unset();
			    	session()->flush();
			    	return redirect('login')->with('status', 'Anda Berhasil Keluar');
			    }
}



 