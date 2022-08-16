@extends('layouts.admin.master')

@section('content')
<div class="col-md-9">
@if (empty($user))
<form class="col-md-12" method="post" action="{{ route('admin.user.store') }}">
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('message.createauser') }} </h3>
@elseif (!empty($isShow))
<form class="col-md-12" action="">
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> {{ __('message.userlist') }} </h3>
@else
<form class="col-md-12" method="post" action="{{ route('admin.user.update', $user->id) }}">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="d-flex justify-content-between">
      <h3> Edit user </h3>
@endif
      <a href="{{ route('admin.user.index') }}" class="btn btn-primary">
      {{ __('message.back') }}
      </a>
    </div>
  </div>
  @if (!empty($user))
  <div class="col-md-12">
    <label for="id" class="form-label">Id </label>
    <input name="id" id="id" class="form-control mb-2" value="{{ $user->id }}" disabled>
  </div>
  @endif
  <div class="col-md-12">
    <label for="name" class="form-label"> {{ __('message.name') }} </label>
    <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $user->name ?? '') }}">
    @error('name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-md-12">
    <label for="email" class="form-label">Email </label>
    <input name="email" type="text" class="form-control mb-2 @error('email') is-invalid @enderror" id="email" placeholder="" value="{{ old('email', $user->email ?? '') }}">
    @error('email')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-md-12">
    <label for="username" class="form-label">username </label>
    <input name="username" type="text" class="form-control mb-2 @error('username') is-invalid @enderror" id="username" placeholder="" value="{{ old('username', $user->username ?? '') }}">
    @error('username')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  @if (empty($user))
  <div class="row">
    <div class="col-md-6">
      <div class="col-md-12">
        <label for="password" class="form-label"> {{ __('message.password') }} </label>
        <input name="password" type="password" class="form-control mb-2 @error('password') is-invalid @enderror" id="password" placeholder="">
        @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>
    </div>
    <div class="col-md-6">
      <div class="col-md-12">
        <label for="password-confirm" class="form-label"> {{ __('message.passwordconfirm') }} </label>
        <input id="password-confirm" type="password" class="form-control mb-2" name="password_confirmation">
      </div>
    </div>
  </div>
  @endif
  @php
    $selectedRoles = collect(old('role_ids', empty($user) ? [] : $user->roles->pluck('id')->all()));
  @endphp
  <div class="col-md-12">
    <label for="role_ids[]" class="form-label">RoleId </label>
    @if(!empty($roles))
      <div class="col-md-12">
        @foreach($roles as $role)
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="role_ids[]" id="{{ 'checkbox_'.$role->id }}" value="{{ $role->id }}"{{ ($selectedRoles->contains($role->id)) ? ' checked' : '' }}>
          <label class="form-check-label" for="{{ 'checkbox_'.$role->id }}">{{ $role->name }}</label>
        </div>
        @endforeach
      </div>
    @endif
  </div>
  <div class="col-md-12">
    <label for="address" class="form-label"> {{ __('message.address') }} </label>
    <input name="address" type="text" class="form-control mb-2 @error('address') is-invalid @enderror" id="address" placeholder="" value="{{ old('address', $user->address ?? '') }}">
    @error('address')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-md-12">
    <label for="school_id" class="form-label">school </label>
    <input name="school_id" id="school_id" class="form-control mb-2" value="{{ '' }}" disabled>
  </div>
  @php
    $types = \App\Models\User::TYPES;
  @endphp
  @if (!empty($user))
  <div class="col-md-12">
    <label for="type" class="form-label">Type </label>
    <input name="type" id="type" class="form-control mb-2" value="{{ empty($user->type) ? 'admin' : array_search($user->type, $types) }}" disabled>
  </div>
  @endif
  <div class="col-md-12">
    <label for="parent_id" class="form-label">Parent</label>
    <input name="parent_id" id="parent_id" class="form-control mb-2" value="{{ '' }}" disabled>
  </div>
  @if (!empty($user))
  <div class="col-md-12">
    <label for="verified_at" class="form-label">Verified at</label>
    <input name="verified_at" id="verified_at" class="form-control mb-2" value="{{ $user->verified_at }}" disabled>
  </div>
  @endif
  <div class="col-md-12">
    <label for="code" class="form-label">Code </label>
    <input name="code" type="text" class="form-control mb-2 @error('code') is-invalid @enderror" id="code" placeholder="" value="{{ old('code', $user->code ?? '') }}">
    @error('code')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-md-12">
    <label for="social_type" class="form-label">Social Type </label>
    <input name="social_type" type="text" class="form-control mb-2 @error('social_type') is-invalid @enderror" id="social_type" placeholder="" value="{{ old('social_type', $user->social_type ?? '') }}">
    @error('social_type')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-md-12">
    <label for="social_id" class="form-label"> Social Id </label>
    <input name="social_id" type="text" class="form-control mb-2 @error('social_id') is-invalid @enderror" id="social_id" placeholder="" value="{{ old('social_id', $user->social_id ?? '') }}">
    @error('social_id')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-md-12">
    <label for="social_name" class="form-label">Social Name</label>
    <input name="social_name" type="text" class="form-control mb-2 @error('social_name') is-invalid @enderror" id="social_name" placeholder="" value="{{ old('social_name', $user->social_name ?? '') }}">
    @error('social_name')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-md-12">
    <label for="social_nickname" class="form-label">Social Nickname </label>
    <input name="social_nickname" type="text" class="form-control mb-2 @error('social_nickname') is-invalid @enderror" id="social_nickname" placeholder="" value="{{ old('social_nickname', $user->social_nickname ?? '') }}">
    @error('social_nickname')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-md-12">
    <label for="social_avatar" class="form-label">Social Avatar</label>
    <input name="social_avatar" type="text" class="form-control mb-2 @error('social_avatar') is-invalid @enderror" id="social_avatar" placeholder="" value="{{ old('social_avatar', $user->social_avatar ?? '') }}">
    @error('social_avatar')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  <div class="col-md-12">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" type="text" class="form-control mb-2 @error('description') is-invalid @enderror" id="description" placeholder="" value="{{ old('description', $user->description ?? '') }}"> </textarea>
    @error('description')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  @if (!empty($user))
  <div class="col-md-12">
    <label for="created_at" class="form-label"> Created At </label>
    <input name="created_at" id="created_at" class="form-control mb-2" value="{{ $user->created_at }}" disabled>
  </div>
  <div class="col-md-12">
    <label for="updated_at" class="form-label"> Updated At </label>
    <input name="updated_at" id="updated_at" class="form-control mb-2" value="{{ $user->updated_at }}" disabled>
  </div>
  @endif

  <div class="row mt-3">
    <div class="d-flex justify-content-center">
      <button type="submit" class="btn btn-primary">
      {{ __('message.save') }}
      </button>
    </div>
  </div>
</form>
</div>
@endsection
