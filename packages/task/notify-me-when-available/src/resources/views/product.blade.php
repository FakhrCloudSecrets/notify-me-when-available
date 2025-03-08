<!DOCTYPE html>
<html>

<head>
  <style>
    .card {
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
      max-width: 300px;
      margin: 15px;
      text-align: center;
      font-family: arial;
      width: -webkit-fill-available;
    }

    .price {
      color: grey;
      font-size: 22px;
    }

    .card button {
      border: none;
      outline: 0;
      padding: 12px;
      color: white;
      background-color: green;
      text-align: center;
      cursor: pointer;
      width: 100%;
      font-size: 18px;
    }

    .card button:hover {
      opacity: 0.7;
    }
  </style>
</head>

<body>

  <h1 style="text-align:center; font-weight:700">Products</h1>
  <div style="display:flex">
    @foreach($products as $product)
      <div class="card">
        <h2>{{ $product->name }}</h2>
        <p class="price">${{ $product->price }}</p>
        <p class="price">Qty {{ $product->quantity }}</p>
        @if($product->quantity > 0)
          <p><button>Add to Cart</button></p>
        @else
          <p><button style="background-color: black;">NotifyMe</button></p>
        @endif
      </div>
    @endforeach
  </div>

</body>

</html>