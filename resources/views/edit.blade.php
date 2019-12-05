@extends('layouts.app')

@section('content')
    <div class="form-container">
        @if (Session::has('message'))
            <div class="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="alert" id="delete-bill-dialog">
            <p>Are you sure you want to delete this bill?</p>
            <div class="alert-buttons">
                <form action="/bills/{{ $bill->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input class="btn" type="submit" value="Delete">
                    <button class="btn" type="button" id="hide-delete-dialog-button">Cancel</button>
                </form>
            </div>
        </div>
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
            <button class="btn" type="button" id="show-delete-dialog-button">Delete</button>
        </form>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('/js/delete-dialog.js') }}"></script>
@endsection