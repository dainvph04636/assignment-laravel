<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->count() == 0) {
    		DB::table('users')->insert([
    			[
    				'id' => 1,
    				'first_name' => 'Đại',
    				'last_name' => 'Nguyễn',
    				'email' => 'dainvph04636@fpt.edu.vn',
    				'password' => '$2y$12$c0q8HkwZVK.cdEu85EJSSui/xxnP.QT2ZtO44QI6Q6P9UTQvXjzBe',
    				'address' => 'Hà Nội',
    				'birthday' => '1995-12-09',
    				'is_active' => 1,
    			],
    		]);
    	}
    }
}
