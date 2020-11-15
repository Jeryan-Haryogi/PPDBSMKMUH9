<!-- BEGIN: Content-->
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
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- users view start -->
<section class="users-view">
  <!-- users view media object start -->
  <div class="row">
    <div class="col-12 col-sm-7">
      <div class="media mb-2">
        <a class="mr-1" href="#">
          <?php foreach ($datapeserta as $key => $d1): ?>
             <img src="{{url('peserta/assets/uploadfoto')}}/<?= $d1->foto ?>"
            class="users-avatar-shadow rounded-circle" height="64" width="64">
         
        </a>
        <div class="media-body pt-25">
          <h4 class="media-heading"><span><?= $d1->nama_lengkap ?></span></h4>
          <span>ID:</span>
          <span ><?= $d1->id_peserta_didik ?></span>
        </div>

          <?php endforeach ?>
      </div>
    </div>
  </div>
  <!-- users view media object ends -->
  <!-- users view card data start -->
 
  <!-- users view card data ends -->
  <!-- users view card details start -->
  <div class="card">
    <div class="card-content">
      <div class="card-body">
        

        <div class="row">
          <div class="col-sm-4">
              <h5 class="mb-1"><b>Data Diri</b></h5>
          <table class="table table-borderless">
            <tbody>
              <?php foreach ($datapeserta as $key => $d2): ?>
                
              <tr>
                <td>Nama Lengkap:</td>
                <td ><?= $d2->nama_lengkap ?></td>
              </tr>
              <tr>
                <td>Nama Penggilan:</td>
                <td ><?= $d2->nama_panggilan ?></td>
              </tr>
              <tr>
                <td>Jenis Kelamin</td>
                <td class="users-view-email"><?= $d2->jenis_kelamin ?></td>
              </tr>
              <tr>
                <td>Nisn:</td>
                <td><?= $d2->nisn ?></td>
              </tr>
               <tr>
                <td>Nis:</td>
                <td><?= $d2->nis ?></td>
              </tr>
               <tr>
                <td>Asal Sekolah:</td>
                <td><?= $d2->asal_sekolah ?></td>
              </tr>
               <tr>
                <td>Nomer Induk Keluarga (Nik):</td>
                <td><?= $d2->nik ?></td>
              </tr>
               <tr>
                <td>Tempat, Tanggal Lahir:</td>
                <td><?= $d2->ttgl ?></td>
              </tr>
               <tr>
                <td>Jurusan:</td>
                <td><?= $d2->jurusan ?></td>
              </tr>
               <tr>
                <td>Kode Token Jurusan:</td>
                <td><?= $d2->token_jurusan ?></td>
              </tr>
               <tr>
                <td>Agama:</td>
                <td><?= $d2->agama ?></td>
              </tr>
               <tr>
                <td>Kebutuhan Khusus:</td>
                <td><?= $d2->kebutuhan_khusus ?></td>
              </tr>
               <tr>
                <td>Alamat:</td>
                <td><?= $d2->alamat ?></td>
              </tr>
               <tr>
                <td>Perumahan / Dusun:</td>
                <td><?= $d2->perumahan ?></td>
              </tr>
               <tr>
                <td>RT:</td>
                <td><?= $d2->rt ?></td>
              </tr>
               <tr>
                <td>RW:</td>
                <td><?= $d2->rw ?></td>
              </tr>
               <tr>
                <td>Provinsi:</td>
                <td>
                  <?php foreach ($data2['rajaongkir']['results'] as $key => $value): ?>
                    <?php if ($value['province_id'] === $d2->provinsi): ?>
                      <?= $value['province'] ?>
                    <?php endif ?>
                  <?php endforeach ?>
                </td>
              </tr>
               <tr>
                <td>Kabupaten:</td>
                <td><?= $d2->kabupaten ?></td>
              </tr>
               <tr>
                <td>Kelurahan / Desa:</td>
                <td><?= $d2->kelu_des ?></td>
              </tr>
               <tr>
                <td>Kecamatan :</td>
                <td><?= $d2->kecamatan ?></td>
              </tr>
               <tr>
                <td>Kode Post:</td>
                <td><?= $d2->kodepos ?></td>
              </tr>
               <tr>
                <td>Alat Transportasi Ke sekolah:</td>
                <td><?= $d2->alat_transpotasi ?></td>
              </tr>
               <tr>
                <td>Jenis Tinggal:</td>
                <td><?= $d2->jenis_tinggal ?></td>
              </tr>
               <tr>
                <td>Nomer Telpon Rumah:</td>
                <td><?= $d2->no_tlprumah ?></td>
              </tr>
               <tr>
                <td>Nomer Telpon Pribadi:</td>
                <td><?= $d2->no_tlppribadi ?></td>
              </tr>
               <tr>
                <td>Email Pribadi:</td>
                <td><?= $d2->email_pribadi ?></td>
              </tr>
              <?php endforeach ?>

            </tbody>
          </table>
          </div>
          <div class="col-sm-4">
              <h5 class="mb-1"><b>Data Ayah Kandung</b></h5>
          <table class="table table-borderless">
            <tbody>
              <?php foreach ($dataayah as $key => $d3): ?>
                
              <tr>
                <td>Nama Ayah:</td>
                <td ><?= $d3->nama_ayah ?></td>
              </tr>
              <tr>
                <td>Tahun Lahir Ayah:</td>
                <td ><?= $d3->tahun_lahir_ayah ?></td>
              </tr>
              <tr>
                <td>Kebutuhan Khusus</td>
                <td class="users-view-email"><?= $d3->kebutuhan_khusus ?></td>
              </tr>
              <tr>
                <td>Perkerjaan Ayah:</td>
                <td><?= $d3->perkerjaan_ayah ?></td>
              </tr>
               <tr>
                <td>Pendidikan Ayah:</td>
                <td><?= $d3->pendidikan_ayah ?></td>
              </tr>
               <tr>
                <td>Penghasilan Ayah:</td>
                <td><?= $d3->penghasilan_ayah ?></td>
              </tr>
              <?php endforeach ?>

            </tbody>
          </table>
             <h5 class="mb-1"><b>Data ibu Kandung</b></h5>
          <table class="table table-borderless">
            <tbody>
              <?php foreach ($dataibu as $key => $d4): ?>
                
              <tr>
                <td>Nama Ibu:</td>
                <td ><?= $d4->nama_ibu ?></td>
              </tr>
              <tr>
                <td>Tahun Lahir Ibu:</td>
                <td ><?= $d4->tahun_lahir_ibu ?></td>
              </tr>
              <tr>
                <td>Kebutuhan Khusus</td>
                <td class="users-view-email"><?= $d4->kebutuhan_khusus ?></td>
              </tr>
              <tr>
                <td>Perkerjaan Ibu:</td>
                <td><?= $d4->perkerjaan_ibu ?></td>
              </tr>
               <tr>
                <td>Pendidikan Ibu:</td>
                <td><?= $d4->pendidikan_ibu ?></td>
              </tr>
               <tr>
                <td>Penghasilan Ibu:</td>
                <td><?= $d4->penghasilan_ibu?></td>
              </tr>
              <?php endforeach ?>

            </tbody>
          </table>
              <h5 class="mb-1"><b>Data Wali Kandung</b></h5>
          <table class="table table-borderless">
            <tbody>
              <?php foreach ($datawali as $key => $d9): ?>

                
              <tr>
                <td>Nama Wali:</td>
                <td ><?= $d9->nama_wali ?></td>
              </tr>
              <tr>
                <td>Tahun Lahir Ibu:</td>
                <td ><?= $d9->tahun_lahir_wali ?></td>
              </tr>
              <tr>
                <td>Kebutuhan Khusus</td>
                <td class="users-view-email"><?= $d9->kebutuhan_khusus ?></td>
              </tr>
              <tr>
                <td>Perkerjaan Wali:</td>
                <td><?= $d9->perkerjaan_wali ?></td>
              </tr>
               <tr>
                <td>Pendidikan Wali:</td>
                <td><?= $d9->pendidikan_wali ?></td>
              </tr>
               <tr>
                <td>Penghasilan Wali:</td>
                <td><?= $d9->penghasilan_wali?></td>
              </tr>
              <?php endforeach ?>

            </tbody>
          </table>          
          </div>
            
          <div class="col-sm-4">
                    <h5 class="mb-1"><b>Data Periodik Siswa</b></h5>
          <table class="table table-borderless">
            <tbody>
              <?php foreach ($dataperiodik as $key => $d10): ?>

                
              <tr>
                <td>Tinggi Badan:</td>
                <td ><?= $d10->tinggi_badan ?></td>
              </tr>
              <tr>
                <td>Berat Badan: </td>
                <td ><?= $d10->berat_badan ?></td>
              </tr>
              <tr>
                <td>Jarak Ke Sekolah</td>
                <td class="users-view-email"><?= $d10->jarak_sekolah ?></td>
              </tr>
              <tr>
                <td>Jarak Lebih Jauh dari Sekolah:</td>
                <td><?= $d10->jarak_lebih_sekolah ?></td>
              </tr>
               <tr>
                <td>Waktu Ke Sekolah:</td>
                <td><?= $d10->waktu_ke_sekolah ?></td>
              </tr>
               <tr>
                <td>Watu Lebih Ke Sekolah:</td>
                <td><?= $d10->waktu_lebih_ke_sekolah?></td>
              </tr>

               <tr>
                <td>Anak Ke Berapa</td>
                <td><?= $d10->anak_ke_berapa?></td>
              </tr>

               <tr>
                <td>Dari Berapa Saudara</td>
                <td><?= $d10->dari_keberapa?></td>
              </tr>

               <tr>
                <td>Kandung </td>
                <td><?= $d10->kandung?></td>
              </tr>

               <tr>
                <td>Tiri:</td>
                <td><?= $d10->tiri?></td>
              </tr>

               <tr>
                <td>Angakt</td>
                <td><?= $d10->angkat?></td>
              </tr>

              <?php endforeach ?>

            </tbody>
          </table> 
                <h5 class="mb-1"><b>Data Prestasi Perserta</b></h5>
          <table class="table table-borderless">
            <tbody>
              <?php foreach ($dataprestasi as $key => $d4): ?>
                
              <tr>
                <td>Jenis Lomba:</td>
                <td ><?= $d4->jenis_lomba ?></td>
              </tr>
              <tr>
                <td>Tingkat:</td>
                <td ><?= $d4->tingkat ?></td>
              </tr>
              <tr>
                <td>Nama Prestasi</td>
                <td class="users-view-email"><?= $d4->nama_prestasi ?></td>
              </tr>
              <tr>
                <td>Tahun:</td>
                <td><?= $d4->tahun ?></td>
              </tr>
               <tr>
                <td>Penyelenggara:</td>
                <td><?= $d4->penyelenggara ?></td>
              </tr>
              <?php endforeach ?>

            </tbody>
          </table>
           <h5 class="mb-1"><b>Data Beasiswa Perserta</b></h5>
          <table class="table table-borderless">
            <tbody>
              <?php foreach ($dataprestasi as $key => $d4): ?>
                
              <tr>
                <td>Jenis Lomba:</td>
                <td ><?= $d4->jenis_lomba ?></td>
              </tr>
              <tr>
                <td>Tingkat:</td>
                <td ><?= $d4->tingkat ?></td>
              </tr>
              <tr>
                <td>Nama Prestasi</td>
                <td class="users-view-email"><?= $d4->nama_prestasi ?></td>
              </tr>
              <tr>
                <td>Tahun:</td>
                <td><?= $d4->tahun ?></td>
              </tr>
               <tr>
                <td>Penyelenggara:</td>
                <td><?= $d4->penyelenggara ?></td>
              </tr>
              <?php endforeach ?>

            </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- users view card details ends -->

</section>
<!-- users view ends -->
        </div>
      </div>
    </div>