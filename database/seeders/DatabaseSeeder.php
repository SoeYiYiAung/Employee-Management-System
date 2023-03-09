<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('branches')->insert([ [ 'branch_name' => 'Yangon' ],['branch_name'=>'Mandalay'],['branch_name'=>'Bago'], ['branch_name'=>'Sagaing']]);

        DB::table('users')->insert([
        [

            'name' => 'Admin',

            'email' => 'admin@gmail.com',

            'branch_id'=> null,

            'password' => bcrypt('123456'),

            'role' => 'Admin',

        ],
        [

            'name' => 'Manager',

            'email' => 'manager@gmail.com',

            'branch_id'=> null,

            'password' => bcrypt('123456'),

            'role' => 'Manager',

        ],
        [

            'name' => 'Branch Manager Ygn',

            'email' => 'branchmanager_ygn@gmail.com',

            'branch_id'=> 1,

            'password' => bcrypt('123456'),

            'role' => 'Branch Manager',

        ],
        [

            'name' => 'Branch Manager Mdy',

            'email' => 'branchmanager_mdy@gmail.com',

            'branch_id'=> 2,

            'password' => bcrypt('123456'),

            'role' => 'Branch Manager',

        ],
        
        ]);
    }
}