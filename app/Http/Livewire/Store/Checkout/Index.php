<?php

namespace App\Http\Livewire\Store\Checkout;

use App\Models\CartItem;
use App\Models\EnabledCountry;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\PaymentMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Lwwcas\LaravelCountries\Models\Country;


class Index extends Component
{

    use LivewireAlert;

    public Collection $cartItems;
    public float $cartTotal = 0;
    public float $totalPay = 0;
    public $user = null;

    public float $deliveryFee = 0;

    public string $checkoutFirstName = '';
    public string $checkoutLastName = '';
    public string $checkoutEmail = '';
    public string $checkoutPrimaryPhoneNumber = '';
    public string $checkoutSecondaryPhoneNumber = '';
    public string $checkoutAddress = '';
    public int $checkoutCountry = 105;

    public Collection $paymentMethods;
    public Collection $enabledCountries;

    public PaymentMethod $selectedPaymentMethod;

    public bool $success = false;
    public Order $order;

    public function placeOrder()
    {

        if ($this->isCartEmpty()) {
            $this->alert('error', 'An error while creating order, please contact support.');
            return false;
        }

        sleep(3);
        if ($this->user) {

            $validated = $this->validate([
                'checkoutFirstName' => 'required|min:2|max:15',
                'checkoutLastName' => 'required|min:2|max:15',
                'checkoutEmail' => 'required|email',
                'checkoutPrimaryPhoneNumber' => 'required',
                'checkoutSecondaryPhoneNumber' => 'nullable',
                'checkoutAddress' => 'required|max:1000',
                'checkoutCountry' => 'required|exists:enabled_countries,lc_country_id',
            ]);

            $country = Country::find($validated['checkoutCountry']);

            $shipping_address = [
                'first_name' => $validated['checkoutFirstName'],
                'last_name' => $validated['checkoutLastName'],
                'email' => $validated['checkoutEmail'],
                'primary_phone_number' => $validated['checkoutPrimaryPhoneNumber'],
                'secondary_phone_number' => $validated['checkoutSecondaryPhoneNumber'],
                'address' => $validated['checkoutAddress'],
                'country' => $country->iso_alpha_3,
            ];

            $number = $this->generateNumber();

            $order = new Order();
            $order = $order->create([
                'number' => $number,
                'name' => $number,
                'status' => Order::STATUS_PENDING,
                'user_id' => $this->user->id,
                'payment_method_id' => $this->selectedPaymentMethod->id,
                'shipping_address' => $shipping_address,
                'billing_address' => $shipping_address,
                'total' => $this->totalPay,
            ]);

            foreach ($this->cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                ]);
            }

            $this->clearCartItems();
            $this->order = $order;
            $this->success = true;

            $this->emit('refresh-header-cart');
            $this->emit('scroll-to-top');

        }
    }

    public function calculateTotal()
    {

        $this->getCartItems();

        $cart = $this->cartTotal;
        $deliveryFee = $this->deliveryFee;
        $paymentFee = 0;

        if ($this->selectedPaymentMethod->fee_type == PaymentMethod::FEE_TYPE_PERCENTAGE) {

            $paymentFee = $cart * ($this->selectedPaymentMethod->fee / 100);

        } elseif ($this->selectedPaymentMethod->fee_type == PaymentMethod::FEE_TYPE_FIXED_AMOUNT) {

            $paymentFee = $this->selectedPaymentMethod->fee;
        }

        $this->totalPay = ($cart + $deliveryFee + $paymentFee);

    }

    public function selectPaymentMethod($value)
    {

        sleep(1);

        $paymentMethod = PaymentMethod::find($value);

        $this->selectedPaymentMethod = $paymentMethod;
    }

    public function loadPaymentMethods()
    {


        $country = EnabledCountry::where('lc_country_id', $this->checkoutCountry)->first();

        if ($country) {

            $this->paymentMethods = $country->paymentMethods;

        } else {
            $this->paymentMethods = collect();
        }

    }

    public function calculateDeliveryFee()
    {


        $country = EnabledCountry::where('lc_country_id', $this->checkoutCountry)->first();

        if ($country) {

            $this->deliveryFee = $country->delivery_fee;

        }
    }

    public function updatedCheckoutCountry()
    {

        $this->calculateDeliveryFee();
        $this->loadPaymentMethods();
    }

    public function mount()
    {

        if (auth()->check()) {
            $this->user = auth()->user();
        } else {
            return redirect()->to('/');
        }


        $firstPaymentMethod = PaymentMethod::first();

        if ($firstPaymentMethod) {
            $this->selectedPaymentMethod = $firstPaymentMethod;
        }

        $this->enabledCountries = EnabledCountry::all();

        $this->calculateDeliveryFee();
        $this->loadPaymentMethods();
        $this->getCartItems();

        if ($this->cartItems->count() <= 0) {
            return redirect()->route('store.cartItems.index');
        }

    }

    public function clearCartItems()
    {

        CartItem::where('user_id', $this->user->id)->delete();

        $this->cartItems = collect();
        $this->cartTotal = 0;

    }

    public function isCartEmpty(): bool
    {
        return CartItem::where('user_id', $this->user->id)->count() == 0;
    }

    public function getCartItems()
    {
        $this->cartItems = CartItem::where('user_id', $this->user->id)->get();


        $cartTotal = $this->cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        $this->cartTotal = $cartTotal;
    }

    public function render()
    {

        $this->calculateTotal();

        return view('livewire.store.checkout.index')->extends('layouts.store')->section('content');
    }

    private function getLatestOrder(): Model|Builder|null
    {
        return Order::orderBy('created_at', 'DESC')->first();
    }

    private function getLatestOrderId(): int
    {
        return $this->getLatestOrder() ? $this->getLatestOrder()->id : 0;
    }

    public function generateNumber(): string
    {

        $prefix = strtoupper(substr(config('env.APP_NAME'), 0, 1)) . '_';
        $last = $this->getLatestOrderId();
        $next = 1 + $last;

        return sprintf(
            '%s%s',
            $prefix,
            str_pad((string)$next, 6, "0", STR_PAD_LEFT)
        );
    }

}
