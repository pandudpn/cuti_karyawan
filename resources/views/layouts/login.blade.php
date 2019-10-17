<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href={{ URL::asset("vendors/iconfonts/mdi/css/materialdesignicons.min.css") }}>
  <link rel="stylesheet" href={{ URL::asset("vendors/css/vendor.bundle.base.css") }}>
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href={{ URL::asset("css/style.css") }}>
  <!-- endinject -->
  <link rel="shortcut icon" href={{ URL::asset("images/favicon.png") }} />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            @if (session('alert'))
                <div class="alert alert-danger">
                  <h5 class="text-center">{{ session('alert') }}</h5>
                </div>
            @endif
            <div class="auth-form-light text-left p-5">
              <h4>Hai! Login untuk memulai</h4>
              {!! Form::open(['class' => 'pt-3']) !!}
                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="email@email.com">
                </div>
                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="******">
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src={{ URL::asset("vendors/js/vendor.bundle.base.js") }}></script>
  <script src={{ URL::asset("vendors/js/vendor.bundle.addons.js") }}></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src={{ URL::asset("js/off-canvas.js") }}></script>
  <script src={{ URL::asset("js/misc.js") }}></script>
  <!-- endinject -->
  <script>
    $(document).ready(function(){
      $('.alert').delay(5000).fadeOut('slow')
    })
  </script>
</body>

</html>