<?php
use App\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if(config('database.default') !== 'sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=0');
        }

        // $this->call(UsersTableSeeder::class);
        App\User::truncate();
        $this->call(UsersTableSeeder::class);
        App\Model\Product::truncate();
        $this->call(productsTableSeeder::class);

        App\Model\Review::truncate();
        $this->call(reviewsTableSeeder::class);

        if(config('database.default') !== 'sqlite'){
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }
    }
}
