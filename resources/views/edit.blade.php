@extends('layouts.app')

@section('content')
    <form action="/bills/{{ $bill->id }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ $bill->name }}">
        <label for="description">Description</label>
        <textarea name="description">{{ $bill->description }}</textarea>
        <label for="amount">Amount</label>
        <input type="numeric" name="amount" value="{{ $bill->amount }}">
        <label for="due_date">Due Date</label>
        <select name="due_date">
            @for ($i = 1; $i <= 31; $i++) 
                <option @if ($bill->due_date === $i) selected @endif>{{ $i }}</option> 
            @endfor
        </select>
        <label for="autopay">Autopay</label>
        <input type="checkbox" name="autopay" id="autopay" value="1" @if ($bill->autopay == 1) checked @endif>
        <input type="submit" value="Save">
    </form>

    @if (Session::has('message'))
        <div>{{ Session::get('message') }}</div>
    @endif
@endsection