@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>{{ __('message.createauser')}}</h1>
        <a href="{{ route('admin.user.index')}}" class="btn btn-back">{{ __('message.back')}}</a>
    </div>
    <form class="row" action="{{ route('admin.user.store')}}" method="POST">
        @csrf
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('message.name')}}</label>
        <input name="name" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên"  aria-describedby="emailHelp">
        @error('name')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        </div>
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input name="email" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập email của bạn" aria-describedby="emailHelp">
        @error('email')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        </div>
        <div class="col-md-6 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('message.password')}}</label>
        <input name="password" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập password" aria-describedby="emailHelp">
        </div>
        @error('password')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        <div class="col-md-6 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('message.passwordconfirm')}}</label>
        <input name="password confirm" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập lại password" aria-describedby="emailHelp">
        </div>
        @error('password confirm')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">{{ __('message.address')}}</label>
        <input name="Address" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập Address" aria-describedby="emailHelp">
        </div>
        @error('Address')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Facebook</label>
        <input name="Facebook" type="text" class="form-control" id="exampleFormControlInput1" placeholder="http://example.com">
        </div>
        @error('Facebook')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Youtube</label>
        <input name="Youtube" type="text" class="form-control" id="exampleFormControlInput1" placeholder="http://example.com">
        </div>
        @error('Youtube')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">{{ __('message.descripion')}}</label>
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="clearfix"></div>
        <div class="bt">
        <button type="submit" class="btn btn-primary">{{ __('message.save')}}</button>
        <button type="submit" class="btn btn-secondary">{{ __('message.reset')}}</button>
        </div>
    </form>
</div>
</div>
@endsection
