@extends('layouts.admin.master')
@section('content')

@if(Session::has('success'))
    <div class="alert alert-danger" role="alert">
        {{ Session('success')}}
    </div>
@endif
<div class="col-md-9">
    @if (empty($category))
    <form class="col-md-12" method="post" action="{{ route('admin.category.store')}}">
        @csrf
        <div class="row">
            <div class="d-flex justify-content-between">
                <h3>{{ __('category.createacategory')}}</h3>
    @else
    <form class="col-md-12" method="post" action="{{ route('admin.category.update', $category->id)}}">
        @method('PUT')
        @csrf
        <div class="d-flex justify-content-between">
            <h3>{{ __('category.editcategory')}}</h3>
    @endif
    <a href="{{route('admin.category.index') }}" class="btn btn-primary">{{ __('message.back')}}</a>
        </div>
    </div>
    @if(!empty($category))
    <div class="col-md-12">
        <p for="id" class="form-label">ID</p>
        <p class="form-control">{{ $category->id}}</p>
    </div>
    @endif
    <div class="col-md-12">
        <label for="name" class="form-label">{{ __('category.name')}}</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" value="{{ old('name', $category->name ?? '')}}">
        @error('name')
        <span class="invalid-feedback" role="alert">
            {{ $message}}
        </span>
        @enderror
    </div>
    <div class="col-md-12">
        <label for="slug" class="form-label">{{ __('category.slug')}}</label>
        <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="" value="{{ old('slug', $category->slug ?? '')}}">
        @error('slug')
        <span class="invalid-feedback" role="alert">
            {{ $message}}
        </span>
        @enderror
    </div>
    @if (!empty($category))
    <div class="col-md-12">
      <label for="created_at" class="form-label"> Created At </label>
      <input name="created_at" id="created_at" class="form-control mb-2" value="{{ $category->created_at }}" disabled>
    </div>
    <div class="col-md-12">
      <label for="updated_at" class="form-label"> Updated At </label>
      <input name="updated_at" id="updated_at" class="form-control mb-2" value="{{ $category->updated_at }}" disabled>
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
