@extends('layouts.admin.master')
@section('content')

@if (empty($question))
<form class="col-md-9" method="post" action="{{ route('admin.question.store') }}">
    @csrf
    <div class="row">
      <div class="d-flex justify-content-between">
        <h3> {{ __('question.createquestion')}} </h3>
  @else
<form class="col-md-9" method="post" action="{{ route('admin.question.update', $question->id) }}">
    @method('PUT')
    @csrf
    <div class="row">
      <div class="d-flex justify-content-between">
        <h3> {{ __('question.editquestion')}}  </h3>
@endif
        <a href="{{ route('admin.question.index') }}" class="btn btn-primary">
            {{ __('message.back')}}
        </a>
      </div>
    </div>
    @if (!empty($question))
  <div class="container-fluid">
    <p class="form-label"> ID </p>
    <p class="form-control"> {{ $question->id }} </p>
    <p class="form-label"> Create At </p>
    <p class="form-control"> {{ $question->created_at }} </p>
    <p class="form-label"> Update At </p>
    <p class="form-control"> {{ $question->updated_at }} </p>
  </div>
  @endif
  <div class="container-fluid">
    <label for="content" class="form-label"> {{ __('question.content')}} </label>
    <input name="content" type="text" class="form-control @error('content') is-invalid @enderror" id="content" placeholder="" value="{{ old('content', $role->content ?? '') }}">
    @error('content')
      <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
  @php
    $selected = null;
    if(!empty(old('category_id'))) {
        $selected = collect(old('category_id', []));
    }else if(!empty($question)) {
        $selected = $question->category;
    }
  @endphp
   <div class="container-fluid mt-3">
    <label for="" class="form-label"> {{ __('question.selectcategory')}} </label>
    <select name="category_id" id="category_id" class="form-select  @error('name') is-invalid @enderror">
    @if(empty($selected))
    <option value="" selected disabled hidden>Select Category</option>
    @endif
      @foreach($categories as $category)
      <option value="{{ $category->id }}"{{ ($selected == $category->id) ? ' selected' : ''}}> {{ $category->name }} </option>
      @endforeach
    </select>
    @error('category_id')
    <span class="invalid-feedback" role="alert">
        {{ $message}}
    </span>
    @enderror
   </div>

   <div class="container-fluid">
    <label for="answer_1" class="form-label">{{ __('question.answer_1')}}</label>
    <div class="row">
        <div class="col-md-11">
            <input name="answer_1" type="text" class="form-control @error('answer_1') is-invalid @enderror" id="answer_1" placeholder="" value="{{ old('answer_1', $answers->answer_1 ?? '')}}">
        </div>
        <div class="col-1" align-self-center>
            <input type="radio" name="correct" id="correct" value="0">
        </div>
    </div>
    @error('content')
    <span class="invalid-feedback" role="alert">
        {{ $message}}
    </span>
    @enderror
</div>

<div class="container-fluid">
    <label for="answer_2" class="form-label">{{ __('question.answer_2')}}</label>
    <div class="row">
        <div class="col-md-11">
            <input name="answer_2" type="text" class="form-control @error('answer_2') is-invalid @enderror" id="answer_2" placeholder="" value="{{ old('answer_2', $answers->answer_2 ?? '')}}">
        </div>
        <div class="col-1" align-self-center>
            <input type="radio" name="correct" id="correct" value="1">
        </div>
    </div>
    @error('content')
    <span class="invalid-feedback" role="alert">
        {{ $message}}
    </span>
    @enderror
</div>

<div class="container-fluid">
    <label for="answer_3" class="form-label">{{ __('question.answer_3')}}</label>
    <div class="row">
        <div class="col-md-11">
            <input name="answer_3" type="text" class="form-control @error('answer_3') is-invalid @enderror" id="answer_3" placeholder="" value="{{ old('answer_3', $answers->answer_3 ?? '')}}">
        </div>
        <div class="col-1" align-self-center>
            <input type="radio" name="correct" id="correct" value="2">
        </div>
    </div>
    @error('content')
    <span class="invalid-feedback" role="alert">
        {{ $message}}
    </span>
    @enderror
</div>

<div class="container-fluid">
    <label for="answer_4" class="form-label">{{ __('question.answer_4')}}</label>
    <div class="row">
        <div class="col-md-11">
            <input name="answer_4" type="text" class="form-control @error('answer_4') is-invalid @enderror" id="answer_4" placeholder="" value="{{ old('answer_4', $answers->answer_4 ?? '')}}">
        </div>
        <div class="col-1" align-self-center>
            <input type="radio" name="correct" id="correct" value="3">
        </div>
    </div>
    @error('content')
    <span class="invalid-feedback" role="alert">
        {{ $message}}
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
@endsection
