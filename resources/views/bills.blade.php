@extends('layouts.app')

@section('content')
    <div class="row">
        @component('components.mainInfoPanel', 
            [
            'date' => $formattedDate,
                'sumOfAllBills' => $sumOfAllBills,
                'sumOfUnpaidBills' => $sumOfUnpaidBills,
            ]
        )
        @endcomponent
    </div>
    <div class="row">
        <div class="bills-list-menu">
            <form action="/bills" method="GET" class="bills-order-form">
                <label for="bills-order-select">Order By</label>
                <select class="bills-order-select" id="bills-order-select" name="order">
                    <option value="name" @if ($order === 'name') selected @endif>Name</option>
                    <option value="amount" @if ($order === 'amount') selected @endif>Amount</option>
                    <option value="due_date" @if ($order === 'due_date') selected @endif>Due Date</option>
                    <option value="paid" @if ($order === 'paid') selected @endif>Paid Status</option>
                </select>
            </form>
            <form action="{{ route('bills.reset') }}" method="GET">
                <button class="btn btn-secondary" type="submit">Reset All</button>
            </form>
        </div>
        <div class="bills-list">
            @foreach ($bills as $bill)
                @component('components.billCard', ['bill' => $bill]) @endcomponent
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ url('/js/order-by-select.js') }}"></script>
@endsection