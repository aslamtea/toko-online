@extends('toko.tempat.header')

@section('judul')
    Keranjang
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
                    <h1 class="text-center">Keranjang</h1>
                </div>
                <div class="card-body">
                    <a href="/toko/produk/create" class="btn btn-primary my-3">Tambah Keranjang</a>
                    <table class="table table-striped table-bordered bg-light table-sm" id="dataTable" style="width: 100%">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Pembeli</th>
                                <th scope="col">Nama Barang</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Jumlah Barang</th>
                                <th scope="col">Jumlah Harga</th>
                            </tr>
                        </thead>
                        {{--
                        <tbody>
                            <?php $i = 1; ?> @foreach ($produk as $produk)
                            <tr>
                                <th scope="row">
                                    <?= $i; ?>
                                </th>
                                <th scope="row">{{$produk->name}}</th>
                                <td>{{$produk->user->name}}</td>
                                <td>{{$produk->categori->name}}</td>
                                <td>
                                    <a href="/toko/produk/{{$produk->id}}" class="badge badge-primary">detail</a>
                                    <a href="/toko/produk/{{$produk->id}}/edit" class="badge badge-success">edit</a>
                                    <form action="/toko/produk/{{$produk->id}}" method="POST" class="d-inline" id="hapus-ey">
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
            url: '/toko/keranjang',
            type: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'pembeli', name: 'pembeli' },
            { data: 'barang', name: 'barang' },
            { data: 'harga', name: 'harga' },
            { data: 'jumlah', name: 'jumlah' },
            { data: 'jumlah_harga', name: 'jumlah_harga' },
        ],
    });
});
    </script>
  @endsection
