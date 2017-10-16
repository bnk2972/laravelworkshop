@extends('layouts.app-dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ route('admin.created.form') }}" class="pull-right">ADD</a>
                    Admin Dashboard
                </div>
                <div class="panel-body">
                    <table class="table table-striped" id="users-table">
                        <thead>
                            <tr>
                                <td>#</td>
                                <td>NAME</td>
                                <td>EMAIL</td>
                                <td>CREATED AT</td>
                                <td>UPDATED AT</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
reportUser();

function reportUser() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('datatables.data') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'created_at', name: 'created_at' },
            { data: 'updated_at', name: 'updated_at' },
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ],
        // initComplete: function () {
        //     this.api().columns().every(function () {
        //         var column = this;
        //         var columnClass = column.footer().className;
        //         if(columnClass != 'non_searchable'){
        //             var input = document.createElement("input");
        //             $(input).appendTo($(column.footer()).empty())
        //             .on('change', function () {
        //                 column.search($(this).val(), false, false, true).draw();
        //             });
        //         }
        //     });
        // },
    });
}

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

function adminDeleted(id) {
    swal({
        title: 'Are you sure?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then(function(willDelete) {
        if (willDelete) {
            $.ajax({
                url: '/dashboard/account/delete/' + id,
                type: 'DELETE',
                success:function(result) {
                    console.log(result)
                    if(result.status === 200){
                        swal(
                            'Oops...',
                            'Poof! Your imaginary file has been deleted!',
                            'success'
                        ).then(function(){
                            window.location.href = window.location.href;
                        });
                    }
                }
            });
        }
    });                                                                          
}
</script>
@endpush
