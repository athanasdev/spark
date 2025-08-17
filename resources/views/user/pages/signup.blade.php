<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from crypo-laravel-live.netlify.app/signup/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:03 GMT -->
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


    @include('user.pages.header');

  <div class="vh-100 d-flex justify-content-center">
    <div class="form-access my-auto">
      <form action="#">
        <span>Create Account</span>
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Username" required />
        </div>
        <div class="form-group">
          <input type="email" class="form-control" placeholder="Email Address" required />
        </div>
         <div class="form-group">
          <input type="text" class="form-control" placeholder="Referrals Code" required />
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Password" required />
        </div>
        <div class="form-group">
          <input type="password" class="form-control" placeholder="Confirm Password" required />
        </div>
        <div class="custom-control custom-checkbox">
          <input type="checkbox" class="custom-control-input" id="form-checkbox">
          <label class="custom-control-label" for="form-checkbox">I agree to the <a href="#!">Terms &
              Conditions</a></label>
        </div>
        <button type="submit" class="btn btn-primary">Create Account</button>
      </form>
      <h2>Already have an account? <a href="{{route('login')}}">Sign in here</a></h2>
    </div>
  </div>

  <script src="/client/assets/js/jquery-3.4.1.min.js"></script>
  <script src="/client/assets/js/popper.min.js"></script>
  <script src="/client/assets/js/bootstrap.min.js"></script>
  <script src="/client/assets/js/amcharts-core.min.js"></script>
  <script src="/client/assets/js/amcharts.min.js"></script>
  <script src="/client/assets/js/custom.js"></script>
</body>


<!-- Mirrored from crypo-laravel-live.netlify.app/signup/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:03 GMT -->
</html>
