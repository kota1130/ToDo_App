@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">タスク編集</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('task.update', ['id' => $task->id ])}}">
                    @csrf
                        <div class="form-group col-md-8">
                            <label for="title">タスク名</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $task->title}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="detail">タスク詳細</label>
                            <textarea type="text" class="form-control" id="detail" name="detail" rows="4">{{ $task->detail}}</textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="due_date">期日</label>
                            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date}}">
                        </div>
                        <div class="form-group col-md-2">
                            <input class="btn btn-info form-control" type="submit" value="更新">
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
