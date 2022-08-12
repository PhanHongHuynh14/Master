@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>{{ __('message.listpermission')}}</h1>
        <a href="{{ route('admin.permission.create') }}" class="btn btn-new">{{ __('message.addnew')}}</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th>{{ __('message.name')}}</th>
            <th>{{ __('message.key')}}</th>
            <th>{{ __('message.permissiongroupid')}}</th>
            <th>{{ __('message.action')}}</th>
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
                <a href="{{ route('admin.permission.show', $permission->id) }}" class="btn btn-success"> {{ __('message.show')}} </a>
                <a href="{{ route('admin.permission.edit', $permission->id) }}" class="btn btn-primary"> {{ __('message.edit')}} </a>
                <form class="d-inline" method="post" action="{{ route('admin.permission.destroy', $permission->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> {{ __('message.delete')}} </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
      </table>

      {{ $permissions->links() }}
</div>

@endsection
