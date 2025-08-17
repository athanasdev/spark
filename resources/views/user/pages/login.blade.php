<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from crypo-laravel-live.netlify.app/login/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crypo</title>
  <link rel="icon" href="/client/assets/img/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="/client/assets/css/style.css">
</head>

<body id="dark">
  <header class="dark-bb">
    <nav class="navbar navbar-expand-lg">
      <a class="navbar-brand" href="../index.html"><img src="/client/assets/img/logo-light.svg" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#headerMenu"
        aria-controls="headerMenu" aria-expanded="false" aria-label="Toggle navigation">
        <i class="icon ion-md-menu"></i>
      </button>

      <div class="collapse navbar-collapse" id="headerMenu">
        <ul class="navbar-nav mr-auto">
          <a class="nav-link" href="../index.html">Exchange</a>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Markets
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../markets/index.html">Markets</a>
              <a class="dropdown-item" href="../market-capital/index.html">Market Capital</a>
              <a class="dropdown-item" href="../market-capital-bar/index.html">Market Bar</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Dashboard
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="../profile/index.html">Profile</a>
              <a class="dropdown-item" href="../wallet/index.html">Wallet</a>
              <a class="dropdown-item" href="../settings/index.html">Settings</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              Others
            </a>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="index.html">Login</a>
              <a class="dropdown-item" href="{{"route.register"}}">Sign Up</a>
              <a class="dropdown-item" href="../lock/index.html">Lock</a>
              <a class="dropdown-item" href="../otp-number/index.html">OTP Number</a>
              <a class="dropdown-item" href="../otp-verify/index.html">OTP Verify</a>
              <a class="dropdown-item" href="../reset/index.html">Reset</a>
              <a class="dropdown-item" href="../notfound/index.html">404</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item header-custom-icon">
            <a class="nav-link" href="#" id="changeThemeLight">
              <i class="icon ion-md-sunny"></i>
            </a>
          </li>
          <li class="nav-item header-custom-icon">
            <a class="nav-link" href="#" id="clickFullscreen">
              <i class="icon ion-md-expand"></i>
            </a>
          </li>
          <li class="nav-item dropdown header-custom-icon">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <i class="icon ion-md-notifications"></i>
              <span class="circle-pulse"></span>
            </a>
            <div class="dropdown-menu">
              <div class="dropdown-header d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium">6 New Notifications</p>
                <a href="#!" class="text-muted">Clear all</a>
              </div>
              <div class="dropdown-body">
                <a href="#!" class="dropdown-item">
                  <div class="icon">
                    <i class="icon ion-md-lock"></i>
                  </div>
                  <div class="content">
                    <p>Account password change</p>
                    <p class="sub-text text-muted">5 sec ago</p>
                  </div>
                </a>
                <a href="#!" class="dropdown-item">
                  <div class="icon">
                    <i class="icon ion-md-alert"></i>
                  </div>
                  <div class="content">
                    <p>Solve the security issue</p>
                    <p class="sub-text text-muted">10 min ago</p>
                  </div>
                </a>
                <a href="#!" class="dropdown-item">
                  <div class="icon">
                    <i class="icon ion-logo-android"></i>
                  </div>
                  <div class="content">
                    <p>Download android app</p>
                    <p class="sub-text text-muted">1 hrs ago</p>
                  </div>
                </a>
                <a href="#!" class="dropdown-item">
                  <div class="icon">
                    <i class="icon ion-logo-bitcoin"></i>
                  </div>
                  <div class="content">
                    <p>Bitcoin price is high now</p>
                    <p class="sub-text text-muted">2 hrs ago</p>
                  </div>
                </a>
                <a href="#!" class="dropdown-item">
                  <div class="icon">
                    <i class="icon ion-logo-usd"></i>
                  </div>
                  <div class="content">
                    <p>Payment completed</p>
                    <p class="sub-text text-muted">4 hrs ago</p>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer d-flex align-items-center justify-content-center">
                <a href="#!">View all</a>
              </div>
            </div>
          </li>
          <li class="nav-item dropdown header-img-icon">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <img src="/client/assets/img/avatar.svg" alt="avatar">
            </a>
           
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <div class="vh-100 d-flex justify-content-center">
    <div class="form-access my-auto">
      <form action="{{route("user.login")}}" method="POST">
         @csrf
        <span>Sign In</span>
        <div class="form-group">
          <input type="text" name="username" class="form-control" placeholder="Username" required />
        </div>
        <div class="form-group">
          <input type="password" name="password" class="form-control" placeholder="Password" required />
        </div>
        <div class="text-right">
          <a href="{{route("password.request")}}">Forgot Password?</a>
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="form-checkbox">
          <label class="custom-control-label" for="form-checkbox">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Sign In</button>
      </form>
      <h2>Don't have an account? <a href="{{route("register")}}">Sign up here</a></h2>
    </div>
  </div>

  <script src="/client/assets/js/jquery-3.4.1.min.js"></script>
  <script src="/client/assets/js/popper.min.js"></script>
  <script src="/client/assets/js/bootstrap.min.js"></script>
  <script src="/client/assets/js/amcharts-core.min.js"></script>
  <script src="/client/assets/js/amcharts.min.js"></script>
  <script src="/client/assets/js/custom.js"></script>
</body>


<!-- Mirrored from crypo-laravel-live.netlify.app/login/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:03 GMT -->
</html>
