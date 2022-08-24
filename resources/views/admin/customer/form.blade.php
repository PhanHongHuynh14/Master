
@extends('layouts.admin.master')
@section('content')

<div class="col-md-9">
        @if (empty($customer))
        <form class="col-md-12" method="post" action="{{ route('admin.customer.store') }}">
          @csrf
          <div class="row">
            <div class="d-flex justify-content-between">
              <h3> Create a customer </h3>
        @elseif (!($isShow))
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
          @if (Session::has('success'))
          <div class="alert alert-success" role="alert">
              {{ session('success') }}
          </div>
      @endif
      @if (Session::has('error'))
          <div class="alert alert-danger" role="alert">
              {{ session('error') }}
          </div>
      @endif
          @if (!empty($customer))
          <div class="col-md-12">
            <label for="id" class="form-label">Id </label>
            <input name="id" id="id" class="form-control mb-2" value="{{ $customer->id }}" disabled>
          </div>
          @endif
          <div class="container-fluid">
            <label for="name" class="form-label"> Thông tin khách hàng </label>
            <input name="name" type="text" class="form-control mb-2 @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $customer->name ?? '') }}"{{ ($isShow) ? ' readonly' : ''}}>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="birthday" class="form-label"> Ngày sinh </label>
            <input name="birthday" type="date" class="form-control mb-2 @error('birthday') is-invalid @enderror" id="birthday" placeholder="" value="{{ old('birthday', $customer->birthday ?? '') }}"{{ ($isShow) ? ' readonly' : ''}}>
            @error('birthday')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="address" class="form-label"> Địa chỉ </label>
            <input name="address" type="text" class="form-control mb-2 @error('address') is-invalid @enderror" id="address" placeholder="" value="{{ old('address', $customer->address ?? '') }}"{{ ($isShow) ? ' readonly' : ''}}>
            @error('address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="phone" class="form-label"> Điện thoại </label>
            <input name="phone" type="text" class="form-control mb-2 @error('phone') is-invalid @enderror" id="phone" placeholder="" value="{{ old('phone', $customer->phone ?? '') }}"{{ ($isShow) ? ' readonly' : ''}}>
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="phone" class="form-label"> Thêm số zalo </label>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
            <div class="container1">
            <button style="margin-bottom: 10px" class="add_form_field">Thêm Số zalo &nbsp;
            <span style="font-size:16px; font-weight:bold;">+ </span>
            </button>
        <div><input type="text" name="phonezalo[]"></div>
        </div>
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
                        <input class="form-check-input" type="checkbox" name="role_id" id="{{ 'chkbox_'.$role->id }}" value="{{ $role->id }}"{{ ($selectedRoles->contains($role->id)) ? ' checked' : '' }}{{ ($isShow) ? ' readonly' : ''}}>
                        <label class="form-check-label" for="{{ 'chkbox_'.$role->id }}">{{ $role->name }}</label>
                    </div>
                    @endforeach
                </div>
            @endif
        </div>
        <div class="container-fluid">
            <label for="age" class="form-label"> Tuổi </label>
            <input name="age" type="text" class="form-control mb-2 @error('age') is-invalid @enderror" id="age" placeholder="" value="{{ old('age', $customer->age ?? '') }}"{{ ($isShow) ? ' readonly' : ''}}>
            @error('age')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="cmnd" class="form-label"> Số Căn Cước Công Dân </label>
            <input name="cmnd" type="text" class="form-control mb-2 @error('cmnd') is-invalid @enderror" id="cmnd" placeholder="" value="{{ old('cmnd', $customer->cmnd ?? '') }}"{{ ($isShow) ? ' readonly' : ''}}>
            @error('cmnd')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="bank" class="form-label"> Ngân hàng </label>
            <input name="bank" type="text" class="form-control mb-2 @error('bank') is-invalid @enderror" id="bank" placeholder="" value="{{ old('bank', $customer->bank ?? '') }}"{{ ($isShow) ? ' readonly' : ''}}>
            @error('bank')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="container-fluid">
            <label for="" class="form-label">Giới tính</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" value="0"
                    id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Nam
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="sex" value="1"
                    id="flexRadioDefault2">
                <label class="form-check-label" for="flexRadioDefault2">
                    Nữ
                </label>
            </div>
            @error('sex')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
         <div class="container-fluid">
            <label for="email" class="form-label"> Email </label>
            <input name="email" type="text" class="form-control mb-2 @error('email') is-invalid @enderror" id="email" placeholder="" value="{{ old('email', $customer->email ?? '') }}"{{ ($isShow) ? ' readonly' : ''}}>
            @error('email')
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
                    <input class="form-check-input" type="checkbox" name="user_id" id="{{ 'chkbox_'.$user->id }}" value="{{ $user->id }}"{{ ($selectedUsers->contains($user->id)) ? ' checked' : '' }}{{ $isShow ? ' readonly' : ''}}>
                    <label class="form-check-label" for="{{ 'chkbox_'.$user->id }}">{{ $user->name }}</label>
                </div>
                @endforeach
            </div>
        @endif
    </div>
        <div class="container-fluid">
            <label for="note" class="form-label"> Note </label>
            <input name="note" type="text" class="form-control mb-2 @error('note') is-invalid @enderror" id="note" placeholder="" value="{{ old('note', $customer->note ?? '') }}"{{ ($isShow) ? ' readonly' : ''}}>
            @error('note')
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

</div>


@endsection
