<?php

use App\Models\Storagelocation;
use Illuminate\Database\Seeder;

class StoragelocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Storagelocation::class, 10)->create();
    }
}
