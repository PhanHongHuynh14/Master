@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>Create a user</h1>
        <a href="/admin/user" class="btn btn-back">Back</a>
    </div>
    <form class="row" action="{{ route('user.store')}}">
        @csrf
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên"  aria-describedby="emailHelp">
        @error('name')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        </div>
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập email của bạn" aria-describedby="emailHelp">
        @error('email')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        </div>
        <div class="col-md-6 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập password" aria-describedby="emailHelp">
        </div>
        @error('password')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        <div class="col-md-6 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password confirm</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập lại password" aria-describedby="emailHelp">
        </div>
        @error('password confirm')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Address</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nhập Address" aria-describedby="emailHelp">
        </div>
        @error('Address')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Facebook</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="http://example.com">
        </div>
        @error('Facebook')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Youtube</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="http://example.com">
        </div>
        @error('Youtube')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripion</label>
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="clearfix"></div>
        <div class="bt">
        <button type="submit" class="btn btn-primary">Save</button>
        <button type="submit" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>
</div>
@endsection
