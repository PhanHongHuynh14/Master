@extends('layouts.admin.master')
@section('content')
<div class="col-md-9 mb-3">
  <div class="row">
  @if ($errors->any())
  <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
        <div>
            <h1>{{ __('message.userlist')}}</h1>
            <a href="{{ route('admin.user.create')}}" class="btn btn-new">{{ __('message.addnew')}}</a>
            <a href="{{ route('admin.user.sendmail')}}" class="btn btn-sendmail">{{ __('message.sendmail')}}</a>
        </div>
    </div>
<table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">{{ __('message.avatar')}}</th>
        <th scope="col">{{ __('message.name')}}</th>
        <th scope="col">Email</th>
        <th scope="col">{{ __('message.action')}}</th>
      </tr>
    </thead>
    <tbody>
      @if (!empty($users))
          @foreach ($users as $user)
              <tr>
                <td><img width="30px" src="https://i.imgur.com/s6l2a1U.png"></td>
                <td>{{$user['name']}}</td>
                <td>{{$user['email']}}</td>
                <td><button type="button" class="btn btn-primary">Edit</button> <button type="button" class="btn btn-danger">Delete</button></td>
              </tr>
          @endforeach
      @endif
    </tbody>
  </table>
  <div class="col-md-12 text-center">
    <ul class="pagination">
      <li class="page-item disabled">
        <a class="page-link"><</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">1</a></li>
      <li class="page-item active" aria-current="page">
        <a class="page-link" href="#">2</a>
      </li>
      <li class="page-item"><a class="page-link" href="#">3</a></li>
      <li class="page-item">
        <a class="page-link" href="#">></a>
      </li>
    </ul>
  </div>
</div>
@endsection
