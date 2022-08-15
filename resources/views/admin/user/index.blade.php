@extends('layouts.admin.master')
@section('content')
<div class="col-md-9 mb-3">
  <div class="row">
  @if (Session::has('error'))
  <div class="alert alert-danger" role="alert">
    {{ session('error') }}
  </div>
@endif
        <div>
            <h1>{{ __('message.userlist')}}</h1>
            <a href="{{ route('admin.user.create')}}" class="btn btn-new">{{ __('message.addnew')}}</a>
            <a href="{{ route('admin.user.sendmail')}}" class="btn btn-sendmail">{{ __('message.sendmail')}}</a>
        </div>
    </div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">{{ __('message.name')}}</th>
        <th scope="col">Email</th>
        <th scope="col">{{ __('message.userRole')}}</th>
        <th scope="col">{{ __('message.action')}}</th>
      </tr>
    </thead>
    <tbody>
        @if(!empty($users))
        @foreach($users as $user)
        <tr>
            <td>
                <span class="cat-links">
                    {{ $user->name }}
                </span>
            </td>
            <td>
                <span class="cat-links">
                    {{ $user->email }}
                </span>
            </td>
            <td>
                <select name="" id="">
                    @foreach($user->roles as $role)
                <option> {{ $role->name }} </option>
                    @endforeach
                </select>
            </td>
            <td>
                <a href="{{ route('admin.user.show', $user->id) }}" class="btn btn-success"> {{ __('message.show') }} </a>
                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-primary"> {{ __('message.edit') }} </a>
                <form class="d-inline" method="post" action="{{ route('admin.role.destroy', $role->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> {{ __('message.delete')}} </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
  </table>

  {{ $users->links() }}

</div>
@endsection
