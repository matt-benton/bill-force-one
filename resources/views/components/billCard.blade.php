<h3><a href="/bills/{{ $bill->id }}/edit">{{ $bill->name }}</a></h3>
<p>{{ $bill->description }}</p>
<p>amount: {{ $bill->amount }}</p>
<p>due date: {{ $bill->due_date }}</p>
@if ($bill->warning) <p><strong>warning: bill is due</strong></p> @endif
<p>paid: {{ $bill->paid }}</p>
<p>autopay: {{ $bill->autopay }}</p>
<form action="/bills/{{ $bill->id }}/toggle" method="POST">
    @csrf
    @method('PUT')
    <input type="submit" value="Toggle Paid Status">
</form>
<form action="/bills/{{ $bill->id }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
</form>