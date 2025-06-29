@extends('frontend.master_dashboard')

@section('title')
    Address
@endsection

@section('main')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span><a href="{{ url('/address') }}" rel="nofollow">Address</a>
            <span></span>Edit</a>
        </div>
    </div>
</div>

<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-md-12">
            <h3 class="mb-30">Shipping Address</h3>
            <form action="{{ route('address.update',$address->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group mb-20">
                            <label for="shipping_name">Name</label>
                            <input type="text" name="shipping_name" class="form-control" value="{{ $address->shipping_name }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-20">
                            <label for="shipping_email">Email</label>
                            <input type="email" name="shipping_email" class="form-control" value="{{$address->shipping_email }}">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group mb-20">
                            <label for="shipping_phone">Phone</label>
                            <input type="text" name="shipping_phone" class="form-control" value="{{$address->shipping_phone }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-20">
                            <label for="post_code">Post Code</label>
                            <input type="text" name="post_code" class="form-control" value="{{$address->post_code }}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group mb-20">
                            <label for="shipping_address">Address</label>
                            <textarea name="shipping_address" class="form-control">{{$address->shipping_address }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group mb-20">
                            <label for="state_id">State</label>
                            <select name="state_id" id="state_id" class="form-control">
                                <option value="">Select State</option>
                                @foreach($states as $state)
                                    <option {{$address->state_id==$state->id?'selected':''}} value="{{ $state->id }}">{{ $state->state_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-20">
                            <label for="district_id">District</label>
                            <select name="district_id" id="district_id" class="form-control">
                                @foreach($districts->where('state_id',$address->state_id) as $district)
                                <option {{$address->district_id==$district->id?'selected':''}} value="{{$district->id}}">{{$district->district_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-group mb-20">
                            <label for="city_id">City</label>
                            <select name="city_id" id="city_id" class="form-control">
                                @foreach ($cities->where('district_id',$address->district_id) as $city)
                                    <option {{$address->city_id==$city->id?'selected':''}} value="{{$city->id}}"> {{$city->city_name}} </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                <div class="mt-30">
                    <button type="submit" class="btn btn-fill-out btn-block">Save Address</button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    $('#state_id').on('change', function () {
        var stateId = $(this).val();
        if (stateId) {
            $.ajax({
                url: "{{ url('/get-districts') }}/" + stateId,
                type: "GET",
                success: function (data) {
                    $('#district_id').empty().append('<option value="">Select District</option>').attr('disabled', false);
                    $('#city_id').empty().append('<option value="">Select City</option>');
                    $.each(data, function (key, value) {
                        $('#district_id').append('<option value="' + value.id + '">' + value.district_name + '</option>');
                    });
                }
            });
        }
    });

    $('#district_id').on('change', function () {
        var districtId = $(this).val();
        if (districtId) {
            $.ajax({
                url: "{{ url('/get-cities') }}/" + districtId,
                type: "GET",
                success: function (data) {
                    $('#city_id').empty().append('<option value="">Select City</option>').attr('disabled', false);
                    $.each(data, function (key, value) {
                        $('#city_id').append('<option value="' + value.id + '">' + value.city_name + '</option>');
                    });
                }
            });
        }
    });
</script>
@endpush
@endsection
