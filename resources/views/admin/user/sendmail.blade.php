@extends('layouts.admin.master')
@section('content')
<div class="col-md-9">
    <div>
        <h1>Send email to user</h1>
        <a href="{{ route('admin.user.index') }}" class="btn btn-back">Back</a>
    </div>
    <div class="col-md-12">
        <form class="g-3 needs-validation" method="post" action="{{route('admin.user.send')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12 mb-3">
                    <select class="form-control" name="mail">
                        <option>Select a user</option>
                        @if (!empty($users))
                        @foreach($users as $user)
                        <option value="{{$user['email']}}">{{ $user['name'] }}</option>
                        @endforeach
                        @endif
                    </select>
                    @error('mail')
                    <span class="text-danger text-left">{{$message}}</span>
                    @enderror
                </div>
                <div class="mb-3">
                    <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" multiple>
                  </div>
                <div class="clearfix"></div>
                <div class="bt">
                <button type="submit" class="btn btn-send">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
@endsection

