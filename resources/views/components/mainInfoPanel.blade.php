<div class="main-info-panel">
    <div class="main-info-item">
        <h3 class="main-info-item-header">Account</h3>
        <h1>{{ $account->name }}</h1>
    </div>
    <div class="main-info-item">
        <h3 class="main-info-item-header">Today's Date</h3>
        <h1>{{ $date }}</h1>
    </div>
    <div class="main-info-item">
        <h3 class="main-info-item-header">Total</h3>
        <h1>${{ $sumOfAllBills }}</h1>
    </div>
    <div class="main-info-item">
        <h3 class="main-info-item-header">Amount Still Due</h3>
        <h1>${{ $sumOfUnpaidBills }}</h1>
    </div>
</div>