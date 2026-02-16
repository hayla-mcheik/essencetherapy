<ul>
    @forelse($cart as $item)
        <li style="padding: 10px; margin: 5px; border: 1px solid green;">
            Product ID: {{ $item['id'] }}<br>
            Name: {{ $item['product']['name'] ?? 'N/A' }}<br>
            Quantity: {{ $item['quantity'] }}<br>
            Price: {{ $item['product']['selling_price'] ?? 0 }}
        </li>
    @empty
        <li style="padding: 20px; background: red; color: white;">CART IS EMPTY</li>
    @endforelse
</ul>