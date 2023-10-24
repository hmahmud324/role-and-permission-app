@extends('admin.master')


@section('body')
    <div class="col-md-12">
        <div class="page-header">
            <div>
                <h1 class="page-title">User Module</h1>
            </div>
            <div class="ms-auto pageheader-btn  ">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">User</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add User</li>
                </ol>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add User Form</h4>
            </div>
            <div class="card-body">
                <p class="text-center" data-timeout>{{session('message')}}</p>
                <form class="form-horizontal" action="{{route('user.new')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class=" row mb-4">
                        <label for="inputName" class="col-md-3 form-label">User Name</label>
                        <div class="col-md-9">
                            <input type="text" class="form-control" id="inputName" name="name" placeholder="User Name"/>
                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ' '}}</span>
                        </div>
                    </div>
                    <div class=" row mb-4">
                        <label for="inputEmail3" class="col-md-3 form-label">User Email</label>
                        <div class="col-md-9">
                            <input  class="form-control" name="email" id="inputEmail3" placeholder="User Email"/>
                            <span class="text-danger">{{$errors->has('email') ? $errors->first('email') : ' '}}</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">User Password</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="password" class="form-control" placeholder="User Password" name="password" style="height: auto;">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <label class="col-md-3 form-label">User Image</label>
                        <div class="col-md-9">
                            <div class="input-group">
                                <input type="file" class="form-control"  name="image" style="height: auto;">
                            </div>
                        </div>
                    </div>
                    <div class="mb-0 mt-4 row justify-content-end">
                        <div class="col-md-9 me-auto">
                            <button class="btn btn-primary">Create New User</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


