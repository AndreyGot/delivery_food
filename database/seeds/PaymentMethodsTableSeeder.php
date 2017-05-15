<?php

use Illuminate\Database\Seeder;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('payment_method')->insert([
            ['name' => 'Оплата наличными', 'alias' => 'cash'],
            ['name' => 'VISA/MASTERCARD', 'alias' => 'online'],
            ['name' => 'Еда за баллы', 'alias' => 'bonus'],
            ['name' => 'Оплата картой курьеру', 'alias' => 'card']
        ]);
    }
}
