<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Customer;
class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    	$city = new Customer();
    	$city->first_name = 'thao';
    	$city->last_name = 'trinh minh';
    	$city->save();
    }
}
