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
                // if ($namalogin) {
                //   foreach ($namalogin as $key => $value) {
                //     $namaaa = $value['nama_lengkap'];
                //    echo "<h3 class'text-center'>Data Formulir Berhasil Dikirim</h3>";
                //    die();
                //   }
                // }
                 ?>
                <?php if (session('status')) {
                  echo "<script>setTimeOut(function(){
                    Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'Your work has been saved',
                    showConfirmButton: false,
                    timer: 1500
                  })
                }, 400)</script>";
                echo "<h3 class'text-center'>Data Formulir Berhasil Dikirim</h3>";
                die();
                } ?>
         
				
				    <div class="tab-content" style="overflow: scroll;">
				          <div class="alert alert-success text-center" role="alert">
				                  INDENTITAS PESERTA DIDIK ( WAJIB DI ISI)
				</div>
				<?php foreach ($update_formulir as $key => $value): ?>
                	 <form action="{{url('peserta/update-formulir-pendaftaran')}}/<?= $value->id_peserta_didik ?>" method="post" enctype="multipart/form-data">
                	 	@method('PATCH')
				  @csrf  		
                  <div class="row">
                  	
                    <div class="col-sm-6">
                        <div class="form-group">
                      <label >Nama Lengkap</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nama Lengkap" name="nama_lengkap" value="<?= $value->nama_lengkap ?>" >
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                      <label >Nama Panggilan</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nama Panggilan" name="nama_panggilan" value="<?= $value->nama_panggilan ?>">
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
                      <select  style="border-radius: 20px;" class="form-control" name="jenis_kelamin">
                         <option value="" >Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                      </select>
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                       <label >NISN</label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('nisn') is-invalid @enderror" placeholder="NISN" name="nisn" value="<?= $value->nisn ?>">
                    </div>
                    </div>

                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >NIS Sekolah Asal</label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('nis') is-invalid @enderror" placeholder="NIS Sekolah Asal" name="nis" value="<?= $value->nis ?>">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Asal Sekolah</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" placeholder="Asal Sekolah" name="asal_sekolah" value="<?= $value->asal_sekolah ?>">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >No Induk Kependudukan (NIK)</label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('nik') is-invalid @enderror" placeholder="No Induk Kependudukan" name="nik" value="<?= $value->nik ?>">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Tempat, Tanggal Lahir</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('tanggal_lahir') is-invalid @enderror" placeholder="Tempat Tanggal Lahir" name="tanggal_lahir" value="<?= $value->ttgl ?>">
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
                       <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" value="<?= $value->alamat ?>"  rows="3"></textarea >
                    </div>
                    </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                       <label >Rumah Dusun / Komplek</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('perumahan') is-invalid @enderror" placeholder="Rumah Dusun / Komplek" value="<?= $value->perumahan ?>" name="perumahan">
                    </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="row"  >
                          <div class="col-sm-6">
                            <label>RT</label>
                             <input  style="border-radius: 20px;" type="text" class="form-control @error('rt') is-invalid @enderror" placeholder="RT" value="<?= $value->rt ?>" name="rt">
                          </div>
                          <div class="col-sm-6">
                            <label>RW</label>
                             <input style="border-radius: 20px;" type="text" class="form-control @error('rw') is-invalid @enderror" placeholder="RW" name="rw" value="<?= $value->rw ?>">
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
                      <input style="border-radius: 20px;" type="text" class="form-control @error('kelurahan_desa') is-invalid @enderror" placeholder="Kelurahan / Desa" name="kelurahan_desa" value="<?= $value->kelu_des ?>">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Kecamatan</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('kecamatan') is-invalid @enderror" placeholder="Kecamatan" name="kecamatan" value="<?= $value->kecamatan ?>">
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Kode Pos</label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('kodepos') is-invalid @enderror" placeholder="Kode Pos" name="kodepos" value="<?= $value->kodepos ?>">
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
                      <input value="<?= $value->no_tlprumah ?>" style="border-radius: 20px;" type="number" class="form-control @error('no_telp') is-invalid @enderror" placeholder="No Telpon Rumah" name="no_telp">

                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Nomer Hp </label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('no_hp') is-invalid @enderror" placeholder="No Hp" name="no_hp" value="<?= $value->no_tlppribadi ?>">
                      <small class="text-danger">masukan No Hp Yang Dapat Dihubungi</small>
                      
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Email Pribadi</label>
                      <input style="border-radius: 20px;" type="text" class="form-control @error('email_pribadi') is-invalid @enderror" placeholder="masukan Email" name="email_pribadi" value="<?= $value->email_pribadi ?>">
                      <small class="text-danger">masukan Email Yang Aktif</small>
                      
                    </div>
                    </div>
                     <div class="col-sm-6">
                        <div class="form-group">
                       <label >Nomer Ujian Nasional SMP/MTS </label>
                      <input style="border-radius: 20px;" type="number" class="form-control @error('nomer_ujian') is-invalid @enderror" placeholder="Nomer Ujian Nasional SMP/MTS" value="<?= $value->no_ujian ?>" name="nomer_ujian">
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
                    <button type="submit" class="btn btn-primary  mb-5">Update Formulir</button>
                  	<?php endforeach ?>

       </div>
            </div>
          </div>
          </div>

          </form>
             
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
  </script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
