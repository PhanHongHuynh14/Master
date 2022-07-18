@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>Send email to user</h1>
        <a href="" class="btn btn-back">Back</a>
    </div>
    <form class="row" style="margin-top: 50px" action="{{ route('admin.mails.store')}}">
        @csrf
        <div class="col-md-12 mb-3">
        {{-- <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Select a user"  aria-describedby="emailHelp"> --}}
        <select class="form-select" id="inputGroupSelect02" name="category">
            <option selected>Select a user</option>
            <option value="1">email 1 </option>
            <option value="2">email 2</option>
            <option value="3">email 3</option>
          </select>
        @error('name')
        <span class="text-danger text-left">{{$message}}</span>
        @enderror
        </div>
        <div class="clearfix"></div>
        <div class="bt">
        <button type="submit" class="btn btn-send">Send</button>
        </div>
    </form>
</div>
</div>
@endsection

