<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

class LoadComments extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Model\Comment::class, 5)->create();
    }
}
