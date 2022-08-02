@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>ListPermission</h1>
        <a href="{{ route('admin.permission-group.create') }}" class="btn btn-new">+Addnew</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>
        @if(!empty($permissionGroups))
        @foreach($permissionGroups as $permissionGroup)
        <tr>
            <td>
                <p>
                    {{ $permissionGroup->name }}
                </p>
            </td>
            <td>
                <a href="{{ route('admin.permission-group.show', $permissionGroup->id) }}" class="btn btn-success"> Show </a>
                <a href="{{ route('admin.permission-group.edit', $permissionGroup->id) }}" class="btn btn-primary"> Edit </a>
                <form class="d-inline" method="post" action="{{ route('admin.permission-group.destroy', $permissionGroup->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
      </table>
</div>
</div>
@endsection
