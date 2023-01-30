<section class="container-fluid" id="checkout">
    <div class="row">

        <div class="col-md-12 checkout-wrapper">
            @if (session('error'))
                <small>
                    {{ session('error') }}
                </small>
            @endif
            <div class="checkout-container">
                <img src="{{ asset($course->thumbnail()) }}" alt="{{ $course->title }}">
                <div class="checkout_card shadow">
                    <h1>{{ $course->title }}</h1>
                    <div class="d-flex mb-3"
                        style="justify-content: flex-end;flex-direction: column;align-items: flex-end">
                        <h2>₹{{ $course->price() }}</h2>
                        <h2>+ ₹{{ $gst_price_only / 100 }}</h2>
                        <h2><span class="text-secondary">(+18%
                                GST)</span>&nbsp;&nbsp;₹{{ $gst_price / 100 }}
                        </h2>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-check">
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#">Terms and Conditions</a>.
                                </label>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('razorpay.store', $course->slug) }}" method="POST"
                        class="{{ $terms ? '' : 'checkbox' }}">
                        @csrf
                        <script src="https://checkout.razorpay.com/v1/checkout.js" data-key="{{ env('RAZORPAY_KEY') }}"
                                                data-amount="{{ $gst_price }}" data-currency="INR" data-buttontext="Checkout"
                                                data-name="Magical Umbrella PVT. LTD" data-description="One Stop To Learn"
                                                data-image="{{ asset('images/logo.png') }}" data-prefill.name="{{ auth()->user()->name }}"
                                                data-prefill.contact="{{ auth()->user()->phone_number }}"
                                                data-prefill.email="{{ auth()->user()->email }}" data-theme.color="#0A11DB">
                        </script>
                    </form>
                    @if ($terms)
                        <button type="button" wire:click="termsClicked">Reject</button>
                    @else
                        <button type="button" wire:click="termsClicked">Agree</button>
                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
