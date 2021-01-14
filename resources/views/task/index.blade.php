@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">タスク一覧</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="GET" action="{{ route('task.create')}}">
                      <button type="submit" class="btn btn-primary">タスク新規作成</button>
                    </form>
                    <table class="table table-hover">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">タスク名</th>
                          <th scope="col">詳細</th>
                          <th scope="col">期日</th>
                          <th scopo="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($tasks as $task)
                        <tr>
                          <td>{{ $task->title}}</td>
                          <td><a href="{{ route('task.show', ['id' => $task->id ])}}">詳細</a></td>
                          <td>{{ $task->due_date}}</td>
                          <td>
                            <form method="POST" action="{{ route('task.destroy', ['id' => $task->id ])}}" id="delete_{{ $task->id}}">
                              @csrf
                              <a href="#" class="btn btn-danger" data-id="{{ $task->id}}" onclick="deletePost(this);">削除</a>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                      {{ $tasks->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    function deletePost(e){
        'use strict';
        if(confirm('本当に削除していいですか？')){
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>
