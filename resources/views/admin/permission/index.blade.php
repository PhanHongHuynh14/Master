@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>ListPermission</h1>
        <a href="{{ route('admin.permission.create') }}" class="btn btn-new">+Addnew</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Key</th>
            <th>Permission_Group_id</th>
            <th>Action</th>
          </tr>
        </thead>
        @if(!empty($permissions))
        @foreach($permissions as $permission)
        <tr>
            <td>
                <p>
                    {{ $permission->name }}
                </p>
            </td>
            <td>
                <p>
                    {{ $permission->key }}
                </p>
            </td>
            <td>
                <p>
                    {{ $permission->permission_group_id }}
                </p>
            </td>
            <td>
                <a href="{{ route('admin.permission.show', $permission->id) }}" class="btn btn-success"> Show </a>
                <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-primary"> Edit </a>
                <form class="d-inline" method="post" action="{{ route('admin.permission.destroy', $permission->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
      </table>

      {{ $permissions->links() }}
</div>

@endsection
