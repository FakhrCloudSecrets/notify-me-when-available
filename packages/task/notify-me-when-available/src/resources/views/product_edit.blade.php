@extends('notify-me-when-available::layout')

@section('content')
<div class="container">
    <h1 class="text-center fw-bold my-4">Update Product</h1>

    <form id="updateForm" action="{{ route('product.update') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="productSelect" class="form-label">Select Product</label>
            <select id="productSelect" class="form-select">
                <option selected disabled>Select a product</option>
                @foreach($products as $product)
                <option value="{{ $product->id }}" 
                        data-price="{{ $product->price }}" 
                        data-quantity="{{ $product->quantity }}">
                    {{ $product->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Change Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Add Quantity On</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <input type="hidden" name="product_id" id="product_id">

        <button type="submit" class="btn btn-primary w-100">Update Product</button>
    </form>
</div>


@endsection
@push('scripts')
<script>
    $(document).ready(function() {
        $('#productSelect').on('change', function() {
            let selectedProduct = $(this).find(':selected');
            let price = selectedProduct.data('price');
            let quantity = selectedProduct.data('quantity');
            let productId = selectedProduct.val();

            $('#price').val(price);
            $('#quantity').val(quantity);
            $('#product_id').val(productId);
        });
    });
</script>
@endpush