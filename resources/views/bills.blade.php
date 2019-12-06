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
                <select class="bills-order-select" name="order">
                    <option selected disabled value="">Sort By</option>
                    <option value="name">Name</option>
                    <option value="amount">Amount</option>
                    <option value="due_date">Due Date</option>
                    <option value="paid">Paid Status</option>
                </select>
            </form>
            <form action="{{ route('bills.reset') }}" method="GET">
                <input type="submit" class="btn" value="Reset All">
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