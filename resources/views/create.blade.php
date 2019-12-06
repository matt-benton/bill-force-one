@extends('layouts.app')

@section('content')
    <div class="form-container">
        <form class="form" action="/bills" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="amount">Amount</label>
                <input type="text" name="amount">
            </div>
            <div class="form-group">
                <label for="due_date">Due Date</label>
                <select name="due_date">
                    @for ($i = 1; $i <= 31; $i++) <option>{{ $i }}</option> @endfor
                </select>
            </div>
            <div class="form-check">
                <input type="checkbox" name="autopay" id="autopay" value="1">
                <label for="autopay">Autopay</label>
            </div>
            <input type="submit" value="Create Bill" class="btn btn-primary">
        </form>
    </div>
@endsection