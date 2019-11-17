@extends('layouts.app')

@section('content')
    <form>
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="description">Description</label>
        <textarea name="description"></textarea>
        <label for="amount">Amount</label>
        <input type="numeric" name="amount">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date">
        <label for="autopay">Autopay</label>
        <input type="checkbox" name="autopay" id="autopay">
        <input type="submit" value="Create Bill">
    </form>
@endsection