@extends('layouts.admin.master')

@section('content')
@if (empty($permissionGroup))
<form class="col-md-9" method="post" action="{{ route('admin.permission-group.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3>{{ __('message.createpermissiongroup')}}</h3>
@else
<form class="col-md-9" method="post" action="{{ route('admin.permission-group.update', $permissionGroup->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3>{{ __('message.editpermissiongroup')}} </h3>
@endif
      <a href="{{ route('admin.permission-group.index') }}" class="btn btn-primary">
        {{ __('message.back')}}
      </a>
    </div>
  </div>

  @if (!empty($permissionGroup))
  <div class="container-fluid">
    <p for="id" class="form-label"> ID </p>
    <p class="form-control"> {{ $permissionGroup->id }} </p>
  </div>
    <p class="form-label"> Create At </p>
    <p class="form-control"> {{ $permissionGroup->created_at }} </p>
    <p class="form-label"> Update At </p>
    <p class="form-control"> {{ $permissionGroup->updated_at }} </p>
  @endif
  <div class="container-fluid">
    <label for="name" class="form-label"> {{ __('message.name')}} </label>
    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $permissionGroup->name ?? '') }}">
    @error('name')
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
