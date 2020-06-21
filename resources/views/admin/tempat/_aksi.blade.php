<td>
    <a href="{{$show}}" class="badge badge-warning">Detail</a>
    <a href="{{$view}}" target="_blank" class="badge badge-primary">View</a>
    <a href="{{$edit}}" class="badge badge-success">edit</a>
    <form action="{{$delete}}" method="POST" class="d-inline">
        @method('delete')
        @csrf
        <button type="submit" class="badge badge-danger hapus-ey">delete</button>
    </form>
</td>

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
            confirmButtonText: ' ya, hapus data!'
            }).then((result) => {
            if (result.value) {
               return form.submit();
            }
        })

    });

  </script>
