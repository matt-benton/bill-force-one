@extends('layouts.app')

@section('content')
    @component('components.mainInfoPanel', 
        [
            'date' => $formattedDate,
            'sumOfAllBills' => $sumOfAllBills,
            'sumOfUnpaidBills' => $sumOfUnpaidBills,
        ]
    )
    @endcomponent
    <div class="bills-list">
        @foreach ($bills as $bill)
            @component('components.billCard', ['bill' => $bill]) @endcomponent
        @endforeach
    </div>
@endsection