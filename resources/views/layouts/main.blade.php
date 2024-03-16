<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

     <!-- Font Awesome icons (free version)-->
     <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

     <!-- Google fonts-->
     <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    
     <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />

     <!-- Core theme CSS (includes Bootstrap)-->
     <link href="css/new-styles.css" rel="stylesheet" />

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    {{-- Bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    {{-- My Css --}}
    <link rel="stylesheet" href="/css/style.css">

    <title>SIMAQODE</title>
  </head>
  <body>

    @include('partials.navbar')

      {{-- <div class="container mt-4">
        @yield('container')
      </div> --}}
   

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    

      <!-- Page Header-->
      {{-- <style>
        .masthead {
            background-image: url('assets/img/home-bg.jpg');
            /* Properti lainnya */
        }
    </style> --}}
      <header class="masthead" style="background-image: url('img/home-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="site-heading">
                        <h1>SIMAQODE</h1>
                        <span class="subheading">Web Peminjaman Aset dan Ruangan</span>
                    </div>
                </div>
            </div>
        </div>
    </header>


    <div class="card mb-3 mx-auto" style="max-width: 640px;">
      <div class="row no-gutters">
          <div class="col-md-8 pr-3">
              <img src="img/lab.jpg" class="card-img" alt="..." style="width: 100%; height: 100%;">
          </div>
          <div class="col-md-4">
              <div class="card-body d-flex flex-column">
                  <h5 class="card-title">Pilih Peminjaman</h5>
                  
                  <button type="button" class="btn btn-secondary mb-2">
                    <i class="fas fa-swatchbook mr-2"></i> ASET
                  </button>
                  <button type="button" class="btn btn-secondary">
                    <i class="fas fa-home mr-2"></i> RUANGAN
                  </button>
              </div>
          </div>
      </div>
    </div>
    
      
    

  </body>
  @include('partials.footer')
</html>

