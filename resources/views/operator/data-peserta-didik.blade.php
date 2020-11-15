
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- users list start -->
<section class="users-list-wrapper">
   <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">Well done!</h4>
  <p>Opeator Melakukan Verifikasi Perserta Didik Yang Telah Terdaftar Pada PPDB Online Verifikasi Ini untuk Konfirmasi Perserta Didik Yang Telah Terdaftar Kedalam sistem PPDB Online Ini, Operator Hanya Bisa Melakukan Verifikasi Perserta Didik </p>
  <hr>
</div>
<div class="alert alert-danger" role="alert">

  <p class="mb-0  text-dark"><b>Data Konfirmasi  Ini akan dikirimkan ke sistem administrator</b></p>
</div>
    <div class="users-list-table">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                   <table id="users-list-datatable" class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lengkap</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Nisn</th>
                                    <th>NIS</th>
                                    <th>Minat Jurusan</th>
                                    <th>No Pendaftaran</th>
                                    <th>Status Perserta</th>
                                    <th>Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach ($datapeserta as $key => $data): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><p class="nama_lengkap"><?= $data->nama_lengkap ?></p>
                                    </td>
                                    <td><p class="jenis_kelamin"><?= $data->jenis_kelamin ?></p></td>
                                    <td><p class="nins"><?= $data->nisn ?></p></td>
                                    <td><p class="nis"><?= $data->nis ?></p></td>
                                          <td><p class="jurusan"><?= $data->jurusan ?></p></td>
                                            <td><?= $data->token_jurusan ?></td>
                                            <td> 
                                              <?php foreach ($verifikasi_data as $key => $value): ?>
                                                <?php if ($value['id_verifikasi_perserta_didik'] == $data->id_peserta_didik) :?>
                                              <p class="badge badge-primary">Sudah Terkonfirmasi</p>

                                              
                                        <?php endif; ?>

                                              <?php endforeach ?>
                                        </td>
                                    <td>
                                      <a href="{{url('Opertor/Verikasi')}}/<?= $data->id_peserta_didik ?>" onclick="return confirm('Yakin Untuk Konfirmasi Data Ini??')" class="badge  badge-warning">
                                      Konfirmasi
                                    </a>
                                    <a href="{{url('Operator/detail-perserta-didik')}}/<?= $data->id_peserta_didik ?>" class="badge  badge-info">
                                      Detail
                                    </a>
                                    </td>
                                </tr>

                                          
                                <?php $i++ ?>
                              <?php endforeach ?>
                               </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</section>
</div>
</div>
</div>
