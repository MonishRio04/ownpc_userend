@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Affiliate</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Affiliate</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->

    <div class="card shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('admin.affiliate.update', $affiliate->id) }}" enctype="multipart/form-data">
                @csrf
                <div class="row g-4">
                    <div class="col-md-6">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" class="form-control" 
                            value="{{ old('name', $affiliate->name) }}" required>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control" 
                            value="{{ old('email', $affiliate->email) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" id="phone" name="phone" class="form-control" 
                            value="{{ old('phone', $affiliate->phone) }}">
                    </div>

                    <div class="col-md-6">
                        <label for="referral_code" class="form-label">Referral Code</label>
                        <input type="text" id="referral_code" name="referral_code" class="form-control" 
                            value="{{ old('referral_code', $affiliate->referral_code) }}">
                    </div>

                    <div class="col-12">
                        <label for="address" class="form-label">Address</label>
                        <textarea id="address" name="address" class="form-control" rows="3">{{ old('address', $affiliate->address) }}</textarea>
                    </div>

                    <div class="col-12">
                        <label for="bank_details" class="form-label">Bank Details (JSON)</label>
                        <textarea id="bank_details" name="bank_details" class="form-control" rows="3">{{ old('bank_details', json_encode($affiliate->bank_details)) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="commision_rate" class="form-label">Commission Rate (%)</label>
                        <input type="number" id="commision_rate" name="commision_rate" class="form-control" 
                            value="{{ old('commision_rate', $affiliate->commision_rate) }}" min="0" max="100">
                    </div>

                    <div class="col-md-6">
                        <label for="discount_rate" class="form-label">Discount Rate (%)</label>
                        <input type="number" id="discount_rate" name="discount_rate" class="form-control" 
                            value="{{ old('discount_rate', $affiliate->discount_rate) }}" min="0" max="100">
                    </div>

                    <div class="col-md-6">
                        <label for="photo" class="form-label">Photo</label>
                        <input type="file" id="photo" name="photo" class="form-control">
                        @if($affiliate->photo)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$affiliate->photo) }}" alt="Affiliate Photo" width="100" class="rounded shadow-sm">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-6">
                        <label for="status" class="form-label">Status</label>
                        <select id="status" name="status" class="form-select">
                            <option value="1" {{ old('status', $affiliate->status) == 1 ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ old('status', $affiliate->status) == 0 ? 'selected' : '' }}>Inactive</option>
                        </select>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-success px-5">Update Affiliate</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
