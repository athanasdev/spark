<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from crypo-laravel-live.netlify.app/profile/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:00 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>9dfe</title>
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
                        <a class="nav-link active" id="settings-profile-tab" data-toggle="pill" href="#settings-profile"
                            role="tab" aria-controls="settings-profile" aria-selected="true"><i
                                class="icon ion-md-person"></i> Profile</a>
                        {{-- <a class="nav-link" id="settings-wallet-tab" data-toggle="pill" href="#settings-wallet"
                            role="tab" aria-controls="settings-wallet" aria-selected="false"><i
                                class="icon ion-md-wallet"></i> Wallet</a> --}}
                    </div>
                </div>
                <div class="col-md-12 col-lg-9">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="settings-profile" role="tabpanel"
                            aria-labelledby="settings-profile-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">General Information</h5>
                                    <div class="settings-profile">
                                        <form action="#">
                                            <img src="/client/assets/img/avatar.svg" alt="avatar">
                                            <div class="form-row mt-4">

                                                <div class="col-md-6">
                                                    <label for="formFirst">Username</label>
                                                    <input id="formFirst" type="text" class="form-control"
                                                        placeholder="" readonly
                                                        value="{{ Auth::user()->username ?? 'Guest' }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="formFirst">UserID</label>
                                                    <input id="formFirst" type="text" class="form-control"
                                                        placeholder="" readonly
                                                        value="{{ Auth::user()->unique_id ?? 'NULL' }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="formLast">Email</label>
                                                    <input id="formLast" type="text" class="form-control"
                                                        placeholder="Email" required
                                                        value="{{ Auth::user()->email ?? 'no-email' }}">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="emailAddress">status</label>
                                                    <input id="emailAddress" type="text" class="form-control"
                                                        value="{{ Auth::user()->status ?? 'blocked' }}">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="balance">Balance</label>
                                                    <div class="input-group">
                                                        <input id="balance" type="number" class="form-control"
                                                            value="{{ Auth::user()->balance ?? 0 }}" readonly>
                                                        <span class="input-group-text">USDT</span>
                                                    </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="card">
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
                                                    <td><i class="icon ion-md-checkmark-circle-outline green"></i></td>
                                                    <td>4.5454334</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>25-05-2019</td>
                                                    <td><i class="icon ion-md-checkmark-circle-outline green"></i></td>
                                                    <td>0.5484468</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>25-06-2019</td>
                                                    <td><i class="icon ion-md-close-circle-outline red"></i></td>
                                                    <td>2.5454545</td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>25-07-2019</td>
                                                    <td><i class="icon ion-md-checkmark-circle-outline green"></i></td>
                                                    <td>1.45894147</td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>25-08-2019</td>
                                                    <td><i class="icon ion-md-close-circle-outline red"></i></td>
                                                    <td>2.5454545</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Latest Transactions</h5>
                                    <div class="wallet-history  table-responsive">
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
                                                @forelse($transactions as $index => $transaction)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                                                        <td>
                                                            @if ($transaction->status === 'success')
                                                                <i
                                                                    class="icon ion-md-checkmark-circle-outline green"></i>
                                                            @elseif($transaction->status === 'pending')
                                                                <i class="icon ion-md-close-circle-outline red"></i>
                                                            @else
                                                                <i class="icon ion-md-time-outline text-warning"></i>
                                                            @endif
                                                        </td>
                                                        <td>{{ number_format($transaction->amount, 8) }} USDT</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">No transactions found
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <!-- Pagination -->
                                        <div class="d-flex justify-content-center mt-3 pagination-wrapper">
                                            {{ $transactions->links('vendor.pagination.custom') }}
                                        </div>
                                    </div>

                                </div>
                            </div>


                        </div>

                        {{-- <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
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
                        </div> --}}
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


<!-- Mirrored from crypo-laravel-live.netlify.app/profile/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:03 GMT -->

</html>
