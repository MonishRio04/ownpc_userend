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
                            All Products <span class="badge bg-danger ms-1">{{ count($products) }}</span>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <!-- Filters -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <form class="row gy-2 gx-3 align-items-center" action="">
                    <div class="col-md-3">
                        <select name="brand_id" class="form-select">
                            <option value="">Select Brand</option>
                            @foreach ($brands as $id => $value)
                                <option value="{{ $id }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="category_id" class="form-select">
                            <option value="">Select Category</option>
                            @foreach ($categories as $id => $value)
                                <option value="{{ $id }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="subcategory_id" class="form-select">
                            <option value="">Select Subcategory</option>
                            @foreach ($subcategories as $id => $value)
                                <option value="{{ $id }}">{{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3 d-flex gap-2">
                        <button type="submit" class="btn btn-primary"><i class="bx bx-filter-alt"></i> Apply</button>
                        <a href="{{ url('affiliate/products') }}" class="btn btn-outline-danger">X</a>
                    </div>
                </form>
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
                                <th>Product</th>
                                <th>Brand</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Price</th>
                                <th>Commission</th>
                                <th>Customer Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($products) == 0)
                                <tr>
                                    <td colspan="10" class="text-danger">No Products Found</td>
                                </tr>
                            @endif
                            @foreach ($products as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="text-start">
                                        <div class="d-flex align-items-center gap-2">
                                            <img src="{{ asset($item->product_thambnail) }}" alt="thumb"
                                                 style="width: 60px; height: 40px; object-fit: cover;">
                                            <span>{{ $item->product_name }}</span>
                                        </div>
                                    </td>
                                    <td>
                                        {{ $item->brand->brand_name ?? '—' }}
                                    </td>
                                    <td>
                                        {{ $item->category->category_name ?? '—' }}
                                    </td>
                                    <td>
                                        {{ $item->subcategory->subcategory_name ?? '—' }}
                                    </td>
                                    <td>Rs.{{ number_format($item->discount_price, 2) }}</td>
                                    <td>
                                        Rs.{{ number_format(($item->discount_price / 100) * Auth::guard('affiliate')->user()->commision_rate, 2) }}
                                    </td>
                                    <td>
                                        Rs.{{ number_format($item->discount_price - ($item->discount_price / 100) * Auth::guard('affiliate')->user()->discount_rate, 2) }}
                                    </td>
                                    <td>{{ $item->product_qty }}</td>
                                    <td>
                                        <button class="btn btn-outline-success btn-sm" onclick="navigator.clipboard.writeText('{{ url('product/details/' . $item->id . '/' . $item->product_slug) . '?ref=' . Auth::guard('affiliate')->user()->referral_code }}').then(()=>{ alert('Link Copied!'); })">
                                            <i class="bx bx-copy"></i> Copy Link
                                        </button>
                                    </td>
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
