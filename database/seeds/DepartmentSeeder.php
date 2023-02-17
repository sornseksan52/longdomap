<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
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
				'dep_name' => 'Web Develop',
			],
			[
				'dep_name' => 'Fox Develop',
			],
			[
				'dep_name' => 'Mobile Develop',
			],
		];
		
        DB::table('department')->insert($arr);
    }
}
