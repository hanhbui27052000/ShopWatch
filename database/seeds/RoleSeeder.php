<?php

use Illuminate\Database\Seeder;

use App\Roles;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$admin = Roles::create([
    		'id'=>1,
    		'name_role' => 'Admin',
    		'slug' => 'admin',
    		'permissions' => json_encode([
    			'act-product'=> true,
    			'act-brand'=> true,
    			'act-staff'=> true,
    			'act-sell'=> true,
    			'act-order'=> true,
    			'act-bill_sell'=> true,
    			'act-warehouse'=> true,
    			'act-supplier'=> true,
    			'act-votes_collect'=> true,
    			'act-votes_pay'=> true,
    			'act-funds'=> true,
    			'act-report'=> true
    		])
    	]);
    
    	$cashier = Roles::create([
    		'id'=>2,
    		'name_role' => 'Cashier',
    		'slug' => 'cashier',
    		'permissions' => json_encode([
				'act-product'=> true,
    			'act-brand'=> true,
    			'act-sell'=> true,
    			'act-order'=> true,
    			'act-bill_sell'=> true,
    			'act-warehouse'=> true,
    			'act-supplier'=> true,
    			'act-votes_collect'=> true,
    			'act-votes_pay'=> true,
    			'act-funds'=> true,
    			'act-report'=> true
    		])
    	]);

    	$sell = Roles::create([
    		'id'=>3,
    		'name_role' => 'Sell',
    		'slug' => 'sell'
    	]);

    }
}