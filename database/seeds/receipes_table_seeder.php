<?php

use Illuminate\Database\Seeder;

class receipes_table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('receipes')->insert([
            'name' => 'Reman',
            'ingredients' =>'salt,noodles,meat',
            'category' => 'japaness food',
        ]);
    }
}
