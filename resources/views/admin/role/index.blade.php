@extends('layouts.admin.master')
@section('content')

@if(Seesion::has('error'))
<div class="alert alert-danger" role="alert">
    {{Session('error')}}
</div>
@endif
<div class="col-md-9">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;">Role List</p>
    <div>
      <a href="{{ route('admin.role.create') }}" class="btn btn-primary">Create</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> Name </th>
            <th> Permission Count </th>
            <th> Action </th>
        </tr>
        @if(!empty($roles))
        @foreach($roles as $role)
        <tr>
            <td>
                {{ $role->name }}
            </td>
            <td>
                {{ $role->permissions->count() }}
            </td>
            <td>
                <a href="{{ route('admin.role.show', $role->id) }}" class="btn btn-success"> Show </a>
                <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-primary"> Edit </a>
                <form class="d-inline" method="post" action="{{ route('admin.role.destroy', $role->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> Delete </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif


    </table>

    {{ $roles->links() }}

  </div>
</div>

@endsection

