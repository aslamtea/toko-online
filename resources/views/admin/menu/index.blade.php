@extends('admin.tempat.header')

@section('judul')
Menu
@endsection

@section('conten')
<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card bg-gradient-light">
                <div class="card-header">
                    <h1 class="text-center">Menu</h1>
                </div>
            <div class="card-body">
            <a href="/admin/menu/create" class="btn btn-primary my-3">Tambah Menu</a>

            <table class="table table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    @foreach ($menu as $menu)
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                        <td>{{$menu->name}}</td>
                            <td>
                            <a href="/admin/menu/{{$menu->id}}/edit" class="badge badge-success">edit</a>
                            <form action="/admin/menu/{{$menu->id}}" method="POST" class="d-inline" id="hapus-ey">
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
