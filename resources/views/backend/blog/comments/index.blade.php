@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Blog Comments</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Blog Comments</li>
                </ol>
            </nav>
        </div>
    </div>

    <!-- Comment List -->
    <div class="card">
        <div class="card-header">
            <h5>Pending Blog Comments</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Blog Name</th>
                        <th>Comment</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $key => $comment)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $comment->blog->post_title }}</td>
                        <td>{{ $comment->comment }}</td>
                        <td>{{ $comment->created_at->format('d M, Y') }}</td>
                        <td>
                            <span class="badge {{ $comment->status == 'approved' ? 'bg-success' : 'bg-warning' }}">
                                {{ ucfirst($comment->status) }}
                            </span>
                        </td>
                        <td>
                            @if($comment->status == 'pending')
                            <a href="{{ route('admin.blog.comments.approve', $comment->id) }}" class="btn btn-sm btn-success">Approve</a>
                            <a href="{{ route('admin.blog.comments.delete', $comment->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            @endif
                            @if($comment->status == 'approved')
                            <a href="{{ route('admin.blog.comments.delete', $comment->id) }}" class="btn btn-sm btn-danger">Delete</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @if($comments->isEmpty())
                    <tr>
                        <td colspan="6" class="text-center">No comments found.</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
