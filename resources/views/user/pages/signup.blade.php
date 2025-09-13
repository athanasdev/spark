<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from crypo-laravel-live.netlify.app/signup/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>9dfe</title>
    <link rel="icon" href="/client/assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="/client/assets/css/style.css">
    <script src="//code.jivosite.com/widget/lV3WFrkVOl" async></script>

</head>

<body id="dark">


    @include('user.pages.header');

    <div class="vh-100 d-flex justify-content-center">
        <div class="form-access my-auto">
            <div class="signup-card-container">
                <form action="{{ route('user.register') }}" method="POST">
                    @csrf
                    <span>Create Account</span>

                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username" required />
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email Address"
                            required />
                    </div>

                    <div class="form-group" style="display: none;">
                        <select name="currency" class="form-control" required>
                            <option value="usdttrc20" selected>TRC-20(USDT)</option>
                        </select>
                    </div>

                    {{-- Referral handling --}}
                    @if (!empty($code))
                        <input type="hidden" name="invitation_code" value="{{ $code }}">
                        <p class="text-success">
                            You are joining with referral code from
                            <strong>{{ $referrer->username ?? 'unknown user' }}</strong>
                        </p>
                    @else
                        <div class="mb-3">
                            <label>Referral Code (optional)</label>
                            <input type="text" name="invitation_code" class="form-control"
                                value="{{ old('invitation_code') }}">
                        </div>
                    @endif

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required />
                    </div>

                    <div class="form-group">
                        <input type="password" name="password_confirmation" class="form-control"
                            placeholder="Confirm Password" required />
                    </div>

                    <div class="custom-control custom-checkbox mb-3">
                        <input type="checkbox" name="agree" class="custom-control-input" id="form-checkbox"
                            value="1" checked required>
                        <label class="custom-control-label" for="form-checkbox">
                            I agree to the <a href="#terms">Terms & Conditions</a>
                        </label>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Create Account</button>

                    <p class="mt-3 text-center">
                        Already have an account? <a href="{{ route('login') }}">Sign In</a>
                    </p>
                </form>
            </div>

            <h2>Already have an account? <a href="{{ route('login') }}">Sign in here</a></h2>
        </div>
    </div>

    <script src="/client/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/client/assets/js/popper.min.js"></script>
    <script src="/client/assets/js/bootstrap.min.js"></script>
    <script src="/client/assets/js/amcharts-core.min.js"></script>
    <script src="/client/assets/js/amcharts.min.js"></script>
    <script src="/client/assets/js/custom.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    toast: true,
                    position: 'top-end',
                    timer: 3000,
                    showConfirmButton: false
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}',
                    toast: true,
                    position: 'top-end',
                    timer: 4000,
                    showConfirmButton: false
                });
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    Swal.fire({
                        icon: 'error',
                        title: '{{ $error }}',
                        toast: true,
                        position: 'top-end',
                        timer: 4000,
                        showConfirmButton: false
                    });
                @endforeach
            @endif
        });
    </script>


</body>


<!-- Mirrored from crypo-laravel-live.netlify.app/signup/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:03 GMT -->

</html>
