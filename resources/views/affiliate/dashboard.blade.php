@extends('affiliate.default')

@section('affiliate')
<div class="page-content">
    <div class="row g-4">
        <!-- Earnings Summary -->
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h5>Total Earnings</h5>
                <h3 class="text-success">Rs.{{ number_format($total_earnings??0, 2) }}</h3>
                <small class="text-muted">Lifetime</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h5>This Month</h5>
                <h3 class="text-primary">Rs.{{ number_format($month_earnings??0, 2) }}</h3>
                <small class="text-muted">{{ date('F Y') }}</small>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm text-center p-4">
                <h5>Available Balance</h5>
                <h3 class="text-warning">Rs.{{ number_format($available_balance??0, 2) }}</h3>
                <small class="text-muted">Ready to withdraw</small>
            </div>
        </div>

        <!-- Referral Link -->
        <div class="col-12">
            <div class="card shadow-sm p-4">
                <h5>Your Referral Link</h5>
                <div class="input-group">
                    <input type="text" class="form-control" value="{{ url('/?ref=' . Auth::guard('affiliate')->user()->referral_code) }}" readonly>
                    <button class="btn btn-outline-secondary" onclick="navigator.clipboard.writeText('{{ url('/?ref=' . Auth::guard('affiliate')->user()->referral_code) }}')">
                        <i class="bx bx-copy"></i> Copy
                    </button>
                </div>
                <small class="text-muted mt-1 d-block">Share this link to earn commission.</small>
            </div>
        </div>

        <!-- Performance Metrics -->
        {{-- <div class="col-md-6">
            <div class="card shadow-sm p-4">
                <h5>Performance</h5>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Clicks: <strong>{{ $totalClicks??0 }}</strong></li>
                    <li class="list-group-item">Conversions: <strong>{{ $totalConversions??0 }}</strong></li>
                    <li class="list-group-item">Commission Rate: <strong>{{ Auth::guard('affiliate')->user()->commision_rate }}%</strong></li>
                </ul>
            </div>
        </div> --}}

        <!-- Top Products -->
        <div class="col-12">
            <div class="card shadow-sm p-4">
                <h5>Top Selling Products</h5>
                <div class="table-responsive">
                    <table class="table table-hover text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Product</th>
                                <th>Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $products_count[$product->id] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- <!-- Payout Summary -->
        <div class="col-12">
            <div class="card shadow-sm p-4">
                <h5>Payout History</h5>
                <div class="table-responsive">
                    <table class="table table-bordered text-center">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payouts as $payout)
                                <tr>
                                    <td>{{ $payout->created_at->format('d M Y') }}</td>
                                    <td>Rs.{{ number_format($payout->amount, 2) }}</td>
                                    <td>
                                        <span class="badge {{ $payout->status === 'Paid' ? 'bg-success' : 'bg-warning' }}">
                                            {{ $payout->status }}
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> --}}

    </div>
</div>
@endsection
