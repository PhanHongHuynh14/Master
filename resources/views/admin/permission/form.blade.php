@extends('layouts.admin.master')

@section('content')
@if (empty($permission))
<form class="col-md-9" method="post" action="{{ route('admin.permission.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('message.createpermission')}} </h3>
@else
<form class="col-md-9" method="post" action="{{ route('admin.permission.update', $permission->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('message.editpermission')}} </h3>
@endif
      <a href="{{ route('admin.permission.index') }}" class="btn btn-primary">
        Back
      </a>
    </div>
  </div>

  @if (!empty($permission))
  <div class="container-fluid">
    <p for="id" class="form-label"> ID </p>
    <p class="form-control"> {{ $permission->id }} </p>
  </div>
  <div style="margin-left: 10px" class="form">
    <p class="form-label"> Create At </p>
    <p class="form-control"> {{ $permission->created_at }} </p>
    <p class="form-label"> Update At </p>
    <p class="form-control"> {{ $permission->updated_at }} </p>
  </div>

  @endif
  <div class="container-fluid">
    <label for="name" class="form-label"> {{ __('message.name')}} </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $permission->name ?? '') }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
    <label for="key" class="form-label"> {{ __('message.key')}}</label>
    <input name="key" type="text" class="form-control @error('key') is-invalid @enderror" id="key" placeholder="" value="{{ old('key', $permission->key?? '') }}">
    @error('key')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>

  @php
     $selected = null;
     if(!empty(old('permission_group_id'))){
        $selected = old('permission_group_id');
     } else if (!empty($permission)){
        $selected = $permission->permissionGroup->id;
     }
  @endphp
  <div class="container-fluid">
    <label for="permission_group_id" class="form-label"> Permission Group </label>
    <select name="permission_group_id" id="permission_group_id" class="form-select @error('permission_group_id') is-invalid @enderror">
      @if (empty($selected))
        <option value="" selected disabled hidden> Select a permission group </option>
      @endif
      @foreach($permissionGroups as $permissionGroup)
        <option value="{{ $permissionGroup->id }}"{{ ($selected == $permissionGroup->id) ? ' selected' : ''}}> {{ $permissionGroup->name }} </option>
      @endforeach
    </select>
    @error('permission_group_id')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
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
