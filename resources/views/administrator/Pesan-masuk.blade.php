<?php  ?>
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
                                            Pesan Masuk
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
                                  <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcRmiPtkhArKX4KyYkwjPRNPJy33OXzlItURcA&usqp=CAU" width="70%">
                                </div>
                                <div class="col-sm-6 mt-5">
                                  <h1 style="font-size: 50px;"><b>Pesan Masuk</b></h1>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class="card mb-4">
                            <div class="card-header">Pesan Masuk</div>
                            <div class="card-body">
                                <div class="datatable">
                                	<a href="{{url('Administrator/viewpasan')}}">View</a>
                                   <table id="users-list-datatable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nisn</th>
                                    <th>Nama Lengkap</th>
                                    <th>Email</th>
                                    <th>Pesan</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach ($data as $key => $value): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><p class="nama_lengkap"><?= $value->nisn ?></p>
                                    </td>
                                    <td><p class="nama_lengkap"><?= $value->nama_lengkap ?></p>
                                    </td>
                                    <td><p class="jenis_kelamin"><?= $value->email ?></p></td>
                                    <td><p class="nins"><?= $value->pesan ?></p></td>
                                    <td>
                                    	<a href="#" class="badge badge-primary dataaa" data-nisn="<?= $value->nisn ?>" data-email="<?= $value->email ?>" data-toggle="modal" data-target="#editoperator">Kirim Pesan</a>
                                    	<a href="#" class="badge badge-danger">Hapus</a>
                                    </td>
                                </tr>

                                          
                                <?php $i++ ?>
                              <?php endforeach ?>
                               </tbody>
                        </table>
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
			      	<form action="{{url('Administrator/Pesan-Masuk')}}" method="post">
			      		@csrf
           <div class="container">
             <div class="row">
               <div class="col-sm-12">
               	<h2><b>Balas Pesan</b></h2>
               	 <div class="form-group">
			    <input type="hidden" id="nisn" name="nisn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Email</label>
			    <input type="text" readonly="" name="email" id="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
			  </div>
			  <div class="row">
			  	<div class="col-sm-6">
			  	<div class="form-group">
			    <label for="exampleInputEmail1">Balas Pesan</label>
			   <textarea class="form-control" name="balas_pesan" id="exampleFormControlTextarea1" rows="3"></textarea>
			  </div>
			  	</div>
			  	<div class="col-sm-6">
			  	<div class="form-group">
			    <label for="exampleInputEmail1">Password Baru</label>
			    <input type="text" name="passwod_baru" class="form-control" placeholder="Masukan Password Baru">
			  </div>
			  	</div>
			  </div>
			  <button class="btn btn-primary btn-lg btn-block">Balas Pesan</button>
               </div>
             </div>
           </div>  
             <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div> 
      </form>
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
		var nisn =  $(this).data("nisn");
        var email = $(this).data("email");
      	$("#email").val(email);
      	$("#nisn").val(nisn);
			});		
			
		</script>