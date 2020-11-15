<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Daftar Akun PPDB Online SMK Muhammadiyah 9 jakarta</title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-dark ">
        <div class="container">
    <a class="navbar-brand text-white" href="#">SMK Muhammadiyah 9</a>
   
    
    </div>
  </nav>
  <section>
    <div class="container">
      <div class="row">
        <div class="col-sm-6 mt-5">
          <img src="{{url('cuk.png')}}" width="100%">
        </div>
        <div class="col-sm-6 mt-5 mt-5">
          <h2><b>Daftar Akun Untuk Login Pengisian Formulir PPDB Online</b></h2>
          <hr>
          <form action="{{url('daftar-akun')}}" method="post">
            @csrf
            <div class="form-group">
            <label for="exampleInputEmail1">Nisn</label>
            <input type="number" class="form-control  @error('nisn') is-invalid @enderror"  placeholder="Masukan NISN" name="nisn" value="{{old('nisn')}}">
            @error('nisn')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
           <div class="form-group">
            <label for="exampleInputEmail1">Nama Lengkap</label>
            <input type="text" class="form-control  @error('nama_lengkap') is-invalid @enderror"  placeholder="Masukan Nama Lengkap" name="nama_lengkap" value="{{old('nama_lengkap')}}">
             @error('nama_lengkap')
            <small class="text-danger">{{$message}}</small>
            @enderror
          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
            <label for="exampleInputEmail1">Password</label>
            <input type="Password" class="form-control  @error('password') is-invalid @enderror" placeholder="Masukan Password" name="password">
             @error('password')
            <small class="text-danger">{{$message}}</small>
            @enderror
            </div>
            </div>
             <div class="col-sm-6">
              <div class="form-group">
            <label for="exampleInputEmail1">Konfirmasi Password</label>
            <input type="Password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukan Konfirmasi Password" name="password_confirmation">
            </div>
          </div>
          <a href="{{url('login')}}" >Sudah Punya Akun Untuk Login</a>
          <button class="btn btn-primary btn-lg btn-block mt-2">Daftar Akun</button>
        </div>
      </div>
      </form>
    </div>
  </section>

  <footer class="text-center mt-5">
    <img src="https://instagram.fcgk18-1.fna.fbcdn.net/v/t51.2885-19/s150x150/119130451_353119272400275_9056301858843011120_n.jpg?_nc_ht=instagram.fcgk18-1.fna.fbcdn.net&_nc_cat=103&_nc_ohc=bWZ4YkZVRdYAX-OLZ9d&oh=08e59761c1bd6cf094f7093879117cce&oe=5FCAC240" class="rounded-circle" width="50" >
    <strong>Copyright &copy;  2020 <a href="https://jeryan-haryogi.github.io/">Jeryan Haryogi</a>.</strong>
   (XII MM 1 2018-2021)
  </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>