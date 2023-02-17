<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$arr = [
			[
				'user_name' => 'Person 1',
				'user_email' => Str::random(10).'@'.Str::random(5).'.com',
				'created_at' => date('Y-m-d H:i:s'),
				'fk_dep_id' => 1
			],
			[
				'user_name' => 'Person 2',
				'user_email' => Str::random(10).'@'.Str::random(5).'.com',
				'created_at' => date('Y-m-d H:i:s'),
				'fk_dep_id' => 1
			],
			[
				'user_name' => 'Person 3',
				'user_email' => Str::random(10).'@'.Str::random(5).'.com',
				'created_at' => date('Y-m-d H:i:s'),
				'fk_dep_id' => 2
			],
			[
				'user_name' => 'Person 4',
				'user_email' => Str::random(10).'@'.Str::random(5).'.com',
				'created_at' => date('Y-m-d H:i:s'),
				'fk_dep_id' => 3
			],
		];
		
        DB::table('users')->insert($arr);
    }
}
