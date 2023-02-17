<?php

use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
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
				'job_no' => 'AIT00001',
				'job_title' => 'แก้ไขหน้าเว็บ',
				'fk_user_id' => 1
			],
			[
				'job_no' => 'AIT00002',
				'job_title' => 'แก้ไขหน้าหน้าจัดการ',
				'fk_user_id' => 1
			],
			[
				'job_no' => 'AIT00003',
				'job_title' => 'เพิ่มขนส่ง',
				'fk_user_id' => 2
			],
			[
				'job_no' => 'AIT00004',
				'job_title' => 'ปรับราคา',
				'fk_user_id' => 3
			],
		];
		
        DB::table('job')->insert($arr);
    }
}
