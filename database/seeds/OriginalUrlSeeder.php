<?php

use Illuminate\Database\Seeder;

class OriginalUrlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\OriginalUrl::class, 30)->create();
    }
}
