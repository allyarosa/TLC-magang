<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Carbon\Carbon;
class PaymentSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = \Faker\Factory::create();

        foreach (range(1, 20) as $i) {
            DB::table('payments')->insert([
                'user_id' => rand(1, 10), // pastikan user_id ini ada di tabel users
                'order_id' => 'ORDER-' . Str::upper(Str::random(8)),
                'level_id' => '1', // 
                'amount' => rand(100000, 500000),
                'status' => $faker->randomElement(['pending', 'success', 'failed']),
                'snap_token' => Str::random(40),
                'transaction_id' => Str::uuid(),
                'payment_type' => $faker->randomElement(['credit_card', 'bank_transfer', 'ewallet', 'gopay', 'shopeepay']),
                'payment_time' => Carbon::now()->subDays(rand(0, 30)),
                'payment_details' => json_encode([
                    'bank' => $faker->randomElement(['bca', 'bni', 'bri']),
                    'va_number' => $faker->numerify('##############'),
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
