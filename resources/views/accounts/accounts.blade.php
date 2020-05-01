@extends('layouts.app')

@section('content')

    @foreach($accounts as $account)
        <div>
            <a href="/accounts/{{ $account->id }}/bills"><h3>{{ $account->name }}</h3></a>
            <p>{{ $account->description }}</p>
        </div>
    @endforeach

@endsection