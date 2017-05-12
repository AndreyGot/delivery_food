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
//        var_dump(\App\Model\Profile::find(1)->first_name);
//        exit();
        /*factory(\App\Model\Comment::class, 5)->create()->each(function($comment){
            exit(get_class($comment));
            $comment->restaurant()->associate(\App\Model\Restaurant::find(1));
            $comment->profile()->associate(\App\Model\Profile::find(1));
            $comment->save();
        });*/

        factory(\App\Model\Comment::class, 5)->create();

//        DB::table('comment')->insert([
//
//        ]);
    }
}
