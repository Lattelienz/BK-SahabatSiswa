<!-- halaman.blade.php -->

@extends('layout.main')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Guru-Bk</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    {{-- <section class="content"> --}}
        <div class="container-fluid">
            <a href="{{ route('admin.user.create')}}" class="btn btn-primary mb-3">Tambah Data</a>

            <div class="card">

                <div class="card-header">
                    {{-- <h3 class="card-title">Responsive Hover Table</h3> --}}

                    <div class="card-tools row" style="grid-gap: 1rem; ">
                        <form action="{{ route('admin.nameSearch') }}" method="get" class="input-group input-group-sm" style="width: 175px;">
                            <input type="text" name="nameSearch" class="form-control float-right" placeholder="Cari nama disini">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                        <form action="/halaman/classFilter" method="get" class="input-group input-group-sm" style="width: 175px;">
                            <select type="text" name="classFilter" class="form-control float-right" placeholder="Search">
                                <option value="" selected>Class</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>

                </div>
                <!-- /.card-header -->

                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Level</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <!-- if the $data variable is filled/present when the view is loaded, then the if below will run the code inside :-->
                            @if (isset($data))
                            
                                @foreach ($data as $d)                                
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{$d->username}} </td>
                                    <td> {{$d->email}} </td>
                                    <td> {{$d->level}} </td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', ['id' => $d->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                        <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}"class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                    </td>
                                </tr>                               
                                @endforeach

                            <!-- else, if the $data variable isn't filled/present when the view is loaded, then the code below will run :-->
                            @else

                                @foreach ($result as $d)    
                                <tr>
                                    <td> {{$loop->iteration}} </td>
                                    <td> {{$d->username}} </td>
                                    <td> {{$d->email}} </td>
                                    <td> {{$d->level}} </td>
                                    <td>
                                        <a href="{{ route('admin.user.edit', ['id' => $d->id]) }}" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                        <a data-toggle="modal" data-target="#modal-hapus{{ $d->id }}"class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>
                                    </td>
                                </tr>                               
                                @endforeach
                                
                            @endif
                            <!-- /.modal -->
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.card -->
            
        </div>
        <!-- /.container-fluid -->
    {{-- </section> --}}
    <!-- /.content -->
</div>
@endsection
