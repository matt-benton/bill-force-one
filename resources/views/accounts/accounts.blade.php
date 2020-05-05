@extends('layouts.app')

@section('content')
    <div class="accounts-list">
        @foreach($accounts as $account)
            <a href="/accounts/{{ $account->id }}/bills">
                <div class="account-card">
                    <h3>{{ $account->name }}</h3>
                    <p>{{ $account->description }}</p>
                </div>
            </a>
        @endforeach
    </div>
@endsection