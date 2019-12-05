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
        <div class="bills-order-container">
            <form action="/bills" method="GET">
                <select class="bills-order-select" name="order">
                    <option selected disabled value="">Select Order</option>
                    <option value="name">Name</option>
                    <option value="amount">Amount</option>
                    <option value="due_date">Due Date</option>
                    <option value="paid">Paid Status</option>
                </select>
                <input type="submit" value="doot"s>
            </form>
        </div>
        <div class="bills-list">
            @foreach ($bills as $bill)
                @component('components.billCard', ['bill' => $bill]) @endcomponent
            @endforeach
        </div>
    </div>
@endsection