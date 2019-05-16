<?php

use Illuminate\Database\Seeder;
// use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{

    protected $toTruncate = ['users', 'password_resets', 'customers', 'services'];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Model::unguard();

        // foreach($this->toTruncate as $table) {
        //     DB::table($table)->truncate();
        // }

        $this->call([
            UsersTableSeeder::class,
            CustomersTableSeeder::class,
            ServicesTableSeeder::class,
            OffersTableSeeder::class,
            ContractsTableSeeder::class,
        ]);

        // Model::reguard();
    }
}
