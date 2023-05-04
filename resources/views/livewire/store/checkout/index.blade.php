<div>

    <!-- Breadcrumb -->
    <div class="bg-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-sm">
                    <h4 class="mb-0">TimeNet Store</h4>
                </div>
                <!-- End Col -->

                <div class="col-sm-auto">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('home') }}">TimeNet</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('store.index') }}">Store</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                        </ol>
                    </nav>
                    <!-- End Breadcrumb -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Row -->
        </div>
    </div>
    <!-- End Breadcrumb -->

    @if(auth()->check())
        @if(!$success)
            <div class="container content-space-1 content-space-lg-2">
                <div class="row">
                    <div class="col-lg-8 mb-7 mb-lg-0">
                        <h4 class="mb-3">Shipping address</h4>

                        <!-- Form -->
                        <form id="checkout-form">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="checkoutFirstName" class="form-label">First name</label>
                                    <input type="text" class="form-control form-control-lg" id="checkoutFirstName"
                                           placeholder="First Name"
                                           wire:model="checkoutFirstName">
                                    @error('checkoutFirstName')
                                    <small class="text-danger mt-1">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-6">
                                    <label for="checkoutLastName" class="form-label">Last name</label>
                                    <input type="text" class="form-control form-control-lg" id="checkoutLastName"
                                           placeholder="Last Name"
                                           wire:model="checkoutLastName">
                                    @error('checkoutLastName')
                                    <small class="text-danger mt-1">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <!-- End Col -->

                                <div class="col-12">
                                    <label for="checkoutEmail" class="form-label">Email</label>
                                    <input type="email" class="form-control form-control-lg" id="checkoutEmail"
                                           placeholder="you@example.com" wire:model="checkoutEmail">
                                    @error('checkoutEmail')
                                    <small class="text-danger mt-1">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-6">
                                    <label for="checkoutPrimaryPhoneNumber" class="form-label">First Phone
                                        Number</label>
                                    <input type="tel" class="form-control form-control-lg"
                                           id="checkoutPrimaryPhoneNumber"
                                           placeholder="+9647501234567" wire:model="checkoutPrimaryPhoneNumber">
                                    @error('checkoutPrimaryPhoneNumber')
                                    <small class="text-danger mt-1">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <!-- End Col -->

                                <div class="col-sm-6">
                                    <label for="checkoutSecondaryPhoneNumber" class="form-label">Second Phone
                                        Number</label>
                                    <input type="tel" class="form-control form-control-lg"
                                           id="checkoutSecondaryPhoneNumber"
                                           placeholder="+9647507654321" wire:model="checkoutSecondaryPhoneNumber">
                                    @error('checkoutSecondaryPhoneNumber')
                                    <small class="text-danger mt-1">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <!-- End Col -->

                                <div class="col-12">
                                    <label for="checkoutAddress" class="form-label">Address</label>
                                    <input type="text" class="form-control form-control-lg" id="checkoutAddress"
                                           placeholder="Main Area, 44001, Erbil, KRI" wire:model="checkoutAddress">
                                    @error('checkoutAddress')
                                    <small class="text-danger mt-1">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <!-- End Col -->

                                <div class="col-md-5">
                                    <label for="checkoutCountry" class="form-label">Country</label>
                                    <input type="text" class="form-control form-control-lg" id="checkoutCountry" value="{{ $user->country->name }}" readonly>
                                </div>

                                <!-- End Col -->

                            </div>

                            <hr class="my-4">

                            <div class="d-grid gap-2">
                                <!-- Check -->
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="sameAddressShopCheckout" checked
                                           onclick="event.preventDefault();" readonly>
                                    <label class="form-check-label" for="sameAddressShopCheckout">Shipping address is
                                        the
                                        same as my billing address</label>
                                </div>
                                <!-- End Check -->
                            </div>

                            <hr class="my-4">

                            <h4 class="mb-3">Payment</h4>

                            <div>


                                <div wire:loading wire:target="selectPaymentMethod">
                                      <span class="spinner-border spinner-border-sm me-1" role="status"
                                            aria-hidden="true"></span>
                                    <span class="visually-hidden">Loading...</span>
                                    Switching payment method please wait...
                                </div>

                                @foreach($paymentMethods as $payment)



                                    @if($payment->enabled)

                                        <div wire:click="selectPaymentMethod({{ $payment->id }})"
                                             style="cursor:pointer;"
                                             class="rounded p-3 my-2 shadow shadow-sm @if($selectedPaymentMethod->id == $payment->id) border border-2 border-dark @endif">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <img src="{{ $payment->getFirstMediaUrl('icon') }}"
                                                         style="width: 48px; height: auto;"
                                                         alt="Payment Method Icon">
                                                    &nbsp;
                                                    &nbsp;
                                                    <span @class(['fw-bold' => ($selectedPaymentMethod->id == $payment->id)])>{{ $payment->name }}</span>
                                                </div>

                                                <div  class="badge text-body" @class(['fw-bold' => ($selectedPaymentMethod->id == $payment->id), 'text-muted text-start' => true ]) style="width: 150px;">
                                                    Payment Fee:
                                                    @if($payment->fee_type == \App\Models\PaymentMethod::FEE_TYPE_PERCENTAGE)
                                                        {{ $payment->fee }}%
                                                    @else
                                                        ${{ $payment->fee }}
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                    @else
                                        <div style="cursor: not-allowed;"
                                             class="rounded p-3 my-2 shadow shadow-sm">

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img src="{{ $payment->getFirstMediaUrl('icon') }}"
                                                             style="width: 48px; height: auto;"
                                                             alt="Payment Method Icon">
                                                    </div>
                                                    &nbsp;
                                                    &nbsp;
                                                    <div>{{ $payment->name }}</div>
                                                </div>
                                                <div class="badge text-danger" style="width: 150px;">
                                                    Currently disabled
                                                </div>
                                            </div>

                                        </div>
                                    @endif

                                @endforeach
                            </div>

                            <!-- End Row -->
                        </form>
                        <!-- End Form -->
                    </div>
                    <!-- End Col -->

                    <div class="col-lg-4">
                        <div class="ps-lg-4">
                            <!-- Card -->
                            <div class="card card-sm shadow-sm mb-4">
                                <div class="card-body">
                                    <div class="border-bottom pb-4 mb-4">
                                        <h3 class="card-header-title">Order summary</h3>
                                    </div>

                                    <form>

                                        <div class="border-bottom pb-4 mb-4">
                                            <div class="d-grid gap-3">
                                                <dl class="row">
                                                    <dt class="col-sm-6">Item subtotal ({{ $cartItems->count() }})</dt>
                                                    <dd class="col-sm-6 text-sm-end mb-0">
                                                        ${{ number_format($cartTotal, 2) }}</dd>
                                                </dl>
                                                <!-- End Row -->

                                                <dl class="row">
                                                    <dt class="col-sm-6">Shipping Rate</dt>
                                                    @if($shippingRate)
                                                        <dd class="col-sm-6 text-sm-end mb-0">${{ $shippingRate }}</dd>
                                                    @else
                                                        <dd class="col-sm-6 text-sm-end mb-0">Free</dd>
                                                    @endif

                                                </dl>

                                                @if($selectedPaymentMethod)
                                                    <dl class="row">
                                                        <dt class="col-sm-6">Payment Fee</dt>
                                                        @if($selectedPaymentMethod->fee_type == \App\Models\PaymentMethod::FEE_TYPE_PERCENTAGE)
                                                            <dd class="col-sm-6 text-sm-end mb-0">
                                                                {{ $selectedPaymentMethod->fee }}%
                                                                <span>(${{ ($cartTotal * ($this->selectedPaymentMethod->fee/100)) }})</span>
                                                            </dd>
                                                        @elseif($selectedPaymentMethod->fee_type == \App\Models\PaymentMethod::FEE_TYPE_FIXED_AMOUNT)
                                                            <dd class="col-sm-6 text-sm-end mb-0">
                                                                ${{ $selectedPaymentMethod->fee }}
                                                            </dd>
                                                        @endif
                                                    </dl>
                                            @endif

                                            <!-- End Row -->
                                            </div>
                                        </div>

                                        <div class="d-grid gap-3 mb-4">

                                            <dl class="row">
                                                <dt class="col-sm-6">Total</dt>
                                                <dd class="col-sm-6 text-sm-end mb-0">
                                                    ${{ number_format($totalPay, 2) }}</dd>
                                            </dl>
                                            <!-- End Row -->
                                        </div>

                                        <div class="d-grid">

                                            <button wire:click="placeOrder" wire:loading.attr="disabled"
                                                    wire:target="placeOrder" type="button" class="btn btn-dark btn-lg">
                                                <span wire:loading wire:target="placeOrder">
                                                    <span class="spinner-grow spinner-grow-sm me-1" role="status"
                                                          aria-hidden="true"></span>
                                                    <span class="visually-hidden">Loading...</span>
                                                    Placing Order
                                                </span>
                                                <span wire:loading.remove wire:target="placeOrder">
                                                    Place Order
                                                </span>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                                <!-- End Card -->
                            </div>

                            <!-- Media -->
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="svg-icon svg-icon-sm text-primary">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M22.1671 18.1421C22.4827 18.4577 23.0222 18.2331 23.0206 17.7868L23.0039 13.1053V5.52632C23.0039 4.13107 21.8729 3 20.4776 3H8.68815C7.2929 3 6.16183 4.13107 6.16183 5.52632V9H13C14.6568 9 16 10.3431 16 12V15.6316H19.6565L22.1671 18.1421Z"
                                                  fill="#035A4B"></path>
                                            <path opacity="0.3" fill-rule="evenodd" clip-rule="evenodd"
                                                  d="M1.98508 18V13C1.98508 11.8954 2.88051 11 3.98508 11H11.9851C13.0896 11 13.9851 11.8954 13.9851 13V18C13.9851 19.1046 13.0896 20 11.9851 20H4.10081L2.85695 21.1905C2.53895 21.4949 2.01123 21.2695 2.01123 20.8293V18.3243C1.99402 18.2187 1.98508 18.1104 1.98508 18ZM5.99999 14.5C5.99999 14.2239 6.22385 14 6.49999 14H11.5C11.7761 14 12 14.2239 12 14.5C12 14.7761 11.7761 15 11.5 15H6.49999C6.22385 15 5.99999 14.7761 5.99999 14.5ZM9.49999 16C9.22385 16 8.99999 16.2239 8.99999 16.5C8.99999 16.7761 9.22385 17 9.49999 17H11.5C11.7761 17 12 16.7761 12 16.5C12 16.2239 11.7761 16 11.5 16H9.49999Z"
                                                  fill="#035A4B"></path>
                                        </svg>

                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-2">
                                    <span class="small me-1">Need Help?</span>
                                    <a class="link small" href="{{ route('soon') }}">Chat now</a>
                                </div>
                            </div>
                            <!-- End Media -->
                        </div>
                    </div>
                    <!-- End Col -->
                </div>
                <!-- End Row -->
            </div>
        @else
            <div class="container content-space-1 content-space-lg-2">
                <div class="row">
                    <div class="col text-center">

                        <div class="w-50 mx-md-auto">

                            <i class="bi bi-check2-circle display-1 text-dark"></i>

                            <div class="mb-5">
                                <h1 class="h2">Your order is completed!</h1>
                                <p>Thank you for your order! Your order is being processed and will be completed within
                                    3-6 hours. You will receive an email confirmation when your order is completed.</p>
                            </div>
                            <a class="btn btn-dark btn-transition rounded-pill px-6"
                               href="{{ route('store.products.index') }}">Continue
                                shopping</a>


                            <div class="mt-4"></div>

                            <span class="text-muted fw-bold">
                                   Order #{{ $order->number }}
                            </span>

                            <a class="link text-muted d-block" href="{{ route('users.store.orders.invoice', $order->id) }}">
                                <i class="bi-chevron-left small ms-1"></i>
                                View Invoice
                            </a>
                            <a class="link text-muted d-block" href="{{ route('users.store.orders.index') }}">
                                <i class="bi-chevron-left small ms-1"></i>
                                Navigate to my orders
                            </a>
                            <a class="link text-muted d-block" href="{{ route('home') }}">
                                <i class="bi-chevron-left small ms-1"></i>
                                Back to home
                            </a>

                        </div>


                    </div>
                </div>
            </div>
        @endif
    @else

        <div class="container content-space-2">

            <div class="row">
                <div class="col">
                    <div class="alert alert-soft-dark text-center py-5">
                        <div class="d-flex align-items-center justify-content-center h-100 flex-column">
                            <div>
                                <i class="bi-cart fs-3"></i>
                            </div>
                            <div>Please <a href="{{ route('login') }}">login</a> to your account to access checkout
                                screen.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    @endif


</div>
