{{ Form::model($admin, ['route' => ['admin.delete', $admin->id], 'method' => 'delete', 'class' => 'form-horizontal']) }}
    <a href='{{ route("admin.show" ,[$admin->id]) }}' class='btn btn-primary btn-sm'>
        <span class='glyphicon glyphicon-edit'></span>
    </a>
    <button onClick="adminDeleted({{ $admin->id }})" type='button' class='btn btn-danger btn-sm'>
        <span class='glyphicon glyphicon-trash'></span>
    </button>
{{ Form::close() }}