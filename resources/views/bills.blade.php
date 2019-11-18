@extends('layouts.app')

@section('content')
    <div class="bills-list">
        @foreach ($bills as $bill)
            @component('components.billCard', ['bill' => $bill]) @endcomponent
        @endforeach
    </div>
@endsection