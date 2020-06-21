@extends('admin.tempat.header')

@section('judul')
Akses
@endsection

@section('conten')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Akses</h1>
                </div>
            <div class="card-body">
            <a href="/admin/akses/create" class="btn btn-primary my-3">Tambah Akses</a>
            @if (session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
            @endif

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Role</th>
                        <th scope="col">Menu Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($akses as $akses)
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td>{{$akses->role}}</td>
                            <th scope="row">{{$akses->menu->name}}</th>
                            <td>
                            <a href="/admin/akses/{{$akses->id}}/edit" class="badge badge-success">edit</a>
                            <form action="/admin/akses/{{$akses->id}}" method="POST" class="d-inline" id="hapus-ey">
                                @method('delete')
                                @csrf
                                <button type="submit" class="badge badge-danger hapus-ey">delete</button>
                            </form>
                            </td>
                        </tr>
                        <?php $i++; ?>
                        @endforeach
                </tbody>
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
  <script>

    $("form").submit(function(e){

        var form = this;
        e.preventDefault();

        Swal.fire({
            title: 'apakah anda yakin mau dihapus',
            text: "akan di hapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, ya hapus data!'
            }).then((result) => {
            if (result.value) {
               return form.submit();
            }
        })

    });

  </script>
  @endsection
