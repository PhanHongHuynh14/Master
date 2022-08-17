@extends('layouts.admin.master')
@section('content')
@if (Session::has('error'))
<div class="alert alert-danger" role="alert">
  {{ session('error') }}
</div>
@endif
@if (Session::has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="col-md-9">
    <div>
        <h1>{{ __('message.categorylist')}}</h1>
        <a href="{{route('admin.category.create') }}" class="btn btn-new">{{ __('message.addnew')}}</a>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">{{ __('message.name')}}</th>
            <th scope="col">{{ __('message.slug')}}</th>
            <th scope="col">{{ __('message.action')}}</th>
          </tr>
        </thead>
        @if(!empty($categories))
        @foreach($categories as $category)
        <tr>
            <td>
                {{ $category->name}}
            </td>
            <td>
                {{ $category->slug}}
            </td>
              <td>
                <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-success"> {{ __('message.show')}} </a>
                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-primary"> {{ __('message.edit')}} </a>
                <form class="d-inline" method="post" onclick="return confirm('Do you want to delete?')" action="{{ route('admin.category.destroy', $category->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> {{ __('message.delete')}} </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif
      </table>
</div>

{{ $categories->links() }}

@endsection
