@extends('admin.tempat.header')

@section('judul')
    Member
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
                    <h1 class="text-center">Member</h1>
                </div>
                <div class="card-body">
            <a href="/admin/member/create" class="btn btn-primary my-3">Tambah Member</a>
                <table class="table table-striped table-bordered bg-light table-sm" id="dataTable" style="width: 100%">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Role </th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                {{-- <tbody>
                    <?php $i = 1; ?>
                    @foreach ($member as $member)
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <th scope="row">{{$member->name}}</th>
                            <th scope="row">{{$member->role}}</th>
                        <td>{{$member->email}}</td>
                            <td>
                            <a href="/admin/member/{{$member->id}}" class="badge badge-primary">detail</a>
                            <a href="/admin/member/{{$member->id}}/edit" class="badge badge-success">edit</a>
                            <form action="/admin/member/{{$member->id}}" method="POST" class="d-inline" id="hapus-ey">
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
            url: '/admin/member',
            type: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'role', name: 'role' },
            { data: 'email', name: 'role' },
            { data: 'action', name: 'action' },
        ],
    });
});
    </script>
  @endsection
