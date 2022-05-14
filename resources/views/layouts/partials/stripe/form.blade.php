<form action="{{ route('subscription.process_subscription') }}" method="POST">
    @csrf
    <input type="text" name="coupon" class="form-control" placeholder="{{ __("Tienes un cupon?") }}">
    <input type="hidden" name="type" value="{{ $product['type'] }}">
    <hr>
    <stripe-form
        stripe_key="{{ env('STRIPE_KEY') }}"
        name="{{ $product['name'] }}"
        amount="{{ $product['amount'] }}"
        description="{{ $product['description'] }}"
    ></stripe-form>
</form>
