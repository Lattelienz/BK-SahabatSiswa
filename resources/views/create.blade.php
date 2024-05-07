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
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Tambah User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.Content Header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="col-md-5">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Form Tambah User</h3>
                  </div>
                  <!-- /.card-header -->

                  <!-- form start -->
                  <div class="card-body">

                      <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Masukkan email">
                        @error('email')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="namaa">Username</label>
                        <input type="text" name="username" class="form-control" id="namaa" placeholder="Masukkan Nama">
                        @error('username')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        @error('password')
                          <small>{{ $message }}</small>
                        @enderror
                      </div>

                      <div class="form-group">
                        <!-- select -->
                          <div class="form-group">
                              <label>Level</label>
                              <select name="level" class="form-control">
                                  <option>Admin</option>
                                  <option>Siswa</option>
                                  <option>Guru</option>
                              </select>
                          </div>
                      </div>

                      {{-- <div class="form-group">
                        <label>Tanggal Lahir</label>
                          <div class="input-group date" id="reservationdate" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate">
                              <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div> --}}

                    </div>
                    <!-- /.card-body -->
    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">Submit</button>
                    </div>
                    
                </div>
                <!-- /.card -->
    
                
                <!--/.col (left) -->
            </div>
          </form>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>

  </div>
  <!-- /.content -->
  
@endsection
