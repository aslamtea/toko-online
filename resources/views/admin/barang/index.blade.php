@extends('admin.tempat.header')

@section('judul')
    Barang
@endsection
@section('header')
<link href="{{asset('admin')}}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
@endsection


@section('conten')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Barang</h1>
                </div>
                <div class="card-body">
                    <a href="/admin/barang/create" class="btn btn-primary my-3">Tambah Barang</a>
                    <table class="table table-striped table-bordered bg-light table-sm" id="dataTable" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">name</th>
                                <th scope="col">Penulis</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Merek</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        {{--
                        <tbody>
                            <?php $i = 1; ?> @foreach ($barang as $barang)
                            <tr>
                                <th scope="row">
                                    <?= $i; ?>
                                </th>
                                <th scope="row">{{$barang->name}}</th>
                                <td>{{$barang->user->name}}</td>
                                <td>{{$barang->categori->name}}</td>
                                <td>
                                    <a href="/admin/barang/{{$barang->id}}" class="badge badge-primary">detail</a>
                                    <a href="/admin/barang/{{$barang->id}}/edit" class="badge badge-success">edit</a>
                                    <form action="/admin/barang/{{$barang->id}}" method="POST" class="d-inline" id="hapus-ey">
                                        @method('delete') @csrf
                                        <button type="submit" class="badge badge-danger hapus-ey">delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++; ?> @endforeach
                        </tbody> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

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
            url: '/admin/barang',
            type: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'user', name: 'penulis' },
            { data: 'kategori', name: 'kategori' },
            { data: 'merek', name: 'merek' },
            { data: 'action', name: 'action' }
        ],
    });
});
    </script>
  @endsection
