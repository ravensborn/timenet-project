<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class TimeNetPaymentMethodSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        PaymentMethod::factory([
            'name' => 'Cash on Delivery',
            'fee' => 10,
            'fee_type' => 'fixed_amount'
        ])->create();

        for ($i = 1; $i <= 5; $i++) {

            $type = ['fixed_amount', 'percentage'][array_rand(['fixed_amount', 'percentage'])];

            PaymentMethod::factory()->create([
                'fee' => rand(1, 10),
                'fee_type' => $type
            ]);
        }


        //Random payment methods.
        PaymentMethod::each(function ($payment) {

            $path = public_path('seeder/payment-methods/cash-on-delivery.png');

            $payment->addMedia($path)
                ->preservingOriginal()
                ->toMediaCollection('icon');
        });
    }
}
