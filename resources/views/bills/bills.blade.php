@extends('layouts.app')

@section('content')
    <div class="row">
        @component('components.mainInfoPanel', 
            [
                'date' => $formattedDate,
                'sumOfAllBills' => $sumOfAllBills,
                'sumOfUnpaidBills' => $sumOfUnpaidBills,
                'account' => $account
            ]
        )
        @endcomponent
    </div>
    <div class="row">
        <div class="bills-list-menu">
            <form action="/accounts/{{ $account->id }}/bills" method="GET" class="bills-order-form">
                <select class="bills-filter-select" id="bills-filter-select" name="filter">
                    <option value="month" @if ($filter === 'month') selected @endif>Due This Month</option>
                    <option value="all" @if ($filter === 'all') selected @endif>All Bills</option>
                    <option value="yearly" @if ($filter === 'yearly') selected @endif>All Yearly Bills</option>
                </select>
                <label for="bills-order-select">Order By</label>
                <select class="bills-order-select" id="bills-order-select" name="order">
                    <option value="name" @if ($order === 'name') selected @endif>Name</option>
                    <option value="amount" @if ($order === 'amount') selected @endif>Amount</option>
                    <option value="due_date" @if ($order === 'due_date') selected @endif>Due Date</option>
                    <option value="paid" @if ($order === 'paid') selected @endif>Paid Status</option>
                </select>
            </form>
            <div class="bills-list-menu-right">
                <a href="/accounts/{{ $account->id }}/bills/create">
                    <button class="btn btn-secondary">New Bill</button>
                </a>
                <form action="/accounts/{{ $account->id }}/bills/reset" method="GET">
                    <button class="btn btn-secondary" type="submit">Reset Monthly Bills</button>
                </form>
            </div>
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