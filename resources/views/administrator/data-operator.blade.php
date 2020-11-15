<?php  ?>
 <link href="../../cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="filter"></i></div>
                                            Tables
                                        </h1>
                                        <div class="page-header-subtitle">An extended version of the DataTables library, customized for SB Admin Pro</div>
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
                                <div class="col-auto card-icon-aside bg-primary"><i class="mr-1 text-white-50" data-feather="alert-triangle"></i></div>
                                <div class="col">
                                    <div class="card-body py-5">
                                        <h5 class="card-title">Penambahan Data Operator</h5>
                                        <p class="card-text">Penambahan Data Operator Untuk Operator PPDB Online </p>
                                        <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#exampleModal" target="_blank">
                                            <i class="mr-1" data-feather="external-link"></i>
                                           Tambah
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card mb-4">
                            <div class="card-header">Extended DataTables</div>
                            <div class="card-body">
                                <div class="datatable">
                                    <table class="table table-bordered table-hover ml-3" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                 <th>Nama Lengkap</th>
                                                <th>NPWP</th>
                                                <th>Role Akses</th>
                                               	 <th>Updae</th>
                                               	 <th>delete</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Nama Lengkap</th>
                                                <th>NPWP</th>
                                                <th>Role Akses</th>
                                               	 <th>Update</th>
                                               	 <th>Delete</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                        	<?php foreach ($operator as $key => $value): ?>
                                        	<?php if ($value['role_akses'] == "Operator"): ?>		
                                            <tr>
                                                <td><?= $value['nama_lengkap'] ?></td>
                                                <td><?= $value['nisn'] ?></td>
                                                <td><div class="badge badge-primary badge-pill"><?= $value['role_akses'] ?></div></td>
                                                <td>
                                                	<a href="#" class="dataaa" data-toggle="modal" data-id="<?= $value['id_daftar_akun_peserta'] ?>" data-npwp="<?= $value['nisn'] ?>"  data-nama="<?= $value['nama_lengkap'] ?>" data-target="#editoperator"><i data-feather="edit"></i>Update</a></td>
                                                <td>
                                                	<form action="{{url('Administrator/data-operator')}}/<?= $value['id_daftar_akun_peserta'] ?>" method="post" >
                                                		@csrf
                                                		@method('delete')
                                                		<button  type="submit" name="hapus" class="btn btn-danger" onclick="return confirm('Yakin Data Ingin Dihapus??')"><i data-feather="trash"></i></button>
                                                	</form>
                                                </td>
                                            </tr>	

                                        		<?php endif ?>
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
			        
			        <div class="col-sm-12 mt-5 mt-5">

			          <form id="formupdate" action="{{url('Administrator/update-data-operator')}}" method="post">
			          	@csrf
			          <h2><b>Update Data Operator PPDB</b></h2>
			          <hr>
			          <div class="form-group">
			            <input type="hidden" class="form-control @error('npwp') is-invalid @enderror"  placeholder="Masukan Id Operator" name="id_operator" value="" id="id_operator">
			            </div>
			            <div class="form-group">
			            <label for="exampleInputEmail1">NPWP</label>
			            <input type="number" class="form-control @error('npwp') is-invalid @enderror"  placeholder="Masukan NPWP Operator" name="npwp" value="" id="npwp">
			            </div>
			           <div class="form-group">
			            <label for="exampleInputEmail1">Nama Lengkap</label>
			            <input type="text" class="form-control   @error('nama_lengkap') is-invalid @enderror "  placeholder="Masukan Nama Lengkap" name="nama_lengkap" value="" id="nama_lengkap">
			                       </div>
			          <div class="row">
			            <div class="col-sm-6">
			              <div class="form-group">
			            <label for="exampleInputEmail1">Password</label>
			            <input type="Password" class="form-control   @error('password') is-invalid @enderror" placeholder="Masukan Password" name="password" id="password">
			                         </div>
			            </div>
			             <div class="col-sm-6">
			              <div class="form-group">
			            <label for="exampleInputEmail1">Konfirmasi Password</label>
			            <input type="Password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Konfirmasi Password" name="password_confirmation" id="Konfirmasi_password">
			            </div>
			          <button type="submit"  id="update_dong" class="btn btn-primary col-sm-12 btn-lg btn-block mt-2">Update Operator Akun</button>
			      </div>
			  </div>
			</form>
			        </div>
			      </div>
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
				var npwp = $(this).data("npwp");
				var nama = $(this).data('nama');
				$('#id_operator').val(id);
				$('#npwp').val(npwp);
				$('#nama_lengkap').val(nama);
			});		
			
		</script>