<!DOCTYPE html>
<html lang="en">


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

    <div class="settings mtb15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-3">
                    <div class="nav flex-column nav-pills settings-nav" id="v-pills-tab" role="tablist"
                        aria-orientation="vertical">
                        <a class="nav-link active" id="settings-profile-tab" data-toggle="pill" href="#settings-profile"
                            role="tab" aria-controls="settings-profile" aria-selected="true"><i
                                class="icon ion-md-person"></i> Profile</a>
                        <a class="nav-link" id="withdraw-history-tab" data-toggle="pill" href="#withdraw-history"
                            role="tab" aria-controls="withdraw-history" aria-selected="false">
                            <i class="icon ion-md-wallet"></i> Withdraws
                        </a>
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

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title pl-4">Latest Transactions </h5>
                                    <div class="wallet-history  table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Amount</th>
                                                    <th>Description</th>
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
                                                        <td>{{ $transaction->description }}</td>
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

                        <div class="tab-pane fade" id="withdraw-history" role="tabpanel"
                            aria-labelledby="withdraw-history-tab">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title pl-4">Withdraw History</h5>
                                    <div class="wallet-history table-responsive">
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
                                                @forelse($withdrawals as $index => $withdrawal)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $withdrawal->created_at ? $withdrawal->created_at->format('d-m-Y') : '-' }}
                                                        </td>
                                                        <td>
                                                            @if ($withdrawal->status === 'complete')
                                                                <i class="icon ion-md-checkmark-circle-outline text-success"></i>
                                                            @elseif($withdrawal->status === 'pending')
                                                                <i class="icon ion-md-close-circle-outline text-warning"></i>
                                                            @else
                                                                <i class="icon ion-md-close-circle-outline text-danger"></i>
                                                            @endif
                                                            {{ ucfirst($withdrawal->status) }}
                                                        </td>
                                                        <td>{{ number_format($withdrawal->amount, 2) }} USDT</td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="4" class="text-center">No withdrawals found
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                        <!-- Pagination -->
                                        <div class="d-flex justify-content-center mt-3 pagination-wrapper">
                                            {{ $withdrawals->links('vendor.pagination.custom') }}
                                        </div>
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


<!-- Mirrored from crypo-laravel-live.netlify.app/profile/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 26 Feb 2023 05:56:03 GMT -->

</html>
