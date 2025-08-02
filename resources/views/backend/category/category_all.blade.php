@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Category</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Category</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.category') }}">
                        <button type="button" class="btn btn-primary">Add Category</button>
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
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Sort Order</th>
                                <th>Add to Homepage</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td><img src="{{ asset($item->category_image) }}" style="width:70px; height:40px;"
                                            alt=""></td>
                                    <form method="post" action="{{ route('update.sort') }}">
                                        @csrf
                                        <td><input type="number" name="sort"value="{{ $item->sort_order }}"><input
                                                type="hidden" value="{{ $item->id }}" name="category_id">
                                            <button type="submit">save</button>
                                        </td>
                                    </form>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input toggle-homepage" type="checkbox" role="switch"
                                                data-id="{{ $item->id }}" {{ $item->add_to_homepage ? 'checked' : '' }}
                                                style="cursor: pointer; width: 3rem; height: 1.5rem;">
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('edit.category', $item->id) }}" class="btn btn-info">Edit</a>
                                        <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl.No</th>
                                <th>Category Name</th>
                                <th>Category Image</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('.toggle-homepage').on('change', function() {
            var categoryId = $(this).data('id');
            var status = $(this).is(':checked') ? 1 : 0;

            $.ajax({
                url: "{{ route('category.toggleHome') }}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    category_id: categoryId,
                    status: status
                },
                success: function(response) {
                    toastr.success(response.message);
                },
                error: function() {
                    toastr.error("Something went wrong");
                }
            });
        });
    });
</script>
