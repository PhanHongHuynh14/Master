@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>Create a user</h1>
        <a href="" class="btn btn-back">Back</a>
    </div>
    <form class="row" action="" method="POST">
        @csrf
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập tên">
        </div>
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập email của bạn">
        </div>
        <div class="col-md-6 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập password">
        </div>
        <div class="col-md-6 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Password confirm</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập lại password">
        </div>
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Nhập Address">
        </div>
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Facebook</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="http://example.com">
        </div>
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlInput1" class="form-label">Youtobe</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="http://example.com">
        </div>
        <div class="col-md-12 mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Descripion</label>
         <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="clearfix"></div>
        <div class="bt">
        <button type="button" class="btn btn-primary">Save</button>
        <button type="button" class="btn btn-secondary">Reset</button>
        </div>
    </form>
</div>
</div>
@endsection
