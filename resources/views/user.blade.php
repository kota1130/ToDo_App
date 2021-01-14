userです。

@foreach($users as $user)
  {{$user->id}}<br>
  {{$user->name}}<br>
  {{$user->email}}<br>
@endforeach