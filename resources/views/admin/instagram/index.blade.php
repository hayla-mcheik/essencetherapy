@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif

        <div class="card">
            <div class="card-header">
                <h4>Instagram Shop List
                    <a href="{{ url('admin/instagram/create') }}" class="btn btn-primary btn-sm float-end text-white">
                        Add New Look
                    </a>
                </h4>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Insta Link</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($feeds as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->product->name }}</td>
                            <td>
                                <img src="{{ asset($item->image) }}" style="width: 70px; height: 70px;" alt="Insta">
                            </td>
                            <td>
                                @if($item->insta_link)
                                    <a href="{{ $item->insta_link }}" target="_blank">View Post</a>
                                @else
                                    None
                                @endif
                            </td>
                            <td>{{ $item->status == '1' ? 'Hidden':'Visible' }}</td>
                            <td>
                                <button class="btn btn-danger btn-sm text-white">Delete</button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6">No Instagram Looks Added Yet</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection