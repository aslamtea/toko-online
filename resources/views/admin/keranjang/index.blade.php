@extends('admin.tempat.header')

@section('judul')
    Keranjang
@endsection
@section('header')
<link href="{{asset('admin')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection

@section('conten')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
      <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Keranjang</h1>
                </div>
                <div class="card-body">
            <a href="/admin/keranjang/create" class="btn btn-primary my-3">Tambah Keranjang</a>
                <table class="table table-striped table-bordered bg-light table-sm" id="dataTable" style="width: 100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">jumlah_harga</th>
                        <th scope="col">tanggal</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    <?php $i = 1; ?>
                    @foreach ($keranjang as $keranjang)
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <th scope="row">{{$keranjang->name}}</th>
                            <th scope="row">{{$keranjang->role}}</th>
                        <td>{{$keranjang->email}}</td>
                            <td>
                            <a href="/admin/keranjang/{{$keranjang->id}}" class="badge badge-primary">detail</a>
                            <a href="/admin/keranjang/{{$keranjang->id}}/edit" class="badge badge-success">edit</a>
                            <form action="/admin/keranjang/{{$keranjang->id}}" method="POST" class="d-inline" id="hapus-ey">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge badge-danger hapus-ey">delete</button>
                            </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                </tbody> --}}
            </table>
            </div>
        </div>
    </div>
    </div>
  </div>

    <!-- /.card -->
  <!-- /.container-fluid -->
  @endsection

  @section('footer')
  <script src="{{asset('admin')}}/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="{{asset('admin')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
  <script>
$(document).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/admin/keranjang',
            type: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'pembeli', name: 'pembeli' },
            { data: 'jumlah_harga', name: 'jumlah_harga' },
            { data: 'tanggal', name: 'tanggal' },
            { data: 'action', name: 'action' },
        ],
    });
});
    </script>
  @endsection
