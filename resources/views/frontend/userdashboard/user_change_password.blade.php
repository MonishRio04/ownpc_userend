@extends('dashboard')
@section('user')

<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span>Change Password
        </div>
    </div>
</div>
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">
                    <!-- Start Div -->
                    @include('frontend.body.dashboard_sidebar_menu')
                    <!-- End Div -->
                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="card">
                                    <div class="card-header">
                                        <h5>Change Password</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{route('user.update.password')}}">
                                            @csrf
                                            @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{session('status')}}
                                            </div>
                                            @elseif (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                                {{session('error')}}
                                            </div>
                                            @endif
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <label>Old Password<span class="required">*</span></label>
                                                    <input required="" class="form-control @error('old_password') is-invalid @enderror" name="old_password" type="password" placeholder="Old Password" id="current_password" />
                                                    @error('old_password')
                                                    <span class="text-dange">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>New Password<span class="required">*</span></label>
                                                    <input required="" class="form-control @error('new_password') is-invalid @enderror" name="new_password" type="password" placeholder="New Password" id="new_password" />
                                                    @error('new_password')
                                                    <span class="text-dange">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Old Password<span class="required">*</span></label>
                                                    <input required="" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" type="password" placeholder="Confirm Password" id="new_password_confirmation" />
                                                    @error('new_password_confirmation')
                                                    <span class="text-dange">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                </div>
                                            </div>
                                        </form>
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


@endsection