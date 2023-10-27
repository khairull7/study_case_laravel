<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Apoteker App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  </head>
<style>
  body {
    font-family: Arial, Helvetica, sans-serif;
  }
</style>
<body style="background: #e5e5e5">

    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container">
          <a class="navbar-brand" href="#">Apotek App</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Obat
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('medicine.home') }}">Data Obat</a></li>
                  <li><a class="dropdown-item" href="{{ route('medicine.create') }}">Tambah</a></li>
                  <li><a class="dropdown-item" href="{{ route('medicine.stock') }}">Stock</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Pembelian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('user.home') }}">Kelola Akun</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>

    <div class="container mt-5">
        @yield('content')
    </div>

    {{-- <script>
        // Daftar warna yang dapat digunakan
        var colors = ["maroon","purple","green","blue","orange",];
        var currentColor = 0;
        
        // Fungsi untuk mengubah warna latar belakang
        function changeBackgroundColor() {
            document.body.style.backgroundColor = colors[currentColor];
            currentColor = (currentColor + 1) % colors.length;
        }

        // Ubah warna latar belakang setiap 5 detik
        setInterval(changeBackgroundColor, 5000);
    </script> --}}

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    @stack('script')
</body>
</html>
