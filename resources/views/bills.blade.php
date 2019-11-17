<h1>List of Bills</h1>

@foreach ($bills as $bill)
    @component('components.billCard', ['bill' => $bill]) @endcomponent
@endforeach