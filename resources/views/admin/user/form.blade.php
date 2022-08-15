@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>{{ __('message.createauser')}}</h1>
        <a href="{{ route('admin.user.index')}}" class="btn btn-back">{{ __('message.back')}}</a>
    </div>

    @if (Session::has('success'))
    <div class="alert alert-succes" role="alert">
        {{ session('success')}}
    </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error')}}
    </div>
    @endif

    <form class="row" action="{{ route('admin.user.store')}}" method="POST">
        @csrf
        @if (!empty($user))
        <div class="cod-md-12">
            <label for="id" class="form-label">id</label>
            <input name="id" id="id" class="form-control mb-2" value="{{ $user->id }}" readonly>
        </div>
        @endif
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('message.name')}}</label>
        <input name="name" type="text" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nhập tên" value="{{ old('name', $user->name ?? '')}}"{{ $isShow ? 'readonly': ''}}>
        @error('name')
        <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
        </div>

        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input name="email" type="text" class="form-control @error('email') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nhập tên" value="{{ old('email', $user->email ?? '')}}"{{$isShow ? 'readonly': ''}}>
        @error('email')
             <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
        </div>

        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Username</label>
        <input name="username" type="text" class="form-control @error('username') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nhập tên" value="{{ old('username', $user->username ?? '')}}"{{$isShow ? 'readonly': ''}}>
        @error('username')
             <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
        </div>

        @if(empty($user))
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">{{ __('message.password')}}</label>
                <input name="password" type="text" class="form-control @error('username') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nhập password" value="{{ old('password', $user->password ?? '')}}"{{$isShow ? 'readonly': ''}}>
                </div>
                @error('password')
                     <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
                @enderror
                <div class="col-md-6 mb-3">
                <label for="exampleFormControlInput1" class="form-label">{{ __('message.passwordconfirm')}}</label>
                <input name="password confirm" type="text" class="form-control @error('username') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nhập password" value="{{ old('password confirm', $user->passwordconfirm ?? '')}}"{{$isShow ? 'readonly': ''}}>
                </div>
        </div>
        @endif

        @php
            $selectedRoles = collect(old('role', empty($user) ? [] : $user->roles->pluck('id')->all()));
        @endphp

        <div class="col-md-12">
            <label for="role_ids" class="form-label">role_ids</label>
            @if(!empty($roles))
                <div class="col-md-12">
                    @foreach ($roles as $role)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="role_ids[]" id="{{ 'chkbox_'.$role->id }}" value="{{ $role->id }}"{{ ($selectedRoles->contains($role->id)) ? ' checked' : '' }}{{ $isShow ? ' readonly' : ''}}>
                        <label class="form-check-label" for="{{ 'chkbox_'.$role->id }}">{{ $role->name }}</label>
                    </div>
                    @endforeach
                </div>
        </div>

        <div class="col-md-12 mb-3">
            <label for="exampleFormControlInput1" class="form-label">{{ __('message.address')}}</label>
            <input name="address" type="text" class="form-control@error('address') is-invalid @enderror" id="exampleFormControlInput1" placeholder="Nhập Adrress" value="{{ old('address', $user->address ?? '')}}"{{$isShow ? 'readonly': ''}}>
        @error('address')
             <span class="invalid-feedback" role="alert">
            {{$message}}
        </span>
        @enderror
        </div>

        <div class="col-md-12">
            <label for="school_id" class="form-label">school_id </label>
            <input name="school_id" id="school_id" class="form-control mb-2" value="{{ '' }}" readonly>
        </div>

        @php
            $type = \App\Models\User::TYPES;
        @endphp
        @if(!empty($user)){
            <div class="col-md-12">
                <label for="type" class="form-type">Type</label>
                <input name="type" id="type" class="form-control" value="{{ empty($user->type) ? 'admin' : array_search($user->type, $type)}}" readonly>
            </div>
        }
        @endif

        <div class="col-md-12">
            <label for="parent_id" class="form-label">parent_id</label>
            <input name="parent_id" id="parent_id" class="form-control mb-2" value="{{ '' }}" readonly>
        </div>

        @if(!empty($user)) {
            <div class="col-md-12">
                <label for="verified_at" class="form-label">verified_at</label>
                <input name="verified_at" id="verified_at" class="form-control mb-2" value="{{ $user->verified_at }}" readonly>
            </div>
        }
        @endif

        <div class="col-md-12">
            <label for="code" class="form-label"> code </label>
            <input name="code" type="text" class="form-control mb-2 @error('code') is-invalid @enderror" id="code" placeholder="" value="{{ old('code', $user->code ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
            @error('code')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="social_type" class="form-label">social_type</label>
            <input name="social_type" type="text" class="form-control mb-2 @error('social_type') is-invalid @enderror" id="social_type" placeholder="" value="{{ old('social_type', $user->social_type ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
            @error('social_type')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="social_id" class="form-label">social_id </label>
            <input name="social_id" type="text" class="form-control mb-2 @error('social_id') is-invalid @enderror" id="social_id" placeholder="" value="{{ old('social_id', $user->social_id ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
            @error('social_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="social_name" class="form-label">social_name'</label>
            <input name="social_name" type="text" class="form-control mb-2 @error('social_name') is-invalid @enderror" id="social_name" placeholder="" value="{{ old('social_name', $user->social_name ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
            @error('social_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="social_nickname" class="form-label">social_nickname </label>
            <input name="social_nickname" type="text" class="form-control mb-2 @error('social_nickname') is-invalid @enderror" id="social_nickname" placeholder="" value="{{ old('social_nickname', $user->social_nickname ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
            @error('social_nickname')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="social_avatar" class="form-label">social_avatar </label>
            <input name="social_avatar" type="text" class="form-control mb-2 @error('social_avatar') is-invalid @enderror" id="social_avatar" placeholder="" value="{{ old('social_avatar', $user->social_avatar ?? '') }}"{{ $isShow ? ' readonly' : ''}}>
            @error('social_avatar')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="col-md-12">
            <label for="description" class="form-label">description</label>
            <textarea name="description" type="text" class="form-control mb-2 @error('description') is-invalid @enderror" id="description" placeholder="" value="{{ old('description', $user->description ?? '') }}"{{ $isShow ? ' readonly' : ''}}> </textarea>
            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        @if (!empty($user))
        <div class="col-md-12">
            <label for="created_at" class="form-label"> {{ __('user.created_at') }} </label>
            <input name="created_at" id="created_at" class="form-control mb-2" value="{{ $user->created_at }}" readonly>
        </div>
        <div class="col-md-12">
            <label for="updated_at" class="form-label"> {{ __('user.updated_at') }} </label>
            <input name="updated_at" id="updated_at" class="form-control mb-2" value="{{ $user->updated_at }}" readonly>
        </div>
        <div class="col-md-12">
            <label for="deleted_at" class="form-label"> {{ __('user.deleted_at') }} </label>
            <input name="deleted_at" id="deleted_at" class="form-control mb-2" value="{{ $user->deleted_at }}" readonly>
        </div>
        @endif

        <div class="clearfix"></div>
        <div class="bt">
        <button type="submit" class="btn btn-primary">{{ __('message.save')}}</button>
        <button type="submit" class="btn btn-secondary">{{ __('message.reset')}}</button>
        </div>
    </form>
</div>
</div>
@endsection
