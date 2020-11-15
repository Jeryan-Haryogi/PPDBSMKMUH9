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
 <script type="text/javascript"
            src="https://app.sandbox.midtrans.com/snap/snap.js"
            data-client-key="SB-Mid-client-h-V2riTsOnItZvxF"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Cetak Formulir Pendaftaran</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Peserta Didik Baru</a></li>
              <li class="breadcrumb-item active">Cetak Pengisian Formulir</li>
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

        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
       


            <!-- TO DO List -->
            <div class="alert alert-info" role="alert">
  <h4 class="alert-heading">INFORMASI</h4>
  <p>Untuk Mencetak Bukti Pendaftaran Peserta Didik Baru diminta melunasi biaya pendaftaran, dan melengkapi berkas yang dibutuhkan, Biaya Pendaftaran ini Bisa Menggunakan Berbaya Macam Apa Saja Yang Tertera Di Fitur Pembayaran </p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
</div>
              <div class="alert alert-success " role="alert">
                CETAK FORMULIR  INDENTITAS PESERTA DIDIK 
</div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                 <h5 class="text-info">Pengisian Formulir</h5>
                 
                </h3>

                
              </div>

              <!-- /.card-header -->
              <div class="card-body">
                <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                    <ul class="list-group list-group-flush">
                    <?php if ($data == NULL) {
                      echo "<h3 class'text-center'>Isikan Formulir Anda Terlebih Dahulu</h3>";
                   die();
                    } ?>
                          <?php foreach ($data as $key => $value): ?>

                      <li class="list-group-item" ><h5><b>Nama Lengkap : <span id="nama_lengkap"><?= $value->nama_lengkap ?></span></b></h5></li>
                      <li class="list-group-item"><h5><b>Nama Panggilan : <?= $value->nama_panggilan ?></b></h5></li>
                      <li class="list-group-item"><b><h5>Jenis Kelamin : <?= $value->jenis_kelamin ?></b></h5></li>
                      <li class="list-group-item"><h5><b>NISN: <?= $value->nisn ?></b></h5></li>
                      <li class="list-group-item"><h5><b>Nomer Induk Keluarga (NIK): <?= $value->nik ?></b></h5></li>
                      <li class="list-group-item"><h5><b>Agama : <?= $value->agama ?></b></h5></li>
                       <li class="list-group-item"><h5><b>Berkebutuhan Khusus : <?= $value->kebutuhan_khusus ?></b></h5></li>
                        <li class="list-group-item" ><h5><b>Alamat Tempat Tinggal :<span id="alamat"><?= $value->alamat ?></span> </b></h5></li> 
                       <li class="list-group-item"><h5><b>Dusun / Perumahan : <?= $value->perumahan ?></b></h5></li>
                        <li class="list-group-item"><h5><b>Kelurahan / Desa : <?= $value->kelu_des ?></b></h5></li>
                          <li class="list-group-item"><h5><b>Kecamatan : <?= $value->kecamatan ?></b></h5></li>
                          <li class="list-group-item"><h5><b>Kabupaten / Kota : <?= $value->agama ?></b></h5></li>
                            <li class="list-group-item" id="provinsi"><h5><b>Provinsi :   <?php foreach ($data2['rajaongkir']['results'] as $prov): ?>
                     <?php if ($value->provinsi ==  $prov['province_id']) {
                      echo $prov['province'];
                     } ?>

                    <?php endforeach ?></b></h5></li>
                     <li class="list-group-item"><h5><b>Alat Transportasi Sekolah  : <?= $value->alat_transpotasi ?></b></h5></li>
                      <li class="list-group-item"><h5><b>Jenis Tinggal : <?= $value->jenis_tinggal ?></b></h5></li>
                       <li class="list-group-item"><h5><b>Nomer Telpon Rumah: <?= $value->no_tlprumah ?></b></h5></li>
                        <li class="list-group-item" id="no_hp"><h5><b>Nomer Telpon Pribadi: <?= $value->no_tlppribadi ?></b></h5></li>
                         <li class="list-group-item"><h5><b>Email  Pribadi :<span id="email_pribadi"> <?= $value->email_pribadi ?></span></b></h5></li>
                          <li class="list-group-item"><h5><b>Nomer Ujian Nasional : <?= $value->agama ?></b></h5></li>
                           <li class="list-group-item"><h5><b>Apakah Sebagai Penerima KPS : <?= $value->penerima_pks ?></b></h5></li>
                            <li class="list-group-item"><h5><b>No. KPS : <?= $value->no_pks ?></b></h5></li>
                      </ul>
                      
                          <?php endforeach ?>
                  </div>
                  <div class="col-sm-6">
                     <?php foreach ($data as $key => $value2): ?>

                   <!--   <img src="{{asset('peserta/assets')}}/uploadfoto/<?= $value2->foto ?>" width='100%'> -->
                     
                     <div class="row">
                       <div class="col-sm-12 text-center">
                        <a href="#" id="pay-button">
                         <img src="https://ecs7.tokopedia.net/img/ovo/microsite/ovo-premier-benefit3.png">
                         </a>
                         <h2><b>KLIK ICON PEMBAYARAN</b></h2>
                         <input type="hidden" name="id_order" id="id_order" value="<?= $value2->id_peserta_didik ?>">
                       </div>
                     </div>
                     <hr>
                     <?php break; ?>
                          <?php endforeach ?>
                         
                          <div class="card">
                      <div class="card-body">
                      <h5 class="card-title"><b>Detail Pembayaran</b></h5>
                      <br>
                      <?php foreach ($data as $key => $jancuk): ?>
                         <?php foreach ($response_transaksi as $key => $kntl): ?>
                     <?php if ($jancuk->id_peserta_didik == $kntl->order_by_id): ?>
                        <?php if ($kntl->transaction_status === "pending"): ?>
                          <div class="alert alert-danger  " role="alert">
                          Status Pesan :  <?= $kntl->transaction_status ?> (Menunggu Transfer Pembayaran )
                        </div>

                        <?php else: ?>
                          <div class="alert alert-success  " role="alert">
                            Status Pesan : Berhasil (Transfer Pembayaran Berhasil)
                          </div>
                        <?php endif ?>
                        
                        <?php break; ?>
                      <?php else: ?>
                         <p class="card-text text-danger">Anda Belum Melakukan Pembayaran</p>

                     <?php break; ?>
                     <?php endif ?>


                          <?php endforeach ?> 

                     <?php break; ?>
                    <?php endforeach ?>  



                      <?php foreach ($data as $key => $value11): ?>
                         <?php foreach ($response_transaksi as $key => $value9): ?>
                     <?php if ($value11->id_peserta_didik == $value9->order_by_id): ?>


                      <hr>
                       <span class="card-text">Nama Lengkap : <?= $value11->nama_lengkap ?></span>
                       <br>
                       <span class="card-text">email:  <?= $value11->email_pribadi ?></span>
                       <br>
                        <span class="card-text">Status Pesan:  <?= $value9->status_message ?></span>
                        <br>
                        <span class="card-text">Id Transaksi :  <?= $value9->transaction_id ?></span>
                        <br>
                        <span class="card-text">Pembayaran :  <?= $value9->gross_amount?></span>
                        <br>
                        <span class="card-text">Tipe Pembayaran :  <?= $value9->payment_type ?></span>
                        <br>
                        <?php if ($value9->transaction_status === "pending"): ?>
                          
                        <span class="card-text text-danger">Status Pesan :  <?= $value9->transaction_status ?> (Menunggu Transfer Pembayaran )</span>
                        <?php else: ?>
                          <span class="card-text text-success">Status Pesan : berhasil (Transfer Pembayaran Berhasil)</span>
                        <?php endif ?>
                        <br>
                        <span class="card-text ">Waktu Transaksi :  <?= $value9->transaction_time ?></span>
                        <?php break; ?>
                      <?php else: ?>
                     <?php endif ?>



                          <?php endforeach ?> 

                     <?php break; ?>

                    <?php endforeach ?>  
                     </div>
                  </div>
                  </div>
                     <div class="col-sm-6">
                    <ul class="list-group list-group-flush">
                          <?php foreach ($data as $key => $value3): ?>
                      <div class="row mt-4">
                        <div class="col-sm-6">
                          <?php foreach ($response_transaksi as $key => $kontol): ?>
                            <?php if ($kontol->transaction_status === "pending"): ?>
                             <button disabled=""  class="btn btn-info btn-lg btn-block">Cetak</button>   
                                                           <?php break; ?>

                              <?php else: ?>
                                <a href="{{url('peserta/cetak-formulir-pendaftaran')}}/<?= $value3->id_peserta_didik ?>" class="btn btn-info btn-lg btn-block">Cetak</a>     
                                <?php break; ?>

                            <?php endif ?>
                          <?php endforeach ?>
                       
                        </div>
                         <div class="col-sm-6">
                           <a href="{{url('peserta/update-formulir-pendaftaran')}}/<?= $value3->id_peserta_didik ?>" class="btn btn-info btn-lg btn-block">Update</a>
                        </div>
                      </div>
                          <?php endforeach ?>
                  </div>

                </div>
                </div>
              </div>
              <!-- /.card-body -->
            
            </div>
          <form id="payment-form" method="post" action="{{url('peserta/snapfinish')}}">
                              <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                              <input type="hidden" name="result_type" id="result-type" value=""></div>
                              <input type="hidden" name="result_data" id="result-data" value=""></div>
                              <input style="border-radius: 20px;" type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap2"  name="nama_lengkap2" >
                            </form>
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
<script type="text/javascript">
  
    $('#pay-button').click(function (event) {
      var nama_lengkap = $("#nama_lengkap").text();
      var alamat = $("#alamat").text();
      var no_hp = $("#no_hp").text();
      var provinsi = $("#provinsi").text();
      var email_pribadi = $("#email_pribadi").text();
      var id_order = $("#id_order").val();
      event.preventDefault();
      $(this).attr("disabled", "disabled");
    
    $.ajax({
      type: "GET",
      url: "{{url('peserta/snaptoken')}}",
      cache: false,
      data: {
        id_order : id_order,
        nama_lengkap: nama_lengkap,
        no_hp: no_hp,
        alamat: alamat,
        email_pribadi: email_pribadi
      },
      success: function(data) {
        //location = data;

        console.log('token = '+data);
        
        var resultType = document.getElementById('result-type');
        var resultData = document.getElementById('result-data');

        function changeResult(type,data,nama_lengkap){
          $("#result-type").val(type);
          $("#result-data").val(JSON.stringify(data));
          $("#nama_lengkap2").val(nama_lengkap);
          //resultType.innerHTML = type;
          //resultData.innerHTML = JSON.stringify(data);
        }

        snap.pay(data, {
          
          onSuccess: function(result){
            changeResult('success', result);
            console.log(result.status_message);
            console.log(result);
            $("#payment-form").submit();
          },
          onPending: function(result){
            changeResult('pending', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          },
          onError: function(result){
            changeResult('error', result);
            console.log(result.status_message);
            $("#payment-form").submit();
          }
        });
      }
    });
  });

</script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
