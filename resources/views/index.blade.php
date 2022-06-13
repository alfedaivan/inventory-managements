<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Ecommerce Dashboard &mdash; Stisla</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('/assets/template/css/style.css')}}">
  <link rel="stylesheet" href="{{url('/assets/template/css/components.css')}}">

</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <div class="border rounded-circle p-4 shadow-light mb-5 text-primary" style="width: fit-content">
              <svg style="width:50px;height:50px" viewBox="0 0 24 24">
                <path fill="currentColor" d="M6 19H8V21H6V19M12 3L2 8V21H4V13H20V21H22V8L12 3M8 11H4V9H8V11M14 11H10V9H14V11M20 11H16V9H20V11M6 15H8V17H6V15M10 15H12V17H10V15M10 19H12V21H10V19M14 19H16V21H14V19Z" />
              </svg>
            </div>
            <h4 class="text-dark font-weight-normal">Welcome to</h4>
            <h3 class="font-weight-bold text-dark">Inventory Management System</h3>
            <p class="text-muted mb-5" style="width: 70%">Before you Login, please make sure you already have an admin account.</p>

            @if(session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif

            <form action="{{ route('actionLogin') }}" method="post" class="needs-validation" novalidate="">
            @csrf
              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
                <div class="invalid-feedback">
                  Please fill in your email
                </div>
              </div>

              <div class="form-group">
                <div class="d-block">
                  <label for="password" class="control-label">Password</label>
                </div>
                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                <div class="invalid-feedback">
                  please fill in your password
                </div>
              </div>

              <!-- <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                  <label class="custom-control-label" for="remember-me">Remember Me</label>
                </div>
              </div> -->

              <div class="form-group text-right">
                <!-- <a href="auth-forgot-password.html" class="float-left mt-3">
                  Forgot Password?
                </a> -->
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                  Login
                </button>
              </div>

              <!-- <div class="mt-5 text-center">
                Don't have an account? <a href="auth-register.html">Create new one</a>
              </div> -->
            </form>

            <div class="text-center mt-5 text-small">
              Copyright &copy; Kelompok 3 PW.
              <div class="d-flex mt-2 justify-content-center align-items-center">
                <div>Alfeda</div>
                <div class="bullet mx-2"></div>
                <div>Isfan</div>
                <div class="bullet mx-2"></div>
                <div>Rama</div>
              </div>
            </div>
          </div>
        </div>
        <img src="{{url('/assets/template/img/login-wallpaper.jpg')}}" class="flex-fill order-1" style="width: 50%">
        {{-- <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative" data-background="{{url('/assets/template/img/login-wallpaper.jpg')}}">
        </div> --}}
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{url('/assets/template/js/stisla.js')}}"></script>

  <!-- Template JS File -->
  <script src="{{url('/assets/template/js/scripts.js')}}"></script>
  <script src="{{url('/assets/template/js/custom.js')}}"></script>

  <!-- Page Specific JS File -->
  <script src="{{url('/assets/template/js/page/index.js')}}"></script>
</body>
</html>
