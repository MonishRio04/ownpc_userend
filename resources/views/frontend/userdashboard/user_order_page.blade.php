@extends('dashboard')
@section('user')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span>My Account
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
                                        <h3 class="mb-0">Your Orders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table" style="background: #ddd; font-weight:600;">
                                                <thead>
                                                    <tr>
                                                        <th>Sl</th>
                                                        <th>Date</th>
                                                        <th>Total</th>
                                                        <th>Payment</th>
                                                        <th>Invoice</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($orders as $key=>$order)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{$order->order_date}}</td>
                                                        <td>₹{{$order->amount}}</td>
                                                        <td>{{$order->payment_method}}</td>
                                                        <td>{{$order->invoice_no}}</td>
                                                        <td>
                                                            @if($order->status == 'pending')
                                                            <span class="badge badge-pill bg-warning">Pending</span>
                                                            @elseif($order->status == 'confirm')
                                                            <span class="badge badge-pill bg-info">Confirmed</span>
                                                            @elseif($order->status == 'processing')
                                                            <span class="badge badge-pill bg-dark">Processing</span>
                                                            @elseif($order->status == 'delivered')
                                                            <span class="badge badge-pill bg-success">Delivered</span>
                                                            @if($order->return_order == 1)
                                                            <span class="badge badge-pill" style="background: red;">Return</span>
                                                            @endif
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{url('user/order-details/'.$order->id)}}" class="btn-sm btn-success"><i class="fa fa-eye"></i> View</a>
                                                            <a href="{{url('user/invoice-download/'.$order->id)}}" class="btn-sm btn-danger"><i class="fa fa-download"></i> Invoice</a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection