@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">タスク新規作成</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('task.store')}}">
                    @csrf
                        <div class="form-group col-md-8">
                            <label for="title">タスク名</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="タスク名を入力してください">
                        </div>
                        <div class="form-group col-md-12">
                            <label for="detail">タスク詳細</label>
                            <textarea type="text" class="form-control" name="detail" rows="4" id="detail" placeholder="タスクの詳細を入力してください"></textarea>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="due_date">期日</label>
                            <input type="date" class="form-control"　name="due_date" id="due_date">
                        </div>
                        <div class="form-group col-md-2">
                        <input class="btn btn-info form-control" type="submit" value="新規作成">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
