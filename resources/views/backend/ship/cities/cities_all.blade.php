@extends('admin.admin_dashboard')
@section('admin')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">All Cities</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Cities</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{route('add.cities')}}">
                <button type="button" class="btn btn-primary">Add Cities</button>
                </a>

            </div>
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
                            {{-- <th>State Name</th> --}}
                            <th>District Name</th>
                            <th>City Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($cities as $key=> $item)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$item?->district?->district_name}}</td>
                            <td>{{$item->city_name}}</td>
                            <td>
                                <a href="{{route('edit.cities',$item->id)}}" class="btn btn-info">Edit</a>
                                <a href="{{route('delete.cities',$item->id)}}" class="btn btn-danger" id="delete">Delete</a>
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