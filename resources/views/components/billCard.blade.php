<h3>{{ $bill->name }}</h3>
<p>{{ $bill->description }}</p>
<p>{{ $bill->amount }}</p>
<p>{{ $bill->due_date }}</p>
<p>{{ $bill->last_paid_on }}</p>
<p>{{ $bill->autopay }}</p>
<form action="/bills/{{ $bill->id }}" method="POST">
    @csrf
    @method('DELETE')
    <input type="submit" value="Delete">
</form>