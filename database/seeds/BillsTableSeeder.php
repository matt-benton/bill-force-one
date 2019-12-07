<?php

use App\Bill;
use Illuminate\Database\Seeder;

class BillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bill::create([
            'name' => 'Car payment',
            'description' => 'My monthly car payment.',
            'amount' => 345.41,
            'due_date' => 4,
            'autopay' => 0,
        ]);

        Bill::create([
            'name' => 'Rent',
            'amount' => 925.25,
            'due_date' => 1,
            'autopay' => 0,
        ]);

        Bill::create([
            'name' => 'Netflix',
            'description' => 'Family Netflix subscription',
            'amount' => 12.99,
            'due_date' => 16,
            'autopay' => 1,
        ]);

        Bill::create([
            'name' => 'Health insurance',
            'description' => 'BCBA health insurance payment.',
            'amount' => 559.88,
            'autopay' => 1,
            'due_date' => 20,
        ]);

        Bill::create([
            'name' => 'Car insurance',
            'description' => 'Geico car insurance payment.',
            'amount' => 124.08,
            'autopay' => 1,
            'due_date' => 10,
        ]);

        Bill::create([
            'name' => 'Student loan',
            'description' => 'Consolidated student loan payment',
            'amount' => 275.00,
            'autopay' => 0,
            'due_date' => 5,
        ]);

        Bill::create([
            'name' => 'Gym membership',
            'amount' => 29.99,
            'autopay' => 0,
            'due_date' => 28,
        ]);

        Bill::create([
            'name' => 'Credit card',
            'amount' => 54.99,
            'autopay' => 1,
            'due_date' => 1,
        ]);
    }
}
