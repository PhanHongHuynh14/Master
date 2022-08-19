@extends('layouts.admin.master')
@section('content')

<div class="col-md-9">
  <div class="d-flex justify-content-between">
    <p style="font-weight: bold;">{{ __('question.questionlist')}}</p>
    <div>
      <a href="{{ route('admin.question.create') }}" class="btn btn-primary">{{ __('message.addnew')}}</a>
    </div>
  </div>
  @if(Session()->has('success'))
  <div class="alert alert-success text-center">
    {{ session()->get('session')}}
  </div>
  @endif
  <div class="table-responsive">
    <table class="table">
        <tr>
            <th> ID </th>
            <th> {{ __('question.content')}} </th>
            <th> {{ __('question.category')}} </th>
            <th> {{ __('question.action')}} </th>
        </tr>
        @if(!empty($questions))
        @foreach($questions as $question)
        <tr>
            <td>
                {{ $question->id}}
            </td>
            <td>
                {{ $question->content }}
            </td>
            <td>
                {{ $question->category_id }}
            </td>
            <td>
                <a href="{{ route('admin.question.show', $question->id) }}" class="btn btn-success"> {{ __('message.show')}} </a>
                <a href="{{ route('admin.question.edit', $question->id) }}" class="btn btn-primary"> {{ __('message.edit')}} </a>
                <form class="d-inline" method="post" onclick="return confirm('Do you want to delete?')" action="{{ route('admin.question.destroy', $question->id) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"> {{ __('message.delete')}} </button>
                </form>
            </td>
        </tr>
        @endforeach
        @endif


    </table>

    {{ $questions->links() }}

  </div>
</div>

@endsection


