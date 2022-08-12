@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>{{ __('message.createacategory')}}</h1>
        <a href="{{route('admin.category.index') }}" class="btn btn-back">{{ __('message.back')}}</a>
    </div>
    <form class="row" action="{{route('admin.category.store') }}">
        @csrf
        <div class="col-md-12 mb-3">
            <label for="exampleFormControlInput1" class="form-label">{{ __('message.categoryid')}}</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="id" placeholder="Nhập tên" aria-describedby="emailHelp">
            @error('id')
            <span class="text-danger text-left">{{$message}}</span>
            @enderror
        </div>
        <div class="col-md-12 mb-3">
            <label for="exampleFormControlInput1" class="form-label">{{ __('message.categoryname')}}</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="name" placeholder="Nhập tên" aria-describedby="emailHelp">
            @error('name')
            <span class="text-danger text-left">{{$message}}</span>
            @enderror
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
