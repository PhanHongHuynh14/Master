@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>{{ __('message.listpermission')}}</h1>
        <a href="{{ route('admin.permission-group.create') }}" class="btn btn-new">{{ __('message.addnew')}}</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th>{{ __('message.name')}}</th>
            <th>{{ __('message.action')}}</th>
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
                <a href="{{ route('admin.permission-group.show', $permissionGroup->id) }}" class="btn btn-success">{{ __('message.show')}} </a>
                <a href="{{ route('admin.permission-group.edit', $permissionGroup->id) }}" class="btn btn-primary"> {{ __('message.edit')}} </a>
                <form class="d-inline" method="post" action="{{ route('admin.permission-group.destroy', $permissionGroup->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">{{ __('message.delete')}} </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
      </table>

      {{ $permissionGroups->links() }}

</div>

@endsection
