<?php

use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('students')->insert([
            'name' => 'Muhammmad Ashraf Bin Kamarudin',
            'ic' => '950905115267',
            'form' => '2'
        ]);

        factory(App\Student::class, 100)->create();
        /*
        DB::table('students')->insert([
            'name' => 'Muhammmad Ashraf Bin Kamarudin',
            'ic' => '950905115267',
            'form' => '2'
        ]);*/
    }
}
