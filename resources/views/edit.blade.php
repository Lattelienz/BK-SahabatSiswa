@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">edit User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <div class="row">
      <div class="col-md-6 ml-1">
        @if(session('success'))
        <div class="alert alert-success" role="alert">{{ session('success') }}</div>
        @endif
      </div>
    </div>
    <section class="content">
        <div class="container-fluid">
          <form action="{{ route('admin.user.update', ['id' => $data->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
              <!-- left column -->
              <div class="col-md-6">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Form Edit User</h3>
                  </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      <form>
                        <div class="card-body">
                            
                         <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email" value="{{$data->email}}" placeholder="Enter email">
                            @error('email')
                                <small>{{ $message }}</small>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label for="exampleInputEmail1">Username</label>
                              <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$data->username}}" placeholder="Enter Name">
                              @error('name')
                                    <small>{{ $message }}</small>
                              @enderror
                            </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="hidden" name="password" value="{{ $data->password }}">
                            <input type="newPassword" name="newPassword" class="form-control" id="exampleInputPassword1" placeholder="Password">
                            @error('password')
                                <small>{{ $message }}</small>
                            @enderror
                          </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                  </div>
                  <!--/.col (left) -->
                </div>
            </form>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>

  </div>

@endsection