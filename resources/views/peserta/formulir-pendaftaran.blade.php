<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
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
}
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Formulir Pendaftaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Peserta Didik Baru</a></li>
              <li class="breadcrumb-item active">Pengisian Formulir</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
       <div class="alert alert-info" role="alert">
  <h4 class="alert-heading">Pengisian Formulir</h4>
  <p>Pengisian Formulir Peserta Didik Baru secara online  wajib mengisian data pada halaman formulir untuk pendataan siswa baru di smk muhammadiyah 9</p>
  <hr>
</div>
<div class="alert alert-danger" role="alert">
  Peserta Didik Baru diminta melunasi biaya pendaftaran, dan melengkapi berkas yang dibutuhkan
</div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
       


            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                 <h5 class="text-info">Pengisian Formulir</h5>
                 
                </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <?php 
                if ($nama_login) {
                  foreach ($nama_login as $key => $value) {
                    $namaaa = $value['nama_lengkap'];
                   echo "<h3 class'text-center'>Data Formulir Berhasil Dikirim</h3>";
                   die();
                  }
                }
                 ?>
                 <?php if (session('status')): ?>
                   <script>setTimeOut(function(){
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '<?= session('status') ?>',
                    showConfirmButton: false,
                    timer: 1500
                  })
                }, 400)</script>
                <?php    
                echo "<h3 class'text-center'>Data Formulir Berhasil Dikirim</h3>";
                   die(); ?>
                 <?php endif ?>
              <div id="smartwizard">
                  <ul class="nav">
                     <li>
                         <a class="nav-link" href="#step-1">
                            Identitas Peserta Didik
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="#step-2">
                         Data Ayah Kandung
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="#step-3">
                            Data Ibu Kandung
                         </a>
                     </li>
                     <li>
                         <a class="nav-link" href="#step-4">
                            Data Wali
                         </a>
                     </li>
                      <li>
                         <a class="nav-link" href="#step-5">
                            Data Periodik
                         </a>
                     </li>
         <li>
           <a class="nav-link" href="#step-6">
              Catatan Prestasi
           </a>
       </li>
         <li>
           <a class="nav-link" href="#step-7">
            Beasiswa
           </a>
       </li>
    </ul>
 <form action="{{url('peserta/formulir-pendaftaran')}}" method="post" enctype="multipart/form-data">
  @csrf
    <div class="tab-content" style="overflow: scroll;">
       <div id="step-1" class="tab-pane" role="tabpanel">
          <div class="alert alert-success text-center" role="alert">
                  INDENTITAS PESERTA DIDIK ( WAJIB DI ISI)
</div>

                  <?php if (session('status2')): ?>

          <div class="alert alert-danger text-center" role="alert">
                  <?= session('status2') ?>
</div>
                 <?php endif ?>
                  <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                      <label >Nama Lengkap</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" placeholder="Nama Lengkap" name="nama_lengkap" value="<?= $namasilogin; ?>{{old('nama_lengkap')}}" >
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Nama Panggilan</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" id="nama_panggilan" placeholder="Nama Panggilan" name="nama_panggilan" value="{{old('nama_panggilan')}}">
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Upload Foto Pribadi</label>
                      <br>
                      <input type="file" style="border-radius: 20px;" name="upload_foto">
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Jenis Kelamin</label>
                      <select  style="border-radius: 20px;" class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                         <option value="" >Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                       <label >NISN</label>
                      <input style="border-radius: 20px;" id="nisn" type="number" class="form-control @error('nisn') is-invalid @enderror" placeholder="NISN" name="nisn" value="<?= $nisn_get ?>" readonly>
                    </div>
                    </div>

                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >NIS Sekolah Asal</label>
                      <input style="border-radius: 20px;" id="nisn" type="number" class="form-control @error('nis') is-invalid @enderror" placeholder="NIS Sekolah Asal" name="nis" value="{{old('nis')}}">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Asal Sekolah</label>
                      <input  id="asal_sekolah" style="border-radius: 20px;" type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" placeholder="Asal Sekolah" name="asal_sekolah" value="{{old('asal_sekolah')}}">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >No Induk Kependudukan (NIK)</label>
                      <input id="nik" style="border-radius: 20px;" type="number" class="form-control @error('nik') is-invalid @enderror" placeholder="No Induk Kependudukan" name="nik" value="{{old('nik')}}">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Tempat, Tanggal Lahir</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tempat Tanggal Lahir" name="tanggal_lahir" value="{{old('tanggal_lahir')}}">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Jurusan Yang Dipilih</label>
                      <select id="jurusan"  style="border-radius: 20px;" class="form-control" name="jurusan">
                         <option >Pilih Jurusan</option>
                        <option value="Multimedia">Multimedia</option>
                        <option value="Akuntansi">Akuntansi</option>
                        <option value="Administrasi Perkantoran">Administrasi Perkantoran</option>
                      </select>
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Token Jurusan Peserta Didik</label>
                      <input id="tokenjurusan" style="border-radius: 20px;" type="text" class="form-control @error('token_jurusasn') is-invalid @enderror"  value="{{old('token_jurusasn')}}"  name="token_jurusasn" readonly="">
                      <small class="text-danger">Token Ini Telah Tersistem Dan Jangan Di ubah</small>
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Agama</label>
                      <select name="agama"  style="border-radius: 20px;" class="form-control">
                        <option value="Islam">Islam</option>
                      </select>
                    </div>
                    </div>
                       <div class="col-sm-6">
                        <div class="form-group">
                      <label >Berkebutuhan Khusus</label>
                      <select  style="border-radius: 20px;" class="form-control" name="kebutuhan_khusus">
                        <option value="Tidak">Tidak</option>
                        <option value="Netra">Netra</option>
                        <option value="Rungu">Rugu</option>
                        <option value="Grahita Ringan">Grahita Ringan</option>
                        <option value="Grahita Sedang">Grahita Sedang</option>
                        <option value="Daksa Ringan">Daksa Ringan</option>
                        <option value="Daksa Sedang">Daksa Sedang</option>
                        <option value="Laras">Laras</option>
                        <option value="Wicara">Wicara</option>
                        <option value="Tuna Ganda">Tuna Ganda</option>
                        <option value="Hiper Aktif">Hiper Aktif</option>
                        <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                        <option value="Bakat Istimewa">Bakat Istimewa</option>
                        <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                        <option value="Narkoba">Narkoba</option>
                        <option value="Indigo">Indigo</option>
                        <option value="Down Sindrome">Down Sindrome</option>
                        <option value="Autis">Autis</option>
                        <option value="Terpencil / Terbelakang (Bencana Alam / Sosial)">Terpencil / Terbelakang (Bencana Alam / Sosial)</option>
                        <option value="Tidak Mampu Ekonomi">Tidak Mampu Ekonomi</option>
                      </select>
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                      <label >Alamat Tempat Tinggal</label>
                       <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="{{old('alamat')}}" rows="3"></textarea >
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                       <label >Rumah Dusun / Komplek</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('perumahan') is-invalid @enderror" placeholder="Rumah Dusun / Komplek" value="{{old('perumahan')}}" name="perumahan">
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row"  >
                          <div class="col-sm-6">
                            <label>RT</label>
                             <input  style="border-radius: 20px;" type="text" class="form-control @error('rt') is-invalid @enderror" placeholder="RT" value="{{old('rt')}}" name="rt">
                          </div>
                          <div class="col-sm-6">
                            <label>RW</label>
                             <input style="border-radius: 20px;" type="text" class="form-control @error('rw') is-invalid @enderror" placeholder="RW" name="rw" value="{{old('rw')}}">
                          </div>
                        </div>
                    </div>

                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Provinsi</label>
                      <?php if ($data2['rajaongkir']['status']['code'] == 200): ?>
                
                  <select class="form-control" id="provinsi" name="provinsi">
                    <option value="">Pilih Provinsi</option>
                    <?php foreach ($data2['rajaongkir']['results'] as $prov): ?>
                      <option value="<?= $prov['province_id'] ?>"><?= $prov['province'] ?></option>
                    <?php endforeach ?>
                  </select>


               <?php endif ?>
                
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                       <label >Kabupaten / Kota</label>
                        <select class="form-control" id="kabupaten" name="kabupaten">
                  <option value="">Pilih Kabupaten / Kota</option>
                </select>
                
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Kelurahan / Desa</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('kelurahan_desa') is-invalid @enderror" placeholder="Kelurahan / Desa" name="kelurahan_desa" value="{{old('kelurahan_desa')}}">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Kecamatan</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('kecamatan') is-invalid @enderror" placeholder="Kecamatan" name="kecamatan" value="{{old('kecamatan')}}">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Kode Pos</label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('kodepos') is-invalid @enderror" placeholder="Kode Pos" name="kodepos" value="{{old('kodepos')}}">
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                       <label >Alat Transpotasi Ke Sekolah</label>
                      <select  style="border-radius: 20px;" class="form-control" name="transpotasi_sekolah">
                        <option value="">Pilih Alat Transpotasi Ke Sekolah</option>
                        <option value="Jalan Kaki">Jalan Kaki</option>
                        <option value="Angkutan Umum">Angkutan Umum</option>
                        <option value="Mobil / Bus Antar Jemput">Mobil / Bus Antar Jemput</option>
                        <option value="Kereta Api">Kereta Api</option>
                        <option value="Ojek">Ojek</option>
                        <option value="Sepeda Motor">Sepeda Motor</option>
                        <option value="Andong/Becak/Sado/Dokar/Delman">Andong / Becak / Sado /Dokar / Delman</option>
                        <option value="Perahu Peyebrangan/Getek/Rakit">Perahu Peyebrangan/Getek/Rakit</option>
                        <option value="Mobil Pribadi">Mobil Pribadi</option>
                        <option value="Sepeda">Sepeda</option>
                        <option value="Lainya">Lainnya</option>
                      </select>
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                      <label >Jenis Tinggal</label>
                      <select  style="border-radius: 20px;" class="form-control" name="jns_tinggal">
                        <option value="">Pilih Jenis Tinggal</option>
                        <option value="Bersama Keluarga">Bersama Keluarga</option>
                        <option value="Wali">Wali</option>
                        <option value="Kost">Kost</option>
                        <option value="Asrama">Asrama</option>
                        <option value="Panti Asuhan">Panti Asuhan</option>
                        <option value="Lainya/Pondok Pesantren">Lainya/Pondok Pesantren</option>
                      </select>
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >No Telpon Rumah</label>
                      <input value="{{old('no_telp')}}" style="border-radius: 20px;" type="number" class="form-control @error('no_telp') is-invalid @enderror" placeholder="No Telpon Rumah" name="no_telp">

                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Nomer Hp </label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No Hp" name="no_hp" value="{{old('no_hp')}}" id="no_hp">
                      <small class="text-danger">masukan No Hp Yang Dapat Dihubungi</small>
                      
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Email Pribadi</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('email_pribadi') is-invalid @enderror" placeholder="Masukan Email Anda" name="email_pribadi" value="{{old('email_pribadi')}}" id="email_pribadi">
                      <small class="text-danger">masukan Email Yang Aktif</small>
                      
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Nomer Ujian Nasional SMP/MTS </label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('nomer_ujian') is-invalid @enderror" placeholder="Nomer Ujian Nasional SMP/MTS" value="{{old('nomer_ujian')}}" name="nomer_ujian">
                      <small class="text-danger">*) diisikan hanya untuk siswa tingkat 10 s.d 12</small>
                      
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                          <label>Apakah Sebagai Penerima KPS (Kartu Perlindungan Sehat)</label>
                          <select name="pks1" class="form-control" id="pksd">

                            <option value="TIDAK"> TIDAK</option>
                            <option value="IYA"> IYA</option>
                          </select>
                    </div>
                    </div>
                     <div class="col-sm-6 nopks " style="margin-bottom: 80px;" >
                      
                    </div>
                    </div>

       </div>
       <div id="step-2" class="tab-pane" role="tabpanel">
        <div class="alert alert-success text-center" role="alert">
                  DATA AYAH KANDUNG ( WAJIB DI ISI)
</div>
<div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                      <label >Nama Ayah</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_ayah" value="{{old('nama_ayah')}}">
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Tahun Lahir</label>
                      <input style="border-radius: 20px;" type="date" class="form-control @error('tglahirayah') is-invalid @enderror" id="exampleFormControlInput1"  name="tglahirayah" value="{{old('tglahirayah')}}">
                    </div>
                    </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                      <label >Berkebutuhan Khusus</label>
                      <select  style="border-radius: 20px;" class="form-control @error('kebutuhan_khususayah') is-invalid @enderror" name="kebutuhan_khususayah">
                        <option value="Tidak">Tidak</option>
                        <option value="Netra">Netra</option>
                        <option value="Rungu">Rugu</option>
                        <option value="Grahita Ringan">Grahita Ringan</option>
                        <option value="Grahita Sedang">Grahita Sedang</option>
                        <option value="Daksa Ringan">Daksa Ringan</option>
                        <option value="Daksa Sedang">Daksa Sedang</option>
                        <option value="Laras">Laras</option>
                        <option value="Wicara">Wicara</option>
                        <option value="Tuna Ganda">Tuna Ganda</option>
                        <option value="Hiper Aktif">Hiper Aktif</option>
                        <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                        <option value="Bakat Istimewa">Bakat Istimewa</option>
                        <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                        <option value="Narkoba">Narkoba</option>
                        <option value="Indigo">Indigo</option>
                        <option value="Down Sindrome">Down Sindrome</option>
                        <option value="Autis">Autis</option>
                        <option value="Terpencil / Terbelakang (Bencana Alam / Sosial)">Terpencil / Terbelakang (Bencana Alam / Sosial)</option>
                        <option value="Tidak Mampu Ekonomi">Tidak Mampu Ekonomi</option>
                      </select>
                      <small class="text-danger">*) Daftar sama dengan Point H diatas (Apabila Tidak Ada Dikosongi)</small>
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Perkerjaan</label>
                      <select  style="border-radius: 20px;" class="form-control @error('perkerjaanayah') is-invalid @enderror" name="perkerjaanayah">
                         <option value="" >Pilih Perkerjaan</option>
                        <option value="Tidak Berkerja">Tidak Berkerja</option>
                        <option value="Nelayan">Nelayan</option>
                        <option value="Petani">Petani</option>
                        <option value="Perternak">Perternak</option>
                        <option value="Perternak">Perternak</option>
                        <option value="PNS/TNI/Porli">PNS / TNI / Porli</option>
                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                        <option value="Pedagang Kecil">Pedagang Kecil</option>
                        <option value="Wiraswasta">Wirawasta</option>
                        <option value="Wirausaha">Wirausaha</option>
                        <option value="Buruh">Buruh</option>
                        <option value="Pensiun">Pensiun</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                       <label >Pendidikan</label>
                      <select  style="border-radius: 20px;" class="form-control @error('pendidikan_ayah') is-invalid @enderror" name="pendidikan_ayah">
                         <option value="" >Pilih Pendidikan</option>
                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                        <option value="Putus SD">Putus SD</option>
                        <option value="SD Sederajat">SD Sederajat</option>
                        <option value="SMP Sederajat">SMP Sederajat</option>
                        <option value="SMA Sederajat">SMA Sederajat</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4/S1">D4/S1</option>
                        <option value="S2">S2</option>
                        <option value="S4">S3</option>
                      </select>
                    </div>
                    </div>

                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Penghasilan Bulanan</label>
                     <select  style="border-radius: 20px;" class="form-control @error('penghasilan_ayah') is-invalid @enderror" name="penghasilan_ayah">
                        <option value="" >Pilih Penghasilan Bulanan</option>
                        <option value="Kurang dari Rp. 500.00">Kurang dari Rp. 500.00</option>
                        <option value="Rp. 500.000 s.d Rp. 999.999">Rp. 500.000 s.d Rp. 999.999</option>
                        <option value="Rp. 1000.000 s.d Rp. 2000.000">Rp. 1000.000 s.d Rp. 2000.000</option>
                        <option value="Lebih dari Rp. 2000.000">Lebih dari Rp. 2000.000</option>
                      </select>
                    </div>
                    </div>
                    </div>
          </div>
       <div id="step-3" class="tab-pane" role="tabpanel">
         <div class="alert alert-success text-center" role="alert">
                  DATA IBU KANDUNG ( WAJIB DI ISI)
</div>
<div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                      <label >Nama Ibu</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" placeholder="Nama Lengkap" name="nama_ibu" value="{{old('nama_ibu')}}">
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Tahun Lahir</label>
                      <input  style="border-radius: 20px;" type="date" class="form-control @error('tahun_lahir_ibu') is-invalid @enderror" id="exampleFormControlInput1"  name="tahun_lahir_ibu" value="{{old('tahun_lahir_ibu')}}">
                    </div>
                    </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                      <label >Berkebutuhan Khusus</label>
                      <select  style="border-radius: 20px;" class="form-control @error('kebutuhan_khusus_ibu') is-invalid @enderror" name="kebutuhan_khusus_ibu">
                        <option value="Tidak">Tidak</option>
                        <option value="Netra">Netra</option>
                        <option value="Rungu">Rugu</option>
                        <option value="Grahita Ringan">Grahita Ringan</option>
                        <option value="Grahita Sedang">Grahita Sedang</option>
                        <option value="Daksa Ringan">Daksa Ringan</option>
                        <option value="Daksa Sedang">Daksa Sedang</option>
                        <option value="Laras">Laras</option>
                        <option value="Wicara">Wicara</option>
                        <option value="Tuna Ganda">Tuna Ganda</option>
                        <option value="Hiper Aktif">Hiper Aktif</option>
                        <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                        <option value="Bakat Istimewa">Bakat Istimewa</option>
                        <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                        <option value="Narkoba">Narkoba</option>
                        <option value="Indigo">Indigo</option>
                        <option value="Down Sindrome">Down Sindrome</option>
                        <option value="Autis">Autis</option>
                        <option value="Terpencil / Terbelakang (Bencana Alam / Sosial)">Terpencil / Terbelakang (Bencana Alam / Sosial)</option>
                        <option value="Tidak Mampu Ekonomi">Tidak Mampu Ekonomi</option>
                      </select>
                      <small class="text-danger">*) Daftar sama dengan Point H diatas (Apabila Tidak Ada Dikosongi)</small>
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Perkerjaan</label>
                      <select  style="border-radius: 20px;" class="form-control @error('perkerjaanibu') is-invalid @enderror" name="perkerjaanibu">
                         <option value="" >Pilih Perkerjaan</option>
                        <option value="Tidak Berkerja">Tidak Berkerja</option>
                        <option value="Nelayan">Nelayan</option>
                        <option value="Petani">Petani</option>
                        <option value="Perternak">Perternak</option>
                        <option value="Perternak">Perternak</option>
                        <option value="PNS/TNI/Porli">PNS / TNI / Porli</option>
                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                        <option value="Pedagang Kecil">Pedagang Kecil</option>
                        <option value="Wiraswasta">Wirawasta</option>
                        <option value="Wirausaha">Wirausaha</option>
                        <option value="Buruh">Buruh</option>
                        <option value="Pensiun">Pensiun</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                       <label >Pendidikan</label>
                      <select  style="border-radius: 20px;" class="form-control @error('pendidikan_ibu') is-invalid @enderror" name="pendidikan_ibu">
                         <option value="" >Pilih Pendidikan</option>
                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                        <option value="Putus SD">Putus SD</option>
                        <option value="SD Sederajat">SD Sederajat</option>
                        <option value="SMP Sederajat">SMP Sederajat</option>
                        <option value="SMA Sederajat">SMA Sederajat</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4/S1">D4/S1</option>
                        <option value="S2">S2</option>
                        <option value="S4">S3</option>
                      </select>
                    </div>
                    </div>

                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Penghasilan Bulanan</label>
                     <select  style="border-radius: 20px;" class="form-control @error('penghasilan_ibu') is-invalid @enderror" name="penghasilan_ibu">
                        <option value="" >Pilih Penghasilan Bulanan</option>
                        <option value="Kurang dari Rp. 500.00">Kurang dari Rp. 500.00</option>
                        <option value="Rp. 500.000 s.d Rp. 999.999">Rp. 500.000 s.d Rp. 999.999</option>
                        <option value="Rp. 1000.000 s.d Rp. 2000.000">Rp. 1000.000 s.d Rp. 2000.000</option>
                        <option value="Lebih dari Rp. 2000.000">Lebih dari Rp. 2000.000</option>
                      </select>
                    </div>
                    </div>
                    </div>
          </div>
       <div id="step-4" class="tab-pane" role="tabpanel">
        <div class="alert alert-success text-center" role="alert">
                  DATA WALI( TIDAK WAJIB DI ISI)
</div>
<div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                      <label >Nama Wali</label>
                      <input style="border-radius: 20px;" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_wali" value="{{old('nama_wali')}}">
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Tahun Lahir</label>
                      <input style="border-radius: 20px;" type="date" class="form-control" id="exampleFormControlInput1"  name="tahun_lahir_wali" value="{{old('tahun_lahir_wali')}}">
                    </div>
                    </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                      <label >Berkebutuhan Khusus</label>
                      <select  style="border-radius: 20px;" class="form-control" name="kebutuhan_khusus_wali">
                        <option value="Tidak">Tidak</option>
                        <option value="Netra">Netra</option>
                        <option value="Rungu">Rugu</option>
                        <option value="Grahita Ringan">Grahita Ringan</option>
                        <option value="Grahita Sedang">Grahita Sedang</option>
                        <option value="Daksa Ringan">Daksa Ringan</option>
                        <option value="Daksa Sedang">Daksa Sedang</option>
                        <option value="Laras">Laras</option>
                        <option value="Wicara">Wicara</option>
                        <option value="Tuna Ganda">Tuna Ganda</option>
                        <option value="Hiper Aktif">Hiper Aktif</option>
                        <option value="Cerdas Istimewa">Cerdas Istimewa</option>
                        <option value="Bakat Istimewa">Bakat Istimewa</option>
                        <option value="Kesulitan Belajar">Kesulitan Belajar</option>
                        <option value="Narkoba">Narkoba</option>
                        <option value="Indigo">Indigo</option>
                        <option value="Down Sindrome">Down Sindrome</option>
                        <option value="Autis">Autis</option>
                        <option value="Terpencil / Terbelakang (Bencana Alam / Sosial)">Terpencil / Terbelakang (Bencana Alam / Sosial)</option>
                        <option value="Tidak Mampu Ekonomi">Tidak Mampu Ekonomi</option>
                      </select>
                      <small class="text-danger">*) Daftar sama dengan Point H diatas (Apabila Tidak Ada Dikosongi)</small>
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Perkerjaan</label>
                      <select  style="border-radius: 20px;" class="form-control" name="perkerjaanwali">
                         <option value="" >Pilih Perkerjaan</option>
                        <option value="Tidak Berkerja">Tidak Berkerja</option>
                        <option value="Nelayan">Nelayan</option>
                        <option value="Petani">Petani</option>
                        <option value="Perternak">Perternak</option>
                        <option value="Perternak">Perternak</option>
                        <option value="PNS/TNI/Porli">PNS / TNI / Porli</option>
                        <option value="Karyawan Swasta">Karyawan Swasta</option>
                        <option value="Pedagang Kecil">Pedagang Kecil</option>
                        <option value="Wiraswasta">Wirawasta</option>
                        <option value="Wirausaha">Wirausaha</option>
                        <option value="Buruh">Buruh</option>
                        <option value="Pensiun">Pensiun</option>
                        <option value="Lainnya">Lainnya</option>
                      </select>
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                       <label >Pendidikan</label>
                      <select  style="border-radius: 20px;" class="form-control" name="pendidikan_wali">
                         <option value="" >Pilih Pendidikan</option>
                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                        <option value="Putus SD">Putus SD</option>
                        <option value="SD Sederajat">SD Sederajat</option>
                        <option value="SMP Sederajat">SMP Sederajat</option>
                        <option value="SMA Sederajat">SMA Sederajat</option>
                        <option value="D1">D1</option>
                        <option value="D2">D2</option>
                        <option value="D3">D3</option>
                        <option value="D4/S1">D4/S1</option>
                        <option value="S2">S2</option>
                        <option value="S4">S3</option>
                      </select>
                    </div>
                    </div>

                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Penghasilan Bulanan</label>
                     <select  style="border-radius: 20px;" class="form-control" name="penghasilan_wali">
                        <option value="" >Pilih Penghasilan Bulanan</option>
                        <option value="Kurang dari Rp. 500.00">Kurang dari Rp. 500.00</option>
                        <option value="Rp. 500.000 s.d Rp. 999.999">Rp. 500.000 s.d Rp. 999.999</option>
                        <option value="Rp. 1000.000 s.d Rp. 2000.000">Rp. 1000.000 s.d Rp. 2000.000</option>
                        <option value="Lebih dari Rp. 2000.000">Lebih dari Rp. 2000.000</option>
                      </select>
                    </div>
                    </div>
                    </div>
          </div>
             <div id="step-5" class="tab-pane" role="tabpanel">
               <div class="alert alert-success text-center" role="alert">
                  DATA PERIODIK( WAJIB DI ISI)
            </div>
            <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                      <label >Tinggi Badan</label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('tinggi_badan') is-invalid @enderror" placeholder="Tinggi Badan" name="tinggi_badan" value="{{old('tinggi_badan')}}">
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Berat Badan</label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('berat_badan') is-invalid @enderror" placeholder="Berat Badan / Kg" value="{{old('berat_badan')}}" name="berat_badan">
                    </div>
                    </div>
                      <div class="col-sm-6">
                         <div class="form-group">
                      <label >Jarak Tempat Tinggal Ke Sekolah</label>
                      <select id="jarak" style="border-radius: 20px;" class="form-control @error('jarak_tempuh') is-invalid @enderror" name="jarak_tempuh">
                        <option value="">Pilih Jarak Tempat Tinggal Ke Sekolah </option>
                        <option value="Kurang Dari 1 km">Kurang Dari 1 KM</option>
                        <option value="Lebih Dari 2 km">Lebih Dari 2 KM</option>
                      </select>
                      
                    </div>
                    </div>
                    <div id="lebihjarak">
                      
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Waktu Tempuh Berangkat Sekolah</label>
                      <select  id="waktu" style="border-radius: 20px;" class="form-control @error('waktu_tempuh') is-invalid @enderror" name="waktu_tempuh">
                         <option value="" >Pilih Waktu Tempuh Berangkat Sekolah</option>
                        <option value="Kurang Dari 30 Menit">Kurang Dari 30 Menit</option>
                        <option value="30 Menit - 60 Menit">30 Menit - 60 Menit</option>
                        <option value="Lebih Dari 60 Menit">Lebih Dari 60 Menit</option>
                      </select>
                    </div>
                    </div>
                    <div id="waktutempuh">
                      
                    </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                      <label >Anak Ke berapa</label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('anakkeberapa') is-invalid @enderror" placeholder="Anak Ke berapa" id="exampleFormControlInput1" value="{{old('anakkeberapa')}}"  name=anakkeberapa>
                    </div>
                        </div>
                        <div class="col-sm-6">
                           <div class="form-group">
                      <label >Dari berapa soudara</label>
                      <input style="border-radius: 20px;" type="number" value="{{old('dariberapa')}}" class="form-control @error('dariberapa') is-invalid @enderror" placeholder="Dari berapa soudara" id="exampleFormControlInput1"  name="dariberapa">
                    </div>
                        </div>
                          <div class="col-sm-4">
                           <div class="form-group">
                      <label >Jumlah Saudara Kandung : </label>
                      <input style="border-radius: 20px;" type="number" value="{{old('sodara_kandung')}}"  class="form-control @error('sodara_kandung') is-invalid @enderror" placeholder="Jumlah Saudara Kandung" id="exampleFormControlInput1"  name="sodara_kandung">
                    </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group">
                      <label >Tiri</label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('sodara_tiri') is-invalid @enderror" placeholder="Jumlah Saudara Tiri"  value="{{old('sodara_tiri')}}" name="sodara_tiri">
                    </div>
                        </div>
                        <div class="col-sm-4">
                           <div class="form-group">
                      <label >Angkat</label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('sodara_angkat') is-invalid @enderror" placeholder="Jumlah Saudara Angkat" id="exampleFormControlInput1"  name="sodara_angkat" value="{{old('sodara_angkat')}}">
                    </div>
                        </div>
                    </div>
                  </div>
                  <div id="step-6" class="tab-pane" role="tabpanel">
                     <div class="alert alert-success text-center" role="alert">
                CATATAN PRESTASI
                </div>
                    <button class="btn btn-primary mb-4"  type="button" id="add">Tambah</button>
                    <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Jenis Prestasi</th>
                        <th scope="col">Tingkat</th>
                        <th scope="col">Nama Prestasi</th>
                        <th scope="col">Tahun</th>
                        <th scope="col">Penyelenggaraan</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="dynamic_field">
                      <tr>
                        <td><select style="border-radius: 20px;" class="form-control" name="jenis_prestasi[]">
                         <option value="" >Pilih Jenis Prestasi</option>
                        <option value="Sains">Sains</option>
                        <option value="Olahraga">Olahraga</option>
                        <option value="Seni">Seni</option>
                        <option value="Lain-lain">Lain-lain</option>
                      </select></td>
                        <td><select style="border-radius: 20px;" class="form-control" name="tingkat[]">
                         <option value="" >Pilih Tingkat Prestasi</option>
                        <option value="Sekolah">Sekolah</option>
                        <option value="Kecamatan">Kecamatan</option>
                        <option value="Kab/kota">Kab/kota</option>
                        <option value="Provinsi">Provinsi</option>
                        <option value="Nasional">Nasional</option>
                        <option value="Internasionan">Internasionan</option>
                      </select></td>
                       <td><input style="border-radius: 20px;" type="text" class="form-control" placeholder="Nama Prestasi" name="nama_prestasi[]"></td>
                       <td><input style="border-radius: 20px;" type="date" class="form-control"  name="tahun_prestasi[]"></td>
                       <td><input style="border-radius: 20px;" type="text" class="form-control" placeholder="Penyelenggara Lomba" name="penyelenggara[]"></td>
                      </tr>
                    </tbody>
                  </table>
                  </div>
                   <div id="step-7" class="tab-pane" role="tabpanel">
                        <div class="alert alert-success text-center" role="alert">
                 BEASISWA
                </div>
                      <button class="btn btn-primary mb-4" type="button" id="add2">Tambah</button>
                    <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">Jenis Beasiswa</th>
                        <th scope="col">Penyelenggara / Sumber</th>
                        <th scope="col">Tahun Mulai</th>
                        <th scope="col">Tahun Selesai</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody id="dynamic_field2">
                      <tr>
                        <td><select style="border-radius: 20px;" class="form-control" name="jenis_beasiswa[]">
                         <option value="" >Pilih Beasiswa</option>
                        <option value="Prestasi">Prestasi</option>
                        <option value="Bantuan Siswa Miskin">Bantuan Siswa Miskin</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Unggulan">Unggulan</option>
                        <option value="Ikatan Dinas">Ikatan Dinas</option>
                        <option value="Lainnya">Lainnya</option>
                        </select></td>
                        <td><input style="border-radius: 20px;" type="text" class="form-control" placeholder="Penyelenggara Lomba" name="sumber_beasiswa[]"></td>
                       <td><input style="border-radius: 20px;" type="date" class="form-control"  name="tahun_mulai[]"></td>
                       <td><input style="border-radius: 20px;" type="date" class="form-control" placeholder="Penyelenggara Lomba" name="tahun_selesai[]"></td>
                      </tr>
                    </tbody>
                  </table>
                  <buttontype="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#exampleModal" style="border-radius: 20px;">Kirim Semua Formulir Pendaftaran</button>
                   </div>
          </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Pesetujuan Formulir Pendaftaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="alert alert-danger" role="alert">
            Peserta Didik Baru diminta melunasi biaya pendaftaran, dan melengkapi berkas yang dibutuhkan
          </div>
            <div class="alert" role="alert">
            Apakah Anda Setuju Untuk Mempertanggung Jawabkan Data Ini Untuk Pendaftaran Peserta Didik 
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="customCheck1" required="" name="Setuju">
              <label class="custom-control-label" for="customCheck1">Setuju</label>
            </div>
              <button type="submit" class="form-control btn btn-info mt-3" name="Kirim">Kirim Formulir</button>
          </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  
                </div>
              </div>
            </div>
          </div>
          </div>
             
              </div>
              <!-- /.card-body -->
            
            </div>
         
            <!-- /.card -->

          </section>

          
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
        
          <!-- right col -->

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    </form>
   
    <!-- /.content -->
  </div>
<script src="https://cdn.jsdelivr.net/npm/smartwizard@5/dist/js/jquery.smartWizard.min.js" type="text/javascript"></script>

  <script type="text/javascript">
     $('#smartwizard').smartWizard({
      theme: 'arrows',
      transtionEffect: 'fade',
      transtionSpeed: '600'
     });
    $('#pksd').on('change', function(){
      const valcuk = $(this).val();
      if (valcuk == 'IYA') {
       const datainputpks = ` <div class="form-group">
                          <label>Apakah Sebagai Penerima KPS (Kartu Perlindungan Sehat)</label>
                          <input style="border-radius: 20px;" type="number" class="form-control" placeholder="No KPS" name="pks2">
                    </div>`;
                    $('.nopks').html(datainputpks);
      }else {
        const sdasd = '';
          $('.nopks').html(sdasd);
      }
    });
    $('#jurusan').on('change', function(){
      fetch("{{url('peserta/formulir-pendaftaran')}}"+"/"+this.value, {

      }).then((response) => response.text()).then((data) => {
        $('#tokenjurusan').val(data);
      });
    });
    $('#provinsi').on('change', function(){
       fetch("{{url('peserta/formulir-pendaftaran/getkabupaten')}}"+"/"+this.value, {

      }).then((response) => response.text()).then((data) => {
       $('#kabupaten').html(data);
      });
    });
    $('#jarak').on('change', function(){
      const val =  this.value;
      if (val == 'Lebih Dari 2 km') {
        const ubah = ` <div class="col-sm-12">
                        <div class="form-group">
                      <label >Jarak Tempuh </label>
                      <input style="border-radius: 20px;" type="text" class="form-control" placeholder="Jarak Tempuh / KM"   name="km_tempuh">
                    </div>
                    </div>
                    </div>`;
        $('#lebihjarak').html(ubah);
      }else {
          const ubah1 = ``;
        $('#lebihjarak').html(ubah1);
      }
    });
     $('#waktu').on('change', function(){
      const val =  this.value;
      if (val == 'Lebih Dari 60 Menit') {
        const ubah = ` <div class="col-sm-12">
                        <div class="form-group">
                      <label >Waktu Lama Tempuh Berangkat </label>
                      <input style="border-radius: 20px;" type="text" class="form-control" placeholder="Waktu Lebih Ke Sekolah"   name="menit_tempuh">
                    </div>
                    </div>
                    </div>`;
        $('#waktutempuh').html(ubah);
      }else {
          const ubah1 = ``;
        $('#waktutempuh').html(ubah1);
      }
    });
     var int = 1;

     $('#add').on('click', function(){
      int++;
      $('#dynamic_field').append('<tr id="row"'+int+'">  <td><select style="border-radius: 20px;" class="form-control" name="jenis_prestasi[]"><option value="" >Pilih Jenis Prestasi</option><option value="Sains">Sains</option><option value="Olahraga">Olahraga</option><option value="Seni">Seni</option><option value="Lain-lain">Lain-lain</option></select></td><td><select style="border-radius: 20px;" class="form-control" name="tingkat[]"><option value="" >Pilih Tingkat Prestasi</option><option value="Sekolah">Sekolah</option><option value="Kecamatan">Kecamatan</option><option value="Kab/kota">Kab/kota</option><option value="Provinsi">Provinsi</option><option value="Nasional">Nasional</option><option value="Internasionan">Internasionan</option></select></td><td><input style="border-radius: 20px;" type="text" class="form-control" placeholder="Nama Prestasi" name="nama_prestasi[]"></td><td><input style="border-radius: 20px;" type="date" class="form-control"  name="tahun_prestasi[]"></td><td><input style="border-radius: 20px;" type="text" class="form-control" placeholder="Penyelenggara Lomba" name="penyelenggara[]"></td><td><button  onclick="hapusinput()" class="btn btn-danger btn_remove"  name="remove" data-id='+int+' id="hapus" type="button" >X</button></td></tr>');
     });
      function hapusinput() {
        var button_id = $(this).data("id");
        btnDel = document.getElementById('hapus');
        dataId = btnDel.getAttribute('data-id')
        $('#row').remove();
      }

      $('#add2').on('click', function(){
        int++;
         $('#dynamic_field2').append('<tr id="row2"'+int+'"><td><select style="border-radius: 20px;" class="form-control" name="jenis_beasiswa[]"><option value="" >Pilih Beasiswa</option><option value="Prestasi">Prestasi</option><option value="Bantuan Siswa Miskin">Bantuan Siswa Miskin</option><option value="Pendidikan">Pendidikan</option><option value="Unggulan">Unggulan</option><option value="Ikatan Dinas">Ikatan Dinas</option><option value="Lainnya">Lainnya</option></select></td><td><input style="border-radius: 20px;" type="text" class="form-control" placeholder="Penyelenggara Lomba" name="sumber_beasiswa[]"></td><td><input style="border-radius: 20px;" type="date" class="form-control"  name="tahun_mulai[]"></td><td><input style="border-radius: 20px;" type="date" class="form-control" placeholder="Penyelenggara Lomba" name="tahun_selesai[]"></td><td><button class="btn btn-danger" onclick="hapusbeasiswa()"  name="remove2" data-id='+int+' id="hapus2" type="button">X</button></td></tr>')
      });
      function hapusbeasiswa()
      {
        var button_id2 = $(this).data("id");
        btnDel2 = document.getElementById('hapus2');
        dataId2 = btnDel2.getAttribute('data-id');
         $('#row2').remove();
      }


  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
