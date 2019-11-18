<div class="bills-card">
    <div class="card-header">
        <h3>{{ $bill->name }}</h3>
        <span>${{ $bill->amount }}</span>
    </div>
    <div class="card-body">
        <p>{{ $bill->description }}</p>
        <p>Due on the {{ $bill->due_date }}</p>
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
        <!-- <a href="/bills/{{ $bill->id }}/edit">
            <button type="button" class="btn">Edit</button>
        </a> -->
        <!-- <p>autopay: {{ $bill->autopay }}</p> -->
    </div>
</div>