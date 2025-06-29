@extends('frontend.master_dashboard')

@section('title')
    My Addresses
@endsection

@section('main')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> My Addresses
        </div>
    </div>
</div>

<div class="container mt-50 mb-80">
    <div class="d-flex justify-content-between align-items-center mb-30">
        <h3 class="mb-0">Saved Addresses</h3>
        <a href="{{ route('address.create') }}" class="btn btn-sm btn-fill-out">Add New Address</a>
    </div>

    @if($addresses->count() > 0)
        <div class="row">
            @foreach($addresses as $address)
                <div class="col-md-6 mb-30">
                    <div class="card p-20 h-100">
                        <h5 class="mb-15">{{ $address->shipping_name }}</h5>
                        <p class="mb-5"><strong>Email:</strong> {{ $address->shipping_email ?? 'N/A' }}</p>
                        <p class="mb-5"><strong>Phone:</strong> {{ $address->shipping_phone ?? 'N/A' }}</p>
                        <p class="mb-5"><strong>Address:</strong> {{ $address->shipping_address ?? 'N/A' }}</p>
                        <p class="mb-5"><strong>City:</strong> {{ optional($address->city)->city_name ?? 'N/A' }}</p>
                        <p class="mb-5"><strong>District:</strong> {{ optional($address->district)->district_name ?? 'N/A' }}</p>
                        <p class="mb-5"><strong>State:</strong> {{ optional($address->state)->state_name ?? 'N/A' }}</p>
                        <p class="mb-5"><strong>Post Code:</strong> {{ $address->post_code ?? 'N/A' }}</p>

                        <div class="mt-15 d-flex justify-content-between">
                            <a href="{{ route('address.edit', $address->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('address.destroy', $address->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this address?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            No addresses found. <a href="{{ route('address.create') }}">Add a new address</a>.
        </div>
    @endif
</div>
@endsection
