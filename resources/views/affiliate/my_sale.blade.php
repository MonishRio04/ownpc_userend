@extends('affiliate.default')
@section('affiliate')
    <div class="page-content">
        <!-- Breadcrumb -->
        <div class="page-breadcrumb d-flex align-items-center justify-content-between mb-4">
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Sales
                            <span class="badge bg-danger ms-1">{{ count($orders) }}</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Product Table -->
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Date</th>
                                <th>Order Value</th>
                                <th>My Earnings</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($orders ?? []) == 0)
                                <tr>
                                    <td colspan="5" class="text-danger">No Sales Exists</td>
                                </tr>
                            @endif
                            @foreach ($orders ?? [] as $key => $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->order_date }}</td>
                                    <td>Rs.{{ $item->amount }}</td>
                                    <?php $earnings = ($item->amount * auth()->guard('affiliate')->user()->commision_rate) / 100; ?>
                                    <td>Rs.{{ number_format($earnings ?? 0, 2) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- You can also add pagination here --}}
                </div>
            </div>
        </div>
    </div>
@endsection
