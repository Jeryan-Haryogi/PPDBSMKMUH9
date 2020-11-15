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
<!DOCTYPE html>
<html>
<head>
  <title>Cetak Bukti Pendaftaran PPDB SMK Muhammadiyah 9 Jakarta</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css">
  span {
    margin-top: -2000px;
  }

</style>
<body>
 
    <div >
      <h3 class="text-center"><b>SMK MUHAMMADIYAH 9 JAKARTA</b></h3>
      <p class="text-center"><b>Alamat:</b> Jl. Panjang No.30C, RT.2/RW.8, Cipulir, Kec. Kby. Lama, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12230</p>
     <hr style="border-bottom: 2px solid black;">
     <h4 style="color: red; font-weight: bold;  font-family: arial; font-size: 30px; text-align: center;"><b>BUKTI PENDAFTARAN</b></h4>
     <h4 style="text-align: center; font-family: arial; "><u>PPDB SMK MUHAMMADIYAH 9 JAKARTA </u></h4>
     <?php foreach ($jancuk as $key => $value): ?>
        
      <h1 style="text-align : center; font-size: 55px; font-family: arial; margin-top: -10px;"><b><?= $value->token_jurusan ?></b></h1>
     <?php endforeach ?>
     <table class="table text-center" >
  <tbody>
    <tr>
      <th scope="row"><h3><b>DATA DIRI SISWA</b></h3></th>
      
    </tr>
    <tr>
      <td><h4>NOMER INDUK SISWA NASIONAL</h4>
        <br>
          <?php foreach ($jancuk as $key => $value2): ?>
        
      <h4 style="text-align: center; font-family: arial; margin-top: -10px;"><?= $value2->nisn ?></h4>
     <?php endforeach ?>
      </td>
      
      
    </tr>
  </tbody>
</table>
 <table class="table" >
           
            <tbody>
              <?php foreach ($jancuk as $key => $han): ?>
                
              <tr>
                <td><p>Nama Lengkap : </p></td>
                <td><p><?= $han->nama_lengkap ?></p></td>
           
              </tr>
              <tr>
                <td><p>Nama Panggilan : </p>  </td>
                <td><p><?= $han->nama_panggilan ?></p></td>
              </tr>

              <tr>
                <td><p>Jenis Kelamin : </p>  </td>
                <td><p><?= $han->jenis_kelamin ?></p></td>
              </tr>
              <tr>
                <td><p>NISN : </p>  </td>
                <td><p><?= $han->nisn ?></p></td>
              </tr>
               <tr>
                <td><p>No.Induk Kependudukan (NIK) : </p>  </td>
                <td><p><?= $han->nik ?></p></td>
              </tr>
               <tr>
                <td><p>Tempat, Tanggal Lahir : </p>  </td>
                <td><p><?= $han->ttgl ?></p></td>
              </tr>
               <tr>
                <td><p>Berkebutuhan Khusus : </p>  </td>
                <td><p><?= $han->kebutuhan_khusus ?></p></td>
              </tr>
               <tr>
                <td><p>Dusun / Perumahan : </p>  </td>
                <td><p><?= $han->perumahan ?></p></td>
              </tr>
               <tr>
                <td><p>Kelurahan Desa : </p>  </td>
                <td><p><?= $han->kelu_des ?></p></td>
              </tr>
               <tr>
                <td><p>Kecamatan : </p>  </td>
                <td><p><?= $han->kecamatan ?></p></td>
              </tr>
               
              <?php if ($data2['rajaongkir']['status']['code'] == 200): ?>
                <tr>
                <td><p>Kabupaten / Kota : </p>  </td>
                <td>
                    <?php foreach ($data2['rajaongkir']['results'] as $prov): ?>
                     <?php if ($han->provinsi ==  $prov['province_id']) {
                      echo $prov['province'];
                     } ?>

                    <?php endforeach ?></td>
              </tr>
                  <tr>
                <td><p>Alat Transpotasi Sekolah : </p>  </td>
                <td><p><?= $han->alat_transpotasi ?></p></td>
              </tr>
              <tr>
                <td><p>Jenis Tinggal : </p>  </td>
                <td><p><?= $han->jenis_tinggal ?></p></td>
              </tr>
              <tr>
                <td><p>No Telpon Rumah : </p>  </td>
                <td><p><?= $han->no_tlprumah ?></p></td>
              </tr>
              <tr>
                <td><p>No Hp : </p>  </td>
                <td><p><?= $han->no_tlppribadi ?></p></td>
              </tr>
              <tr>
                <td><p>No Ujian Nasional SMP / MTS : </p>  </td>
                <td><p><?= $han->no_ujian ?></p></td>
              </tr>
              <tr>
                <td><p>Apakah Sebagai Penerima KPS: </p>  </td>
                <td><p><?= $han->penerima_pks ?></p></td>
              </tr>
              <tr>
                <td><p>No. KPS : </p>  </td>
                <td><p><?= $han->no_pks ?></p></td>
              </tr>

               <?php endif ?>
                
              <?php endforeach ?>
            </tbody>
          </table>
     <hr style="border-bottom: 1px solid black">
    <table class="table"> 
      <tbody>
          <tr>
            <td></td>
            <td><b>Yang bertanda tangan Orang Tua / Wali atau Siswa</b> <br> 
            <?= date('d-m-Y') ?> <br> <span class="ml-2"><b>Responden</b></span>
            </td>
          </tr>
           <tr >
             <td><b>Verifikasi Peserta Didik  Baru </b>
              <p>Bidang Kesiswaan SMK Muhammadiyah 9 Jakarta</p>
              <span >
              (.............................................................)<br>

              </span>
              <br>
              <span  class="text-center"> <b>Tanda Tangan & Nama Terang</b></span>
             </td>
            <td>
              <b>Bertanggung Jawab secara hukum terhadap kebenaran data yang tercantum</b>
              <br>
              <br>
              <br>
              <span >
              (.............................................................)<br>

              </span>
              <br>
              <span  class="text-center"> <b>Tanda Tangan & Nama Terang</b></span>
            </td>
          </tr>
        </tbody>
      </table>

  </div>
</body>
</html>