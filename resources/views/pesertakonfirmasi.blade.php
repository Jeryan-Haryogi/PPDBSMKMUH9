<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script type="text/javascript" src="http://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <title>Data Peserta Didik Yang Terkonfirmasi!</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <div class="container">
    <a class="navbar-brand text-white" href="{{url('/')}}">SMK Muhammadiyah 9</a>
   
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
    <div class="navbar-nav ml-auto">
      <a class="nav-link  text-white" href="{{url('Peserta-Didik-Terverifikasi')}}">Daftar Peserta Terkonfirmasi</a>
    </div>
  </div>
  </nav>
  <section class="mt-5">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <h2><b>Data Peserta Didik Yang Terverifikasi/ Terkonfirmasi</b></h2>
      <table id="myTable" class="table mt-5">
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
                                    <th>Status Pendaftaran</th>
                                </tr>
                            </thead>
                            <tbody>
                              <?php $i = 1; ?>
                              <?php foreach ($data as $key => $value): ?>
                                <?php foreach ($data2 as $key => $value2): ?>
                                    <?php if ($value->id_peserta_didik === $value2->id_verifikasi_perserta_didik): ?>
                                        
                                    
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
                                            <td><p class="badge badge-primary"><?= $value2->status_verifikasi ?></p></td>
                                    <td>
                                     <!--  <a href="#" data-id="<?= $value->id_peserta_didik ?>"data-pendaftaran="<?=$value->token_jurusan ?>"  data-namalengkap="<?= $value->nama_lengkap ?>" data-panggil="<?= $value->nama_panggilan ?>" data-foto="<?= $value->foto ?>"
                                      data-kelamin="<?= $value->jenis_kelamin ?>" data-nisn="<?= $value->nisn ?>" data-nis="<?= $value->nis ?>" data-sekolah="<?= $value->asal_sekolah ?>" data-nik="<?= $value->nik ?>" data-alhir="<?= $value->ttgl ?>" data-jurusan="<?= $value->jurusan ?>" data-agama="<?= $value->agama ?>" data-khusus="<?= $value->kebutuhan_khusus ?>" data-alamat="<?= $value->alamat ?>" data-perumahan="<?= $value->perumahan ?>" data-rt="<?= $value->rt ?>" data-rw="<?= $value->rw ?>" data-kodepos="<?= $value->kodepos ?>" data-tranpotasi="<?= $value->alat_transpotasi ?>" data-tinggal="<?= $value->jenis_tinggal ?>" data-norumah="<?= $value->no_tlprumah ?>" data-nopribadi="<?= $value->no_tlppribadi ?>" data-email="<?= $value->email_pribadi ?>" data-noujian="<?= $value->no_ujian ?>" data-penerimapks="<?= $value->penerima_pks ?>" data-nopks="<?= $value->no_pks ?>" data-toggle="modal" data-target="#editoperator" class="badge  badge-warning dataaa">
                                      <i data-feather="eye"> </i>
                                    </a> -->
                                    </form>
                                    </td>
                                </tr>

                                          
                                <?php $i++ ?>

                                    <?php endif ?>
                                <?php endforeach ?>
                              <?php endforeach ?>
                               </tbody>
                        </table>
</table>
        </div>
      </div>
    </div>
  </section>
<section class="bg-dark " style="margin-top: 250px;">
  <div class="row">
    <div class="col-sm-12 mt-3  text-center text-white">
      
  <footer class="main-footer">
   <img src="https://instagram.fcgk18-1.fna.fbcdn.net/v/t51.2885-19/s150x150/119130451_353119272400275_9056301858843011120_n.jpg?_nc_ht=instagram.fcgk18-1.fna.fbcdn.net&_nc_cat=103&_nc_ohc=bWZ4YkZVRdYAX-OLZ9d&oh=08e59761c1bd6cf094f7093879117cce&oe=5FCAC240" width="5%" class="rounded-circle"> <strong>Copyright &copy;  2020 <a href="https://jeryan-haryogi.github.io/">Jeryan Haryogi</a>.</strong>
   (XII MM 1 2018-2021)
  </footer>
    </div>
  </div>
</section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
  </body>
</html>