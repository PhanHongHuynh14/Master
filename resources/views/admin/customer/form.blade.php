
@extends('layouts.admin.master')
@section('content')

<div class="col-md-9">
        @if (empty($user))
        <form class="col-md-12" method="post" action="{{ route('admin.customer.store') }}">
          @csrf
          <div class="row">
            <div class="d-flex justify-content-between">
              <h3> Create a customer </h3>
        @elseif (!isset($isShow))
        <form class="col-md-12" action="">
          <div class="row">
            <div class="d-flex justify-content-between">
              <h3> Customer list</h3>
        @else
        <form class="col-md-12" method="post" action="{{ route('admin.customer.update', $customer->id) }}">
          @method('PUT')
          @csrf
          <div class="row">
            <div class="d-flex justify-content-between">
              <h3> Edit customer </h3>
        @endif
              <a href="{{ route('admin.customer.index') }}" class="btn btn-primary">
              {{ __('message.back') }}
              </a>
            </div>
          </div>
          @if (!empty($customer))
          <div class="col-md-12">
            <label for="id" class="form-label">Id </label>
            <input name="id" id="id" class="form-control mb-2" value="{{ $customer->id }}" disabled>
          </div>
          @endif
          <div class="container-fluid">
            <label for="name" class="form-label"> Thông tin khách hàng </label>
            <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $customer->name ?? '') }}"{{ isset($isShow) ? ' readonly' : ''}}>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="birthday" class="form-label"> Ngày sinh </label>
            <input name="birthday" type="date" class="form-control mb-2 @error('birthday') is-invalid @enderror" id="birthday" placeholder="" value="{{ old('birthday', $customer->birthday ?? '') }}"{{ isset($isShow) ? ' readonly' : ''}}>
            @error('birthday')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="address" class="form-label"> Địa chỉ </label>
            <input name="address" type="text" class="form-control mb-2 @error('address') is-invalid @enderror" id="address" placeholder="" value="{{ old('address', $customer->address ?? '') }}"{{ isset($isShow) ? ' readonly' : ''}}>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="phone" class="form-label"> Điện thoại </label>
            <input name="phone" type="text" class="form-control mb-2 @error('phone') is-invalid @enderror" id="phone" placeholder="" value="{{ old('phone', $customer->phone ?? '') }}"{{ isset($isShow) ? ' readonly' : ''}}>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    @php
        $selectedRoles = collect(old('role', empty($customer) ? [] : $customer->roles->pluck('id')->all()));
    @endphp
        <div class="container-fluid">
            <label for="role" class="form-label"> Loại khách hàng </label>
            @if(!empty($roles))
                <div class="container-fluid">
                    @foreach($roles as $role)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="role_id" id="{{ 'chkbox_'.$role->id }}" value="{{ $role->id }}"{{ ($selectedRoles->contains($role->id)) ? ' checked' : '' }}{{ isset($isShow) ? ' readonly' : ''}}>
                        <label class="form-check-label" for="{{ 'chkbox_'.$role->id }}">{{ $role->name }}</label>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <label for="age" class="form-label"> Tuổi </label>
            <input name="age" type="text" class="form-control mb-2 @error('age') is-invalid @enderror" id="age" placeholder="" value="{{ old('age', $customer->age ?? '') }}"{{ isset($isShow) ? ' readonly' : ''}}>
            @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="cmnd" class="form-label"> Số Căn Cước Công Dân </label>
            <input name="cmnd" type="text" class="form-control mb-2 @error('cmnd') is-invalid @enderror" id="cmnd" placeholder="" value="{{ old('cmnd', $customer->cmnd ?? '') }}"{{ isset($isShow) ? ' readonly' : ''}}>
            @error('cmnd')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="bank" class="form-label"> Ngân hàng </label>
            <input name="bank" type="text" class="form-control mb-2 @error('bank') is-invalid @enderror" id="bank" placeholder="" value="{{ old('bank', $customer->bank ?? '') }}"{{ isset($isShow) ? ' readonly' : ''}}>
            @error('bank')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="sex" class="form-label"> Giới tính </label>
            <input name="sex" type="text" class="form-control mb-2 @error('sex') is-invalid @enderror" id="sex" placeholder="" value="{{ old('sex', $customer->sex ?? '') }}"{{ isset($isShow) ? ' readonly' : ''}}>
            @error('sex')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        @php
        $selectedUsers = collect(old('user', empty($customer) ? [] : $customer->users->pluck('id')->all()));
    @endphp
        <div class="container-fluid">
            <label for="user" class="form-label"> Người tạo </label>
            @if(!empty($users))
                <div class="container-fluid">
                    @foreach($users as $user)
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="user_id" id="{{ 'chkbox_'.$user->id }}" value="{{ $user->id }}"{{ ($selectedUsers->contains($user->id)) ? ' checked' : '' }}{{ isset($isShow) ? ' readonly' : ''}}>
                        <label class="form-check-label" for="{{ 'chkbox_'.$user->id }}">{{ $user->name }}</label>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <label for="note" class="form-label"> Note </label>
            <input name="note" type="text" class="form-control mb-2 @error('note') is-invalid @enderror" id="note" placeholder="" value="{{ old('note', $customer->note ?? '') }}"{{ isset($isShow) ? ' readonly' : ''}}>
            @error('note')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row mt-3">
            <div class="d-flex justify-content-center">
                <input type="submit" class="btn btn-primary" value="save">
            </div>
        </div>
    </form>
</div>
@endsection
