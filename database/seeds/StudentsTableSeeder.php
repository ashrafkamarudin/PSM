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

        DB::table('students')->insert([
            'name' => 'Siti Nur Aisyah Binti Sulaiman',
            'ic' => '950805115268',
            'form' => '1'
        ]);

        DB::table('students')->insert([
            'name' => 'Muhammmad Amir Bin Rahman',
            'ic' => '960905115263',
            'form' => '3'
        ]);

        DB::table('students')->insert([
            'name' => 'Firdaus Fikri Bin Kamarul',
            'ic' => '950875115265',
            'form' => '4'
        ]);

        DB::table('students')->insert([
            'name' => 'Nur Zulaikha Binti Rosli',
            'ic' => '931875113152',
            'form' => '5'
        ]);

        DB::table('students')->insert([
            'name' => 'Muhammmad Mifzal Bin Kamarulzaman',
            'ic' => rand(10000000000, 99999999999),
            'form' => '1'
        ]);

        DB::table('students')->insert([
            'name' => 'Naim Bin Mohsin',
            'ic' => rand(10000000000, 99999999999),
            'form' => '2'
        ]);

        DB::table('students')->insert([
            'name' => 'Maryam Nabilah Binti Osman',
            'ic' => rand(10000000000, 99999999999),
            'form' => '3'
        ]);

        DB::table('students')->insert([
            'name' => 'Rabiatul Adawiyah Binti Abdullah',
            'ic' => rand(10000000000, 99999999999),
            'form' => '4'
        ]);

        DB::table('students')->insert([
            'name' => 'Siti Aminah Binti Jaafar',
            'ic' => rand(10000000000, 99999999999),
            'form' => '5'
        ]);

        DB::table('students')->insert([
            'name' => 'Amirul Ashraf Bin Rosman',
            'ic' => rand(10000000000, 99999999999),
            'form' => '1'
        ]);

        DB::table('students')->insert([
            'name' => 'Ahmad Ashraf Bin Kamarulzaman',
            'ic' => rand(10000000000, 99999999999),
            'form' => '2'
        ]);

        //actory(App\Student::class, 100)->create();
        /*
        DB::table('students')->insert([
            'name' => 'Muhammmad Ashraf Bin Kamarudin',
            'ic' => '950905115267',
            'form' => '2'
        ]);*/
    }
}
