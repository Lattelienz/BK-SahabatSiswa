@extends('layouts.main')

@section('container')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Siswa</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Gambar</th>
                  <th>Nama</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($siswa as $i)

                @endforeach
                <tr>
                    <td style="width: 100px; object-fit: cover;">
                        <img src="{{ asset('storage/'.$i->gambar) }}" alt="{{ $i->nama }}" width="80">
                    </td>
                    <td><a href="siswa/{{ $i->id }}">{{ $i->nama }}</a></td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
@endsection
