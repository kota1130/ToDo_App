@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">タスク概要</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr><th style="width:30%">タスク名</th><td>{{$task->title}}</td></tr>
                        <tr><th style="width:30%">タスク詳細</th><td>{!!nl2br($task->detail)!!}</td></tr>
                        <tr><th style="width:30%">期日</th><td>{{$task->due_date}}</td></tr>
                    </table>
                    
                    <a class="btn btn-primary" href="{{ route('task.edit', ['id' => $task->id]) }}">編集</a>
                    <form class="" style="display: inline-block; margin-left: 20px;" method="POST" action="{{ route('task.destroy', ['id' => $task->id ])}}" id="delete_{{ $task->id}}">
                        @csrf
                    <a href="#" class="btn btn-danger" data-id="{{ $task->id}}" onclick="deletePost(this);">削除</a>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function deletePost(e){
        'use strict';
        if(confirm('本当に削除していいですか？')){
            document.getElementById('delete_' + e.dataset.id).submit();
        }
    }
</script>
@endsection
