<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['id'=>1, 'name'=>'administrator', 'display_name'=>'Administrator', 'description'=>'Administrator Group']);
        Role::create(['id'=>2, 'name'=>'advertiser', 'display_name'=>'Advertiser', 'description'=>'Advertiser Group']);
        Role::create(['id'=>3, 'name'=>'editor', 'display_name'=>'Editor', 'description'=>'Editor Group']);
        Role::create(['id'=>4, 'name'=>'subscriber', 'display_name'=>'Subscriber', 'description'=>'Subscriber Group']);
    }
}
