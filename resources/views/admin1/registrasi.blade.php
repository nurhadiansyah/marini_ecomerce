<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Pages / Register - Cahaya Wage</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link
      href=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css"
      rel="stylesheet"
    />
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
    </script>
    <script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js">
    </script>
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js">
    </script>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


  <!-- Favicons -->
  <link href="/admin/assets/img/favicon.png" rel="icon">
  <link href="/admin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/admin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/admin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/admin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="/admin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="/admin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/admin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/admin/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="">
                  <span class="d-none d-lg-block">Cahaya Wage</span>
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Buat Akun Baru!</h5>
                    <p class="text-center small">Masukkan detail data pribadi untuk membuat akun baru</p>
                  </div>

                  <form class="row g-3 needs-validation" action="/registrasi" method="POST">
                    @csrf

                    <input type="hidden" name="level" value="0">
                    <div class="col-12">
                      <label for="name" class="form-label">Nama</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ old('name') }}" required>
                      <div class="invalid-feedback">Masukkan nama anda</div>
                    </div>

                    <div class="col-12">
                      <label for="No_hp" class="form-label">No Hp</label>
                      <input type="text" name="No_hp" class="form-control @error('No_hp') is-invalid @enderror" id="No_hp" value="{{ old('No_hp') }}" required>
                      <div class="invalid-feedback">Masukkan Nomer HP</div>
                    </div>

                    <div class="col-12">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="text" name="tgl_lahir" id="tgl_lahir" placeholder="dd-mm-yyyy" value="{{ old('tgl_lahir') }}" min="1997-01-01" max="2030-12-31" class="date form-control @error('tgl_lahir') is-invalid @enderror" required>

                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required>
                        <div class="invalid-feedback">Masukkan Email</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Kata Sandi</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                      <div class="invalid-feedback">Masukkan Kata Sandi Anda!</div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Ulang Kata Sandi</label>
                      <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" required>
                      <div class="invalid-feedback">Kata Sandi Salah</div>
                    </div>



                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit">Buat Akun</button>
                    </div>
                    <div class="col-12">
                      <p class="small mb-0">Sudah punya akun? <a href="/login">Masuk</a></p>
                    </div>
                  </form>

                </div>
              </div>

              {{-- <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->

              </div> --}}

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

        <script type="text/javascript">
    $(".date").datepicker({
      format: "dd-mm-yyyy",
    });
  </script>

  <!-- Vendor JS Files -->
  <script src="/admin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/admin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="/admin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="/admin/assets/vendor/quill/quill.min.js"></script>
  <script src="/admin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="/admin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="/admin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/admin/assets/js/main.js"></script>

</body>

</html>
