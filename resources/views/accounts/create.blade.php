@extends('layouts.app')

@section('content')
    <div class="form-container">
        <form class="form" action="/accounts" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" rows="3"></textarea>
            </div>
            <button class="btn btn-primary" type="submit">Create Account</button>
        </form>
    </div>
@endsection