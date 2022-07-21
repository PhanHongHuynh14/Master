@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>Create a Product</h1>
        <a href="{{ route('admin.product.index') }}" class="btn btn-back">Back</a>
    </div>
    <form class="row" action="{{ route('admin.product.store') }}">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="exampleFormControlInput1" class="form-label">Name</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="id" placeholder="Nhập tên" aria-describedby="emailHelp">
            @error('name')
            <span class="text-danger text-left">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-12 mb-3">
            <label for="name" class="form-label">Image</label>
            <input type="text" class="form-control" id="name"name="name" placeholder="Nhập tên" aria-describedby="emailHelp">
            @error('image')
            <span class="text-danger text-left">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-12 mb-3">
            <label for="ytb" class="form-label">Category</label>
            <select class="form-select" id="inputGroupSelect02" name="category">
              <option selected>Choose...</option>
              <option value="1">Category 1</option>
              <option value="2">Category 2</option>
              <option value="3">Category 3</option>
            </select>
            @error('category')
            <span class="text-danger text-left">{{$message}}</span>
            @enderror
          </div>
          <div class="col-md-12 mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea type="text" class="form-control" name="desc" id="desc" aria-describedby="emailHelp"></textarea>
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
