@extends('layouts.app')

@section('content')
    <form action="/bills" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="description">Description</label>
        <textarea name="description"></textarea>
        <label for="amount">Amount</label>
        <input type="numeric" name="amount">
        <label for="due_date">Due Date</label>
        <select name="due_date">
            @for ($i = 1; $i <= 31; $i++) <option>{{ $i }}</option> @endfor
        </select>
        <label for="autopay">Autopay</label>
        <input type="checkbox" name="autopay" id="autopay" value="1">
        <input type="submit" value="Create Bill">
    </form>
@endsection