<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from crypo-laravel-live.netlify.app/wallet/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

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

    <div class="settings mtb15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <div class="nav flex-column nav-pills settings-nav" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link" id="settings-profile-tab" data-toggle="pill" href="#settings-profile"
                            role="tab" aria-controls="settings-profile" aria-selected="true"><i
                                class="icon ion-md-person"></i> Profile</a>
                        <a class="nav-link active" id="settings-wallet-tab" data-toggle="pill" href="#settings-wallet"
                            role="tab" aria-controls="settings-wallet" aria-selected="false"><i
                                class="icon ion-md-wallet"></i> Wallet</a>
                        <a class="nav-link" id="settings-tab" data-toggle="pill" href="#settings" role="tab"
                            aria-controls="settings" aria-selected="false"><i class="icon ion-md-settings"></i>
                            Settings</a>
                    </div>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade" id="settings-profile" role="tabpanel"
                            aria-labelledby="settings-profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">General Information</h5>
                                    <div class="settings-profile">
                                        <form action="#">
                                            <img src="/client/assets/img/avatar.svg" alt="avatar">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="fileUpload"
                                                    required />
                                                <label class="custom-file-label" for="fileUpload">Choose
                                                    avatar</label>
                                            </div>
                                            <div class="form-row mt-4">
                                                <div class="col-md-6">
                                                    <label for="formFirst">First name</label>
                                                    <input id="formFirst" type="text" class="form-control"
                                                        placeholder="First name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="formLast">Last name</label>
                                                    <input id="formLast" type="text" class="form-control"
                                                        placeholder="Last name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="emailAddress">Email</label>
                                                    <input id="emailAddress" type="text" class="form-control"
                                                        placeholder="Enter your email">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="phoneNumber">Phone</label>
                                                    <input id="phoneNumber" type="text" class="form-control"
                                                        placeholder="Enter phone number">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="selectLanguage">Language</label>
                                                    <select id="selectLanguage" class="custom-select">
                                                        <option selected>English</option>
                                                        <option>Mandarin Chinese</option>
                                                        <option>Spanish</option>
                                                        <option>Arabic</option>
                                                        <option>Russian</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="selectCurrency">Currency</label>
                                                    <select id="selectCurrency" class="custom-select">
                                                        <option selected>USD</option>
                                                        <option>EUR</option>
                                                        <option>GBP</option>
                                                        <option>CHF</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="submit" value="Update">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Security Information</h5>
                                    <div class="settings-profile">
                                        <form action="#">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <label for="currentPass">Current password</label>
                                                    <input id="currentPass" type="text" class="form-control"
                                                        placeholder="Enter your password" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="newPass">New password</label>
                                                    <input id="newPass" type="text" class="form-control"
                                                        placeholder="Enter new password">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="securityOne">Security questions #1</label>
                                                    <select id="securityOne" class="custom-select">
                                                        <option selected>What was the name of your first pet?</option>
                                                        <option>What's your Mother's middle name?</option>
                                                        <option>What was the name of your first school?</option>
                                                        <option>Where did you travel for the first time?</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="securityAnsOne">Answer</label>
                                                    <input id="securityAnsOne" type="text" class="form-control"
                                                        placeholder="Enter your answer">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="securityTwo">Security questions #2</label>
                                                    <select id="securityTwo" class="custom-select">
                                                        <option selected>Choose...</option>
                                                        <option>What was the name of your first pet?</option>
                                                        <option>What's your Mother's middle name?</option>
                                                        <option>What was the name of your first school?</option>
                                                        <option>Where did you travel for the first time?</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="securityAnsTwo">Answer</label>
                                                    <input id="securityAnsTwo" type="text" class="form-control"
                                                        placeholder="Enter your answer">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="securityThree">Security questions #3</label>
                                                    <select id="securityThree" class="custom-select">
                                                        <option selected>Choose...</option>
                                                        <option>What was the name of your first pet?</option>
                                                        <option>What's your Mother's middle name?</option>
                                                        <option>What was the name of your first school?</option>
                                                        <option>Where did you travel for the first time?</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="securityFore">Answer</label>
                                                    <input id="securityFore" type="text" class="form-control"
                                                        placeholder="Enter your answer">
                                                </div>
                                                <div class="col-md-12">
                                                    <input type="submit" value="Update">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane fade show active" id="settings-wallet" role="tabpanel"
                            aria-labelledby="settings-wallet-tab">
                            <div class="wallet">
                                <div class="row">
                                    <div class="col-md-12 col-lg-10">
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="coinBTC" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Balances</h5>
                                                        <ul>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-cash"></i>
                                                                    <h2>Total Equity</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>{{ $user->balance }} USDT</h3>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-checkmark"></i>
                                                                    <h2>Available Margin</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>{{ $user->balance }} USDT</h3>
                                                                </div>
                                                            </li>
                                                        </ul>

                                                        <a href="{{ route('deposit.form') }}"
                                                            class="btn btn-success mr-2">Deposit</a>
                                                        <a href="{{ route('withdraw') }}"
                                                            class="btn btn-danger ml-2">Withdraw</a>

                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Change Withdrawal Address</h5>

                                                        {{-- Alerts --}}
                                                        @if ($errors->any())
                                                            <div class="alert alert-danger flex items-start space-x-2">
                                                                <span class="mt-1">⚠️</span>
                                                                <ul class="list-none m-0 p-0">
                                                                    @foreach ($errors->all() as $error)
                                                                        <li>{{ $error }}</li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif

                                                        @if (session('error'))
                                                            <div
                                                                class="alert alert-danger flex items-center space-x-2">
                                                                <span>❌</span>
                                                                <span>{{ session('error') }}</span>
                                                            </div>
                                                        @endif

                                                        @if (session('success'))
                                                            <div
                                                                class="alert alert-success flex items-center space-x-2">
                                                                <span>✅</span>
                                                                <span>{{ session('success') }}</span>
                                                            </div>
                                                        @endif

                                                        {{-- Show current address if exists --}}
                                                        @if (Auth::user()->withdrawal_address)
                                                            <div class="form-group">
                                                                <label>Current Withdrawal Address:</label>
                                                                <div class="current-address-display text-info">
                                                                    {{ Auth::user()->withdrawal_address }}
                                                                </div>
                                                            </div>
                                                        @else
                                                            <div class="alert alert-info">
                                                                No withdrawal address set.
                                                            </div>
                                                        @endif

                                                        {{-- Update Form --}}
                                                        <form method="POST"
                                                            action="{{ route('withdrawal.address.update') }}">
                                                            @csrf
                                                            @method('PATCH')

                                                            <div class="form-group">
                                                                <label for="new_withdrawal_address">New USDT (TRC20)
                                                                    Address:</label>
                                                                <input type="text" id="new_withdrawal_address"
                                                                    name="new_withdrawal_address"
                                                                    value="{{ old('new_withdrawal_address') }}"
                                                                    class="form-control @error('new_withdrawal_address') is-invalid @enderror"
                                                                    placeholder="Enter new USDT TRC20 address"
                                                                    required>
                                                                @error('new_withdrawal_address')
                                                                    <span class="invalid-feedback"
                                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                                @enderror
                                                                <small class="note text-info">⚠️ Please double-check
                                                                    the
                                                                    address. Incorrect addresses may result in loss of
                                                                    funds.</small>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="withdrawal_pin">Confirm with PIN:</label>
                                                                <input type="password" name="withdrawal_pin"
                                                                    id="withdrawal_pin"
                                                                    class="form-control @error('withdrawal_pin') is-invalid @enderror"
                                                                    placeholder="Enter your current PIN" required>
                                                                @error('withdrawal_pin')
                                                                    <span class="invalid-feedback"
                                                                        role="alert"><strong>{{ $message }}</strong></span>
                                                                @enderror
                                                                <small class="note text-info">Enter your current
                                                                    withdrawal PIN
                                                                    to authorize this change.</small>
                                                            </div>

                                                            <button type="submit"
                                                                class="submit-btn mt-3 btn-success btn-rounded rounded-2xl">
                                                                <i class="fas fa-save"></i> Update Address
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="tab-pane fade" id="coinETH" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Balances</h5>
                                                        <ul>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-cash"></i>
                                                                    <h2>Total Equity</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>4.1542 ETH</h3>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-checkmark"></i>
                                                                    <h2>Available Margin</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>1.334 ETH</h3>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <button class="btn green">Deposit</button>
                                                        <button class="btn red">Withdraw</button>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="tab-pane fade" id="coinBNB" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Balances</h5>
                                                        <ul>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-cash"></i>
                                                                    <h2>Total Equity</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>7.342 BNB</h3>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-checkmark"></i>
                                                                    <h2>Available Margin</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>0.332 BNB</h3>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <button class="btn green">Deposit</button>
                                                        <button class="btn red">Withdraw</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="coinTRX" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Balances</h5>
                                                        <ul>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-cash"></i>
                                                                    <h2>Total Equity</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>4.3344 TRX</h3>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-checkmark"></i>
                                                                    <h2>Available Margin</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>1.453 TRX</h3>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <button class="btn green">Deposit</button>
                                                        <button class="btn red">Withdraw</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="coinEOS" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Balances</h5>
                                                        <ul>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-cash"></i>
                                                                    <h2>Total Equity</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>33.35 EOS</h3>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-checkmark"></i>
                                                                    <h2>Available Margin</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>4.445 EOS</h3>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <button class="btn green">Deposit</button>
                                                        <button class="btn red">Withdraw</button>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="tab-pane fade" id="coinXMR" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Balances</h5>
                                                        <ul>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-cash"></i>
                                                                    <h2>Total Equity</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>34.333 XMR</h3>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-checkmark"></i>
                                                                    <h2>Available Margin</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>2.354 XMR</h3>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <button class="btn green">Deposit</button>
                                                        <button class="btn red">Withdraw</button>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="tab-pane fade" id="coinKCS" role="tabpanel">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Balances</h5>
                                                        <ul>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-cash"></i>
                                                                    <h2>Total Equity</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>86.577 KCS</h3>
                                                                </div>
                                                            </li>
                                                            <li
                                                                class="d-flex justify-content-between align-items-center">
                                                                <div class="d-flex align-items-center">
                                                                    <i class="icon ion-md-checkmark"></i>
                                                                    <h2>Available Margin</h2>
                                                                </div>
                                                                <div>
                                                                    <h3>5.78 KCS</h3>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                        <button class="btn green">Deposit</button>
                                                        <button class="btn red">Withdraw</button>
                                                    </div>
                                                </div>



                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Latest Transactions</h5>
                                                        <div class="wallet-history">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>No.</th>
                                                                        <th>Date</th>
                                                                        <th>Status</th>
                                                                        <th>Amount</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td>1</td>
                                                                        <td>25-04-2019</td>
                                                                        <td><i
                                                                                class="icon ion-md-checkmark-circle-outline green"></i>
                                                                        </td>
                                                                        <td>4.5454334</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>2</td>
                                                                        <td>25-05-2019</td>
                                                                        <td><i
                                                                                class="icon ion-md-checkmark-circle-outline green"></i>
                                                                        </td>
                                                                        <td>0.5484468</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>25-06-2019</td>
                                                                        <td><i
                                                                                class="icon ion-md-close-circle-outline red"></i>
                                                                        </td>
                                                                        <td>2.5454545</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>4</td>
                                                                        <td>25-07-2019</td>
                                                                        <td><i
                                                                                class="icon ion-md-checkmark-circle-outline green"></i>
                                                                        </td>
                                                                        <td>1.45894147</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>3</td>
                                                                        <td>25-08-2019</td>
                                                                        <td><i
                                                                                class="icon ion-md-close-circle-outline red"></i>
                                                                        </td>
                                                                        <td>2.5454545</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Notifications</h5>
                                    <div class="settings-notification">
                                        <ul>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Update price</p>
                                                    <span>Get the update price in your dashboard</span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="notification1">
                                                    <label class="custom-control-label" for="notification1"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="notification-info">
                                                    <p>2FA</p>
                                                    <span>Unable two factor authentication service</span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="notification2" checked>
                                                    <label class="custom-control-label" for="notification2"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Latest news</p>
                                                    <span>Get the latest news in your mail</span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="notification3">
                                                    <label class="custom-control-label" for="notification3"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Email Service</p>
                                                    <span>Get security code in your mail</span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="notification4" checked>
                                                    <label class="custom-control-label" for="notification4"></label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="notification-info">
                                                    <p>Phone Notify</p>
                                                    <span>Get transition notification in your phone </span>
                                                </div>
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input"
                                                        id="notification5" checked>
                                                    <label class="custom-control-label" for="notification5"></label>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="card settings-profile">
                                <div class="card-body">
                                    <h5 class="card-title">Create API Key</h5>
                                    <div class="form-row">
                                        <div class="col-md-6">
                                            <label for="generateKey">Generate key name</label>
                                            <input id="generateKey" type="text" class="form-control"
                                                placeholder="Enter your key name">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="rewritePassword">Confirm password</label>
                                            <input id="rewritePassword" type="password" class="form-control"
                                                placeholder="Confirm your password">
                                        </div>
                                        <div class="col-md-12">
                                            <input type="submit" value="Create API key">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Your API Keys</h5>
                                    <div class="wallet-history">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Key</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>zRmWVcrAZ1C0RZkFMu7K5v0KWC9jUJLt</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="apiStatus1" checked>
                                                            <label class="custom-control-label"
                                                                for="apiStatus1"></label>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon ion-md-trash"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Rv5dgnKdmVPyHwxeExBYz8uFwYQz3Jvg</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="apiStatus2">
                                                            <label class="custom-control-label"
                                                                for="apiStatus2"></label>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon ion-md-trash"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>VxEYIs1HwgmtKTUMA4aknjSEjjePZIWu</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="apiStatus3">
                                                            <label class="custom-control-label"
                                                                for="apiStatus3"></label>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon ion-md-trash"></i></td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>M01DueJ4x3awI1SSLGT3CP1EeLSnqt8o</td>
                                                    <td>
                                                        <div class="custom-control custom-switch">
                                                            <input type="checkbox" class="custom-control-input"
                                                                id="apiStatus4">
                                                            <label class="custom-control-label"
                                                                for="apiStatus4"></label>
                                                        </div>
                                                    </td>
                                                    <td><i class="icon ion-md-trash"></i></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/client/assets/js/jquery-3.4.1.min.js"></script>
    <script src="/client/assets/js/popper.min.js"></script>
    <script src="/client/assets/js/bootstrap.min.js"></script>
    <script src="/client/assets/js/amcharts-core.min.js"></script>
    <script src="/client/assets/js/amcharts.min.js"></script>
    <script src="/client/assets/js/custom.js"></script>
</body>


<!-- Mirrored from crypo-laravel-live.netlify.app/wallet/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:03 GMT -->

</html>
