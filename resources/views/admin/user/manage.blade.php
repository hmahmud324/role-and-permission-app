@extends('admin.master')

@section('body')
    <div class="row row-sm">
        <div class="col-md-12">
            <div class="page-header">
                <div>
                    <h1 class="page-title">User Module</h1>
                </div>
                <div class="ms-auto pageheader-btn">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Manage User</li>
                    </ol>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All User Info</h3>
                </div>
                <div class="card-body">
                    <p class="text-muted">{{session('message')}}</p>
                    <div class="table-responsive export-table">
                        <table id="file-datatable" class="table table-bordered text-nowrap key-buttons border-bottom  w-100">
                            <thead>
                            <tr>
                                <th class="border-bottom-0">SL NO</th>
                                <th class="border-bottom-0">Name</th>
                                <th class="border-bottom-0">Email</th>
                                <th class="border-bottom-0">Image</th>
                                <th class="border-bottom-0">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><img src="{{asset($user->profile_photo_path)}}" alt="" height="50" width="70"/></td>
                                <td>
                                    <a href="{{route('user.edit',['id'=> $user->id])}}" data-bs-toggle="tooltip" data-bs-original-title="Edit User" class="btn btn-success btn-sm rounded-11 me-2">
                                        <i class="fa fa-edit" style=" font-size: .95rem;"></i>
                                    </a>
                                    <a href="{{route('user.delete',['id'=> $user->id])}}" data-bs-toggle="tooltip" data-bs-original-title="Delete User" class="btn btn-danger btn-sm rounded-11 me-2" onclick="return confirm('Are you sure to delete this...');">
                                        <i class="fa fa-trash" style=" font-size: .95rem;"></i>
                                    </a>
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
@endsection
