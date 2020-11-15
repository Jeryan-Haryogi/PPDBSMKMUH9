<?php  ?>
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
  $kntl = json_decode( $response, TRUE);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Data Konfirmasi Peserta Didik Baru</title>
  </head>
  <body>
  	<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">Nama Panggilan</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">NISN</th>
      <th scope="col">NIK</th>
      <th scope="col">Tempat, tanggal lahir</th>
      <th scope="col">Agama</th>
      <th scope="col">Berkebutuhan Khusus</th>
      <th scope="col">Alamat Tempat Tinggal</th>
      <th scope="col">Dusun</th>
      <th scope="col">Kelurahn ./ Desa</th>
      <th scope="col">Kecamatan</th>
      <th scope="col">Kabupaten / Kota</th>
      <th scope="col">Provinsi</th>
      <th scope="col">Kode Pos</th>
      <th scope="col">Alat Transpotasi Ke Sekolah</th>
      <th scope="col">Jenis Tinggal</th>
      <th scope="col">No Telp Rumah</th>
      <th scope="col">No HP</th>
      <th scope="col">Email Pribadi</th>
      <th scope="col">No Ujian SMP/MTS</th>
      <th scope="col">Penerima KPS</th>
      <th scope="col">No KPS</th>
      <th scope="col">Nama Ayah Kandung</th>
      <th scope="col">Berkebutuhan Khusus Ayah</th>
      <th scope="col">Perkerjaan </th>
      <th scope="col">Pendidikan </th>
      <th scope="col">Penghasilan Bulanan</th>
      <th scope="col">Nama Ayah Ibu</th>
      <th scope="col">Berkebutuhan Khusus Ibu</th>
      <th scope="col">Perkerjaan </th>
      <th scope="col">Pendidikan </th>
      <th scope="col">Penghasilan Bulanan</th>
      <th scope="col">Nama Wali</th>
      <th scope="col">Berkebutuhan Khusus Wali</th>
      <th scope="col">Perkerjaan </th>
      <th scope="col">Pendidikan </th>
      <th scope="col">Penghasilan Bulanan</th>
      <th scope="col">Tinggi Badan</th>
      <th scope="col">Berat Badan</th>
      <th scope="col">Jarak Ke Sekolah </th>
      <th scope="col">Jarak Lebih Sekolah </th>
      <th scope="col">Waktu Ke Sekolah </th>
      <th scope="col">Waktu Lebih Ke Sekolah</th>
      <th scope="col">Anak Ke Berapa </th>
      <th scope="col">Dari Berapa Bersaudara </th>
      <th scope="col">Jumlah Saudara Kandung </th>
      <th scope="col">Jumlah Saudara Tiri </th>
      <th scope="col">Jumlah Saudara Angkat </th>
      <th scope="col">Jenis Prestasi</th>
      <th scope="col">Tinggkat Prestasi </th>
      <th scope="col">Nama Prestasi </th>
      <th scope="col">Tahun </th>
      <th scope="col">Penyelenggara </th>
      <th scope="col">Jenis Beasiswa</th>
      <th scope="col">Penyelenggara / Sumbar </th>
      <th scope="col">Tahun Mulai </th>
      <th scope="col">Tahun</th>
    </tr>
  </thead>
  <tbody>
  	<?php $i=1; ?>
  	<?php foreach ($data1 as $key => $d1): ?>
  	<?php foreach ($data2 as $key => $d2): ?>
  	<?php foreach ($data3 as $key => $d3): ?>
  	<?php foreach ($data4 as $key => $d4): ?>
  	<?php foreach ($data5 as $key => $d5): ?>
  	<?php foreach ($data6 as $key => $d6): ?>
  	<?php foreach ($data7 as $key => $d7): ?>
  	<?php foreach ($data8 as $key => $d8): ?>
  		
  		<?php if ($d1->id_peserta_didik == $d2->id_verifikasi_perserta_didik): ?>
  			
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $d1->nama_lengkap ?></td>
      <td><?= $d1->nama_panggilan ?></td>
      <td><?= $d1->jenis_kelamin ?></td>
      <td><?= $d1->nisn ?></td>
      <td><?= $d1->nik ?></td>
      <td><?= $d1->ttgl ?></td>
      <td><?= $d1->agama ?></td>
      <td><?= $d1->kebutuhan_khusus ?></td>
      <td><?= $d1->alamat ?></td>
      <td><?= $d1->perumahan ?></td>
      <td><?= $d1->kelu_des ?></td>

      <td><?= $d1->kecamatan ?></td>

      <td><?= $d1->kabupaten ?></td>
      <td>
      	<?php if ($kntl['rajaongkir']['status']['code'] == 200): ?>
                
                  <?php foreach ($kntl['rajaongkir']['results'] as $prov): ?>
                  	<?php if ($d1->provinsi ==  $prov['province_id'] ): ?>
                  		<?= $prov['province'] ?>
                  	<?php endif ?>
                    <?php endforeach ?>


               <?php endif ?>
      </td>
      <td><?= $d1->kodepos ?></td>
      <td><?= $d1->alat_transpotasi ?></td>
      <td><?= $d1->jenis_tinggal ?></td>
      <td><?= $d1->no_tlprumah ?></td>
      <td><?= $d1->no_tlppribadi ?></td>
      <td><?= $d1->email_pribadi ?></td>
      <td><?= $d1->no_ujian ?></td>
      <td><?= $d1->penerima_pks ?></td>
      <td><?= $d1->no_pks ?></td>
      <td><?= $d3->nama_ayah ?></td>
      <td><?= $d3->tahun_lahir_ayah ?></td>
      <td><?= $d3->perkerjaan_ayah ?></td>
      <td><?= $d3->pendidikan_ayah ?></td>
      <td><?= $d3->penghasilan_ayah ?></td>
      <td><?= $d4->nama_ibu ?></td>
      <td><?= $d4->tahun_lahir_ibu ?></td>
      <td><?= $d4->perkerjaan_ibu ?></td>
      <td><?= $d4->pendidikan_ibu ?></td>
      <td><?= $d4->penghasilan_ibu ?></td>
      <td><?= $d5->nama_wali ?></td>
      <td><?= $d5->tahun_lahir_wali ?></td>
      <td><?= $d5->perkerjaan_wali ?></td>
      <td><?= $d5->pendidikan_wali ?></td>
      <td><?= $d5->penghasilan_wali ?></td>
      <td><?= $d8->tinggi_badan ?></td>
      <td><?= $d8->berat_badan ?></td>
      <td><?= $d8->jarak_sekolah ?></td>
      <td><?= $d8->jarak_lebih_sekolah ?></td>
      <td><?= $d8->waktu_ke_sekolah ?></td>
      <td><?= $d8->waktu_lebih_ke_sekolah ?></td>
      <td><?= $d8->anak_ke_berapa ?></td>
      <td><?= $d8->dari_keberapa ?></td>
      <td><?= $d8->kandung ?></td>
      <td><?= $d8->tiri ?></td>
      <td><?= $d8->angkat ?></td>
      <td><?= $d6->jenis_lomba ?></td>
      <td><?= $d6->tingkat ?></td>
      <td><?= $d6->nama_prestasi ?></td>
      <td><?= $d6->tahun ?></td>
      <td><?= $d6->penyelenggara ?></td>
      <td><?= $d7->jenis_beasiswa ?></td>
      <td><?= $d7->sumber_beasiswa ?></td>
      <td><?= $d7->tahun_mulai ?></td>
      <td><?= $d7->tahun_selesai ?></td>
    </tr>
    <?php $i++ ?>

  		<?php endif ?>

  	<?php endforeach ?>
  	<?php endforeach ?>
  	<?php endforeach ?>
  	<?php endforeach ?>
  	<?php endforeach ?>
  	<?php endforeach ?>
  	<?php endforeach ?>
  	<?php endforeach ?>
  </tbody>
</table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>