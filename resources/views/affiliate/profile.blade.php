@extends('affiliate.default')
@section('affiliate')
<div class="page-content">
    <div class="row g-4">
        <div class="col-md-12">
            <div class="card shadow-sm p-4">

                <!-- Earnings Overview -->
                <h5 class="mb-3">Earnings Overview</h5>
                <div class="row text-center">
                    <div class="col-md-4 mb-3">
                        <div class="border p-3 rounded bg-light">
                            <h6>Total Earnings</h6>
                            <h4 class="text-success">Rs.{{ number_format($total_earnings ?? 0, 2) }}</h4>
                            <small class="text-muted">All time</small>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="border p-3 rounded bg-light">
                            <h6>This Month</h6>
                            <h4 class="text-primary">Rs.{{ number_format($month_earnings ?? 0, 2) }}</h4>
                            <small class="text-muted">{{ date('F Y') }}</small>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="border p-3 rounded bg-light">
                            <h6>Available Balance</h6>
                            <h4 class="text-warning">Rs.{{ number_format($available_balance ?? 0, 2) }}</h4>
                            <small class="text-muted">Ready to withdraw</small>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Referral Link -->
                <div class="mb-4">
                    <h6>Your Referral Link</h6>
                    <div class="input-group">
                        <input type="text" class="form-control" id="referral-link"
                            value="{{ url('/?ref=' . $affiliateData->referral_code) }}" readonly>
                        <button class="btn btn-outline-secondary"
                            onclick="navigator.clipboard.writeText(document.getElementById('referral-link').value)">
                            <i class="bx bx-copy"></i> Copy
                        </button>
                    </div>
                    <small class="text-muted mt-1 d-block">Share this link to earn commission on referrals.</small>
                </div>

                <!-- Profile Form -->
                <div>
                    <?php $affiliateData = Auth::guard('affiliate')->user(); ?>
                    <form action="{{ route('affiliate.profile.update') }}" method="POST" enctype="multipart/form-data"
                        class="card shadow-sm p-4">
                        @csrf

                        <div class="row">

                            <div class="col-12 mb-3 text-center">
                                <img src="{{ !empty($affiliateData->photo) ? url('upload/affiliate_images/' . $affiliateData->photo) : url('upload/no_image.jpg') }}"
                                    loading="lazy" class="rounded mb-3" alt="user avatar" width="300">
                                {{-- <label class="form-label">Profile Photo</label> --}}
                                <input type="file" name="photo" class="form-control mt-2">
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ $affiliateData->name }}" placeholder="Enter your name" required>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control"
                                    value="{{ $affiliateData->email }}" placeholder="Enter your email" required>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Phone</label>
                                <input type="text" name="phone" class="form-control"
                                    value="{{ $affiliateData->phone }}" placeholder="Enter phone number">
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Address</label>
                                <textarea name="address" class="form-control" rows="3"
                                    placeholder="Enter your address">{{ $affiliateData->address }}</textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">Bank Details</label>
                                <textarea name="bank_details" class="form-control" rows="3"
                                    placeholder="Enter bank details">{{ $affiliateData->bank_details }}</textarea>
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Referral Code</label>
                                <input type="text" name="referral_code" class="form-control"
                                    value="{{ $affiliateData->referral_code }}" readonly>
                            </div>

                            <hr class="mt-4">

                            <h6 class="text-start mt-4 mb-2">Change Password</h6>

                            <div class="col-6 mb-3">
                                <label class="form-label">Current Password</label>
                                <input type="password" name="current_password" class="form-control"
                                    placeholder="Enter current password">
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">New Password</label>
                                <input type="password" name="new_password" class="form-control"
                                    placeholder="Enter new password">
                            </div>

                            <div class="col-6 mb-3">
                                <label class="form-label">Confirm New Password</label>
                                <input type="password" name="new_password_confirmation" class="form-control"
                                    placeholder="Confirm new password">
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-primary w-100 mt-3">Update Profile</button>
                            </div>

                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
