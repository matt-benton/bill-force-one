<div class="bills-card">
    <div class="card-header">
        <a href="/bills/{{ $bill->id }}/edit"><h3>{{ $bill->name }}</h3></a>
        <span>${{ $bill->amount }}</span>
    </div>
    <div class="card-body">
        <p class="text-highlight">Due on the {{ $bill->dueDateWithSuffix() }}
            @if ($bill->warning) 
                <?xml version="1.0" encoding="UTF-8"?>
                <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                <svg class="warning-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                    <path d="M12,2L1,21H23M12,6L19.53,19H4.47M11,10V14H13V10M11,16V18H13V16" />
                </svg>
            @endif
        </p>
        <p>{{ $bill->description }}</p>
    </div>
    <div class="card-footer">
        <form action="/bills/{{ $bill->id }}/toggle" method="POST">
            @csrf
            @method('PUT')
            @if ($bill->paid) 
                <input class="btn" type="submit" value="Pay">
            @else
                <button class="btn" type="submit">
                    Paid
                    <?xml version="1.0" encoding="UTF-8"?>
                    <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 1.1//EN" "http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd">
                    <svg class="paid-icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" viewBox="0 0 24 24">
                        <path d="M12 2C6.5 2 2 6.5 2 12S6.5 22 12 22 22 17.5 22 12 17.5 2 12 2M12 20C7.59 20 4 16.41 4 12S7.59 4 12 4 20 7.59 20 12 16.41 20 12 20M16.59 7.58L10 14.17L7.41 11.59L6 13L10 17L18 9L16.59 7.58Z" />
                    </svg>
                </button>
            @endif
        </form>
        
        @if ($bill->autopay) <p class="text-highlight">autopay on</p> @endif
    </div>
</div>