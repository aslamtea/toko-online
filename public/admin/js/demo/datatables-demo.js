// Call the dataTables jQuery plugin
$(document).ready(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/admin/post',
            type: 'GET'
        },
        columns: [
            { data: 'DT_RowIndex', name: 'id' },
            { data: 'judul', name: 'judul' },
            { data: 'user', name: 'penulis' },
            { data: 'categori', name: 'categori' },
            { data: 'action', name: 'action' }
        ],
    });
});