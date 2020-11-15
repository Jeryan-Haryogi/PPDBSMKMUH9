
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
        <div class="row">
          
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?= $bayar ?></h3>

                <p>Peserta Didik Yang Menggunakan Metode Pembayaran</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?= $datapeserta ?></h3>

                <p>Peserta Didik Yang Sudah Terdaftar</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?= $konfirmasi ?></h3>

                <p>Peserta Didik Yang Sudah Terkonfirmasi / Terverifikasi</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
       


            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                 <h5 class="text-info">PROSEDUR PENDAFTARAN ONLINE</h5>
                 
                </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
             <ol style="font-size: 18px;">
               <li>Setelah memahami Persyaratan UMUM, lakukan pengisisian formulir online.</li>
               <li>Selanjutnya lakukan pembayaran pembelian formulir dengan cara mentransfer.</li>
               <li>Hubungi Contact person dengan menyertai bukti tranfer selanjutnya akan calon siswa diberik link dan token ujian seleksi secara online</li>
               <li>Setelah dinyatakan LULUS testonline calonsiswa melanjutkan wawancara melalui videocall</li>
               <li>Selanjutnya siswa diminta meluniasi biaya pendaftaran, dan melengkpai berkas yang dibutuhkan.</li>
             </ol>
               
              </div>
              <!-- /.card-body -->
            
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  PERSYARATAN UMUM
                </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <p style="font-size: 18px;">Usia pada bulan Juli 2020 maksimal 19 tahun.
Mengisi formulir pendaftaran yang telah disediakan, diserahkan ke sekolah pada waktu yang ditetapkan dilampiri berkas lain yang ditentukan.
Menyerahkan foto copy Ijazah SMP/Madrasah dilegalisir oleh Kepala Sekolah Ybs, rangkap 3 (tiga).</p>
<ol style="font-size: 18px;">
               <li>Melampirkan foto copy Surat Keterangan Hasil Ujian Nasional (SKHUN) dilegalisir Kepala Sekolah Ybs,
rangkap 3 (tiga)</li>
               <li> Melampirkan foto copy Raport SMP/Madrasah Semester V dan Kelas IX, rangkap 3 (tiga).</li>
               <li>  Wajib mengikuti dan lulus tes seleksi yang diselenggarakan sekolah.</li>
               <li>  Pendaftaran peserta seleksi (Formulir) Rp. 150.000,- (seratus lima puluh ribu rupiah)</li>
               <li>. Biaya dibayar saat Daftar Ulang pada waktu yang ditentukan, setelah ybs.Dinyatakan diterima/lulus seleksi:</li>
             </ol>
              </div>
              <!-- /.card-body -->
            
            </div>
            <!-- /.card -->
          </section>
           <section class="col-lg-5 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
       


            <!-- TO DO List -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="ion ion-clipboard mr-1"></i>
                 Brosur
                </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
               <img src="https://smkmuh9.sch.id/wp-content/uploads/2020/07/promosi.jpg" width="100%">
               
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
    <!-- /.content -->
  </div>