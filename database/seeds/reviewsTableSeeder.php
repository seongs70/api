<?php

use Illuminate\Database\Seeder;

class reviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Model\Review::class, 30)->create();
    }
}
