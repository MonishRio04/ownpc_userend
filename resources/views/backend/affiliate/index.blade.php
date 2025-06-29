@extends('admin.admin_dashboard')
@section('admin')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Affiliates Data</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Affiliates Data</li>
                </ol>
            </nav>
        </div>       
    </div>
    <!--end breadcrumb-->

    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sl.No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Commision</th>
                            <th>Discount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($affiliates as $key=> $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td><img src="{{(!empty($item->photo)) ?  url('upload/user_images/'.$item->photo) : url('upload/no_image.jpg')}}" alt="Admin" class="rounded-circle p-1 bg-primary" width="60" height="60"></td>
                            <td>{{$item->name}} <br>
                                {{$item->phone}}
                             </td>
                            <td>{{$item->commision_rate??0}}%</td>
                            <td>{{$item->discount_rate??0}}%</td>
                            <td>
                              <span class="badge bg-{{$item->status?'success':'danger'}}">{{$item->status == 1 ? 'Active' : 'Inactive'}}</span> 
                            </td>
                            <td>
                                <a href="{{route('admin.affiliate.edit',$item->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('admin.affiliate.delete',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>                    
                </table>
            </div>
        </div>
    </div>
</div>

@endsection