<?php

use Illuminate\Database\Seeder;


class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Content::truncate();

        factory(App\Content::class, 3)->create();
    }
}
