@extends('layouts.app')

@section('content')
    <!-- NOTE: This will be a delete alert dialog that will be triggered when the delete button is clicked. -->
    <!-- <form action="/bills/{{ $bill->id }}" method="POST">
        @csrf
        @method('DELETE')
        <input class="btn" type="submit" value="Delete">
    </form> -->
    <div class="form-container">
        <form class="form" action="/bills/{{ $bill->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" value="{{ $bill->name }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description">{{ $bill->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" name="amount" value="{{ $bill->amount }}">
            </div>
            <div class="form-group">
                <label for="due_date">Due Date</label>
                <select name="due_date">
                    @for ($i = 1; $i <= 31; $i++) 
                        <option @if ($bill->due_date === $i) selected @endif>{{ $i }}</option> 
                    @endfor
                </select>
            </div>
            <div class="form-check">
                <input type="checkbox" name="autopay" id="autopay" value="1" @if ($bill->autopay == 1) checked @endif>
                <label for="autopay">Autopay</label>
            </div>
            <input class="btn" type="submit" value="Save">
            <button class="btn">Delete</button>
        </form>
    </div>

    <!-- ALERT: make sure this is styled -->
    @if (Session::has('message'))
        <div>{{ Session::get('message') }}</div>
    @endif
@endsection