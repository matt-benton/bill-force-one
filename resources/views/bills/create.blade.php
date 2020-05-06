@extends('layouts.app')

@section('content')
    <div class="form-container">
        <form class="form" action="/accounts/{{ $accountId }}/bills" method="POST">
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
            <div class="form-group">
                <label for="due_month">Due Month (if bill is yearly)</label>
                <select name="due_month">
                    <option value="0">All (bill is paid monthly)</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                </select>
            </div>
            <div class="form-check">
                <input type="checkbox" name="autopay" id="autopay" value="1">
                <label for="autopay">Autopay</label>
            </div>
            <button class="btn btn-primary" type="submit">Create Bill</button>
        </form>
    </div>
@endsection