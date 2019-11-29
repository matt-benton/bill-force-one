<div class="bills-card">
    <div class="card-header">
        <a href="/bills/{{ $bill->id }}/edit"><h3>{{ $bill->name }}</h3></a>
        <span>${{ $bill->amount }}</span>
    </div>
    <div class="card-body">
        <p>{{ $bill->description }}</p>
        <p>Due on the {{ $bill->dueDateWithSuffix() }}</p>
        <!-- @if ($bill->warning) <p><strong>bill is due</strong></p> @endif -->
    </div>
    <div class="card-footer">
        <form action="/bills/{{ $bill->id }}/toggle" method="POST">
            @csrf
            @method('PUT')
            @if ($bill->paid) 
                <input class="btn" type="submit" value="Pay">
            @else
                <input class="btn" type="submit" value="Paid">
            @endif
        </form>
        
        <!-- <p>autopay: {{ $bill->autopay }}</p> -->
    </div>
</div>