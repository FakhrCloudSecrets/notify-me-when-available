@extends('notify-me-when-available::layout')

@section('content')
<div class="container">
    <h1 class="text-center fw-bold my-4">Products</h1>
    
    <div class="row">
        @foreach($products as $product)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <h2 class="card-title">{{ $product->name }}</h2>
                    <p class="text-muted fs-5">Price: ${{ $product->price }}</p>
                    <p class="text-muted fs-6">Qty: {{ $product->quantity }}</p>

                    @if($product->quantity > 0)
                    <button class="btn btn-success w-100">Add to Cart</button>
                    @else
                    <button class="btn btn-dark w-100 notify-btn" data-product-id="{{ $product->id }}">Notify Me</button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection
@push('scripts')
<script>
$(document).ready(function() {
    $(".notify-btn").click(function() {
        var productId = $(this).data("product-id");
        var user_id = "{{ auth()->id() }}";

        $.ajax({
            url: "{{ route('notify.create') }}",
            type: "POST",
            data: {
                product_id: productId,
                user_id: user_id,
                _token: "{{ csrf_token() }}"
            },
            success: function(response) {
                alert("We will notify you");
            },
            error: function(xhr, error) {
              console.log(xhr.responseText);
            }
        });
    });
});
</script>
@endpush