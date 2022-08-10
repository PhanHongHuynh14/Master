@extends('layouts.admin.master')
@section('content')

@if(Session::has('error'))
<div class="alert alert-danger" role="alert">
    {{Session('error')}}
</div>
@endif
@if (empty($role))
<form class="col-md-9" method="post" action="{{ route('admin.role.store') }}">
    @csrf
    <div class="row">
      <div class="d-flex justify-content-between">
        <h3> {{ __('message.createrole')}} </h3>
  @else
<form class="col-md-9" method="post" action="{{ route('admin.role.update', $role->id) }}">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="d-flex justify-content-between">
        <h3> Edit role: </h3>
@endif
        <a href="{{ route('admin.role.index') }}" class="btn btn-primary">
            {{ __('message.back')}}
        </a>
      </div>
    </div>
    @if (!empty($role))
  <div class="container-fluid">
    <p class="form-label"> ID </p>
    <p class="form-control"> {{ $role->id }} </p>
    <p class="form-label"> Create At </p>
    <p class="form-control"> {{ $role->created_at }} </p>
    <p class="form-label"> Update At </p>
    <p class="form-control"> {{ $role->updated_at }} </p>
  </div>
  @endif
  <div class="container-fluid">
    <label for="name" class="form-label"> {{ __('message.name')}} </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $role->name ?? '') }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  @php
    $selected = collect([]);
    if(!empty(old('permission_ids'))) {
        $selected = collect(old('permission_ids', []));
    }else if(!empty($role)) {
        $selected = $role->permissions;
    }
  @endphp
   <div class="container-fluid mt-3">
    <label for="" class="form-label"> Permission Groups </label>
    @if(!empty($permissionGroups))
      @foreach($permissionGroups as $permissionGroup)
        <div class="container-fluid border rounded my-2 px-0 py-3 bg-white shadow-sm">
          <div class="container-fluid">
            <p class="form-label"> {{ $permissionGroup->name }} </p>
          </div>
          <hr>
          <div class="container-fluid">
          @if(!empty($permissionGroup->permissions))
            @foreach($permissionGroup->permissions as $permission)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permission_ids[]" id="{{ 'chkbox_'.$permissionGroup->id.'_'.$permission->id }}" value="{{ $permission->id }}"{{ ($selected->contains($permission->id)) ? ' checked' : '' }}>
                <label class="form-check-label" for="{{ 'chkbox_'.$permissionGroup->id.'_'.$permission->id }}">{{ $permission->name }}</label>
            </div>
            @endforeach
          @endif
          </div>
        </div>
      @endforeach
    @endif
    </div>
  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
        {{ __('message.save')}}
      </button>
    </div>
  </div>
</form>
@endsection
