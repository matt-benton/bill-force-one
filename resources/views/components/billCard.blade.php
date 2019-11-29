<div class="bills-card">
    <div class="card-header">
        <a href="/bills/{{ $bill->id }}/edit"><h3>{{ $bill->name }}</h3></a>
        <span>${{ $bill->amount }}</span>
    </div>
    <div class="card-body">
        <p>{{ $bill->description }}</p>
        <p>Due on the {{ $bill->dueDateWithSuffix() }}
            @if ($bill->warning) 
                <?xml version="1.0" encoding="UTF-8"?>
                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                <svg class="warning-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                    <path d="M12,2L1,21H23M12,6L19.53,19H4.47M11,10V14H13V10M11,16V18H13V16" />
                </svg>
            @endif
        </p>
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