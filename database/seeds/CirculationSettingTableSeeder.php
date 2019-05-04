<?php

use Illuminate\Database\Seeder;

class CirculationSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('circulation_settings')->insert([
            'user_type' => 'student',
            'borrow_duration' => '14'
        ]);
    }
}
