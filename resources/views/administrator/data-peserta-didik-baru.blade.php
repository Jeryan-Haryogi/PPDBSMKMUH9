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
                                            Data Peserta Didik Baru
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
                    <!-- Main page content-->
                    <div class="container mt-n10">
                         <div class="card card-icon mb-4">
                            <div class="row no-gutters">
                                <div class="col-sm-6 text-center mt-5">
                                  <img src="{{url('admin/assets/img')}}/orang.svg" width="100%">
                                </div>
                                <div class="col-sm-6 mt-5">
                                  <h1><b>Data Peserta Didik PPDB Online</b></h1>
                                  <h1><?= date('Y') ?>/ <?= date('Y', strtotime('+1 year')) ?></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card mb-4">
                            <div class="card-header">Data Peserta Didik Baru</div>
                            <div class="card-body">
                                <div class="datatable">
                                   <table id="users-list-datatable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Panggilan</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nisn</th>
                                    <th>NIS</th>
                                    <th>Minat Jurusan</th>
                                    <th>No Pendaftaran</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach ($data as $key => $value): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><p class="nama_lengkap"><?= $value->nama_lengkap ?></p>
                                    </td>
                                    <td><p class="nama_lengkap"><?= $value->nama_panggilan ?></p>
                                    </td>
                                    <td><p class="jenis_kelamin"><?= $value->jenis_kelamin ?></p></td>
                                    <td><p class="nins"><?= $value->nisn ?></p></td>
                                    <td><p class="nis"><?= $value->nis ?></p></td>
                                          <td><p class="jurusan"><?= $value->jurusan ?></p></td>
                                            <td><?= $value->token_jurusan ?></td>
                                    <td>
                                      <a href="#" data-id="<?= $value->id_peserta_didik ?>"data-pendaftaran="<?=$value->token_jurusan ?>"  data-namalengkap="<?= $value->nama_lengkap ?>" data-panggil="<?= $value->nama_panggilan ?>" data-foto="<?= $value->foto ?>"
                                      data-kelamin="<?= $value->jenis_kelamin ?>" data-nisn="<?= $value->nisn ?>" data-nis="<?= $value->nis ?>" data-sekolah="<?= $value->asal_sekolah ?>" data-nik="<?= $value->nik ?>" data-alhir="<?= $value->ttgl ?>" data-jurusan="<?= $value->jurusan ?>" data-agama="<?= $value->agama ?>" data-khusus="<?= $value->kebutuhan_khusus ?>" data-alamat="<?= $value->alamat ?>" data-perumahan="<?= $value->perumahan ?>" data-rt="<?= $value->rt ?>" data-rw="<?= $value->rw ?>" data-kodepos="<?= $value->kodepos ?>" data-tranpotasi="<?= $value->alat_transpotasi ?>" data-tinggal="<?= $value->jenis_tinggal ?>" data-norumah="<?= $value->no_tlprumah ?>" data-nopribadi="<?= $value->no_tlppribadi ?>" data-email="<?= $value->email_pribadi ?>" data-noujian="<?= $value->no_ujian ?>" data-penerimapks="<?= $value->penerima_pks ?>" data-nopks="<?= $value->no_pks ?>" data-toggle="modal" data-target="#editoperator" class="badge  badge-warning dataaa">
                                      <i data-feather="eye"> </i>
                                    </a>
                                    <form action="{{url('Administrator/ppdb/peserta-didik-baru/')}}/<?= date('Y')?>-<?= date('Y',strtotime('+1 year')) ?>/<?= $value->id_peserta_didik ?>" method="post">
                                      @csrf
                                      @method('delete')
                                      <button class="badge badge-danger" type="submit" name="hapus" onclick="return confirm('Yakin Untuk Konfirmasi Data Ini??')" ><i data-feather="trash"> </i><span class="mt-2"></span></button>
                                      
                                    </form>
                                    </td>
                                </tr>

                                          
                                <?php $i++ ?>
                              <?php endforeach ?>
                               </tbody>
                        </table>
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