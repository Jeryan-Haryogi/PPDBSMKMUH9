<?php  ?>
 <link href="{{url('admin')}}/cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="filter"></i></div>
                                            Data Peserta Didik Baru Terkonfirmasi
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <?php if (session('status')): ?>
                    	<script type="text/javascript">
                    		setTimeout(function(){
                    			Swal.fire({
							  position: 'top-end',
							  icon: 'success',
							  title: '<?= session('status') ?>',
							  showConfirmButton: false,
							  timer: 1500
							});
                    		}, 1500);
                    	</script>
                    <?php endif ?>

                    <?php if (session('status2')): ?>
                        <script type="text/javascript">
                            setTimeout(function(){
                                Swal.fire({
                              position: 'top-end',
                              icon: 'error',
                              title: '<?= session('status2') ?>',
                              showConfirmButton: false,
                              timer: 1500
                            });
                            }, 1500);
                        </script>
                    <?php endif ?>
                    <!-- Main page content-->
                    <div class="container mt-n10">
                         <div class="card card-icon mb-4">
                            <div class="row no-gutters">
                                <div class="col-sm-6  " style="margin-top: 90px;">
                                    <h1 class="m-4" style="font-size: 40px;"><b>Pengaturan Sistem</b></h1>
                                </div>
                                <div class="col-sm-6 mt-5">
                                  
                                  <img src="{{url('admin/assets/img')}}/atur.jpg" width="70%">
                                </div>
                            </div>
                        </div>
                          <div class="card">
  <div class="card-body">
    <div class="row">
        <div class="col-sm-6">

<h2 class="mt-5"><b>Ubah NPWP / Password Admin</b></h2>
<form action="{{url('Administrator/Ubah-Admin')}}" method="post">
    @csrf
    <input type="hidden" value="<?= $getnama ?>" name="nama_lengkap">
    <div class="form-group">
            <label for="exampleInputEmail1">NPWP</label>
            <input type="number"class="form-control @error('npwp') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="npwp">
          </div>
           <div class="form-group">
    <label for="exampleInputEmail1">Password baru</label>
    <input type="password" class="form-control  @error('password_baru') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="password_baru">
  </div>
  <button class="btn btn-primary btn-lg btn-block"><i class="fas fa-user-edit"></i> Ubah</button>
</form>

        </div>
        <div class="col-sm-6">
            <h2 class="mt-5"><b> MODE MANTENICE</b></h2>
<h5>Mode Mantenenice dibuat Untuk Memperbaiki Situs / server ketika terjadi kendala atau kerusakan pada sistem </h5>
<form action="{{url('Administrator/server-down')}}" method="post">
    @csrf
    <button class="btn btn-danger btn-lg btn-block" onclick="return confirm('Yakin Untuk Mantenenice???')"><i class="fas fa-exclamation-triangle"></i> MANTENICE</button>
</form>

<h2 class="mt-5"><b>DELETE ALL DATABASE</b></h2>
<h5>Delete Semua isi database untuk membersihkan data pada database (Kecuali Administrator)</h5>
<form action="{{url('Administrator/Delete-Database')}}" method="post">
    @csrf
     <input type="hidden" value="<?= $getnama ?>" name="nama_lengkap">
    <button class="btn btn-warning btn-lg btn-block" onclick="return confirm('Yakin Mau Hapus database??')">Delete</button>
</form>
        </div>
    </div>
  </div>
</div>

                      
   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <section>
    <div class="container">
      <div class="row">
        
        <div class="col-sm-12 mt-5 mt-5">

          <form action="{{url('Administrator/data-operator')}}" method="post">
          <h2><b>Penambahan Data Operator PPDB</b></h2>
          <hr>
          @csrf      
            <div class="form-group">
            <label for="exampleInputEmail1">NPWP</label>
            <input type="number" class="form-control @error('npwp') is-invalid @enderror"  placeholder="Masukan NPWP Operator" name="npwp" value="">
            </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" class="form-control   @error('nama_lengkap') is-invalid @enderror "  placeholder="Masukan Nama Lengkap" name="nama_lengkap" value="">
                       </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="Password" class="form-control   @error('password') is-invalid @enderror" placeholder="Masukan Password" name="password">
                         </div>
            </div>
             <div class="col-sm-6">
              <div class="form-group">
            <label for="exampleInputEmail1">Konfirmasi Password</label>
            <input type="Password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Konfirmasi Password" name="password_confirmation">
            </div>
        
      </div>

  </div>
    <button class="btn btn-primary col-sm-12 btn-lg btn-block mt-2">Daftar Akun</button>
			</form>
			        </div>
			      </div>
			    </div>
			  </section>
			      </div>
			    
			    </div>
			  </div>
			</div>
			                


			<div class="modal fade" id="editoperator" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			      <section>
           <div class="container">
             <div class="row">
               <div class="col-sm-4">
                 <img src="" class="imagelol" width="100">
               </div>
               <div class="col-sm-8">
                 <h2><b>Data Peserta Didik</b></h2>
                 <span class="nama_lengkap"></span>
                 <br>
                 <span class="nama_panggilan"></span>
                 <br>
                 <span class="jenis_kelamin"></span>
               </div>
               <div class="col-sm-12">
                 <br>
                 <span class="token"></span>
                  <br>
                 <span class="nisn"></span>
                 <br>
                 <span class="nis"></span>
                 <br>
                 <span class="asal_sekolah"></span>
                 <br>
                 <span class="nik"></span>
                 <br>
                 <span class="ttgl"></span>
                 <br>
                 <span class="jurusan"></span>
                 <br>
                 <span class="agana"></span>
                 <br>
                 <span class="khusus"></span>
                 <br>
                 <span class="alamat"></span>
                 <br>
                 <span class="perumahan"></span>
                 <br>
                 <span class="rt"></span>
                 <br>
                 <span class="rw"></span>
                 <br>
                 <span class="kodepos"></span>
                 <br>
                 <span class="alat_transpotasi"></span>
                 <br>
                 <span class="jenis_tinggal"></span>
                 <br>
                 <span class="norumah"></span>
                 <br>
                 <span class="nopribadi"></span>
                 <br>
                 <span class="email"></span>
                 <br>
                 <span class="noujian"></span>
                 <br>
                 <span class="penerimapks"></span>
                 <br>
                 <span class="nopks"></span>
               </div>
             </div>
           </div>  
             <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> 
            </section>
			      </div>
			    </div>
			  </div>
			</div>       
                </main>

        <script src="{{url('admin')}}/js/scripts.js"></script>
        <script src="{{url('admin')}}/cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="{{url('admin')}}/cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="{{url('admin')}}/assets/demo/datatables-demo.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
		<script type="text/javascript">
			$('.dataaa').on('click', function(){
        var id = $(this).data("id");
        var nama_lengkap = $(this).data("namalengkap");
        var nama_panggilan = $(this).data("panggil");
        var token =  $(this).data("pendaftaran");
        var foto = $(this).data("foto");
        var kelamin = $(this).data("kelamin");
        var nisn = $(this).data("nisn");
        var nis = $(this).data("nis");
        var sekolah = $(this).data("sekolah");
        var nik = $(this).data("nik");
        var alhir = $(this).data("alhir");
        var jurusan = $(this).data("jurusan");
        var agama = $(this).data("agama");
        var khusus = $(this).data("khusus");
        var alamat =$(this).data("alamat");
        var perumahan = $(this).data("perumahan");
        var rt = $(this).data("rt");
        var rw = $(this).data("rw");
        var kodepos = $(this).data("kodepos");
        var transpotasi = $(this).data("transpotasi");
        var tinggal = $(this).data("tinggal");
        var norumah = $(this).data("norumah");
        var nopribadi = $(this).data("nopribadi");
        var email = $(this).data("email");
        var noujian = $(this).data("noujian");
        var penerima_pks = $(this).data("penerimapks");
        var nopks = $(this).data("nopks");
        $('.imagelol').attr('src', "{{url('peserta')}}/assets/uploadfoto/"+foto);
        $('.nama_lengkap').text('Nama Lengkap: '+nama_lengkap);
        $('.nama_panggilan').text('Nama Panggilan: '+nama_panggilan);
        $('.jenis_kelamin').text('Jenis Kelamin: '+kelamin);
        $('.nisn').text('Nisn: '+nisn);
        $('.nis').text('Nis: '+nis);
        $('.asal_sekolah').text('Asal Sekolah: '+sekolah);
        $('.nik').text('Nik: '+nik);
        $('.ttgl').text('Tempat, Tanggal Lahir: '+alhir);
        $('.jurusan').text('Jurusan: '+jurusan);
        $('.agana').text('Agama: '+agama);
        $('.khusus').text('Kebutuhan Khusus: '+khusus);
        $('.alamat').text('Alamat: '+alamat);
        $('.perumahan').text('Perumahan: '+perumahan);
        $('.rt').text('RT: '+rt);
        $('.rw').text('rw: '+rw);
        $('.kodepos').text('Kode Pos: '+kodepos);
        $('.alat_transpotasi').text('Alat transpotasi '+transpotasi);
        $('.jenis_tinggal').text('Jenis Tinggal: '+tinggal);
        $('.norumah').text('Nomer Rumah: '+norumah);
        $('.nopribadi').text('No Pribadi: '+nik);
        $('.email').text('email: '+email);
        $('.noujian').text('Nik: '+noujian);
        $('.penerimapks').text('Penerima KPS: '+penerima_pks);
        $('.nopks').text('No KPS: '+nopks);
        $('.token').text('No Pendaftaran: '+token);
			});		
			
		</script>