@extends('user.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">My Referral Team</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Referral Team</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Statistics Cards -->
    
    <div class="row">
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Total Team Members</p>
                            <h4 class="mb-0">{{ $total_registered_users }}</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-center">
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary">
                                <span class="avatar-title">
                                    <i class="bx bx-user-circle font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Active Users</p>
                            <h4 class="mb-0">{{ $active_users }}</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-center">
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-success">
                                <span class="avatar-title">
                                    <i class="bx bx-user-check font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Total Team Investment</p>
                            <h4 class="mb-0">${{ number_format($total_deposits, 2) }}</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-center">
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-info">
                                <span class="avatar-title">
                                    <i class="bx bx-dollar-circle font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card mini-stats-wid">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-grow-1">
                            <p class="text-muted fw-medium">Total Commissions</p>
                            <h4 class="mb-0">${{ number_format($total_commissions, 2) }}</h4>
                        </div>
                        <div class="flex-shrink-0 align-self-center">
                            <div class="mini-stat-icon avatar-sm rounded-circle bg-warning">
                                <span class="avatar-title">
                                    <i class="bx bx-gift font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Referral Team Data -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Referral Team Details</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Level</th>
                                    <th>Members</th>
                                    <th>Investment</th>
                                    <th>Commission</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Level 1</td>
                                    <td>{{ $level1_count }}</td>
                                    <td>${{ number_format($level1_deposit, 2) }}</td>
                                    <td>${{ number_format($level1_commissions, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Level 2</td>
                                    <td>{{ $level2_count }}</td>
                                    <td>${{ number_format($level2_deposit, 2) }}</td>
                                    <td>${{ number_format($level2_commissions, 2) }}</td>
                                </tr>
                                <tr>
                                    <td>Level 3</td>
                                    <td>{{ $level3_count }}</td>
                                    <td>${{ number_format($level3_deposit, 2) }}</td>
                                    <td>${{ number_format($level3_commissions, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Team Members Lists -->
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Level 1 Members</h4>
                </div>
                <div class="card-body">
                    @if($level1_members->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Join Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($level1_members as $member)
                                        <tr>
                                            <td>{{ $member->username }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->created_at->format('M d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No Level 1 members yet.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Level 2 Members</h4>
                </div>
                <div class="card-body">
                    @if($level2_members->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Join Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($level2_members as $member)
                                        <tr>
                                            <td>{{ $member->username }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->created_at->format('M d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No Level 2 members yet.</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Level 3 Members</h4>
                </div>
                <div class="card-body">
                    @if($level3_members->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Join Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($level3_members as $member)
                                        <tr>
                                            <td>{{ $member->username }}</td>
                                            <td>{{ $member->email }}</td>
                                            <td>{{ $member->created_at->format('M d, Y') }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <p class="text-muted">No Level 3 members yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Referral Settings -->
    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Referral Program Settings</h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <h5><i class="bx bx-info-circle"></i> How Referral Works</h5>
                        <p>Invite friends and earn commissions from their investments across 3 levels:</p>
                        <ul>
                            <li><strong>Level 1:</strong> Direct referrals</li>
                            <li><strong>Level 2:</strong> Referrals of your Level 1 members</li>
                            <li><strong>Level 3:</strong> Referrals of your Level 2 members</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Add any JavaScript functionality here
    $(document).ready(function() {
        // Initialize tooltips
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endpush
