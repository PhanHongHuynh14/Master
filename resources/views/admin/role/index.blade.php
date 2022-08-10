@extends('layouts.admin.master')
@section('content')

@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    {{session('error')}}
</div>
@endif
<div class="col-md-9">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;">{{ __('message.rolelist')}}</p>
    <div>
      <a href="{{ route('admin.role.create') }}" class="btn btn-primary">{{ __('message.addnew')}}</a>
    </div>
  </div>
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> {{ __('message.name')}} </th>
            <th> {{ __('message.permissioncount')}} </th>
            <th> {{ __('message.action')}} </th>
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
                <a href="{{ route('admin.role.show', $role->id) }}" class="btn btn-success"> {{ __('message.show')}} </a>
                <a href="{{ route('admin.role.edit', $role->id) }}" class="btn btn-primary"> {{ __('message.edit')}} </a>
                <form class="d-inline" method="post" action="{{ route('admin.role.destroy', $role->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> {{ __('message.delete')}} </button>
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

