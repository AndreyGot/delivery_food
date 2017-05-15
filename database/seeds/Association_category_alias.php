<?php

use Illuminate\Database\Seeder;
use App\Model\Helper\CyrToLatConverter;

class Association_category_alias extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        $associations = \App\Model\Association::all();

        foreach ($associations as $association){
            $association->setAlias($association->name);
            $association->save();
        }
    }
}
