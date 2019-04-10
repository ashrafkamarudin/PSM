<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $librarian = factory(App\User::class)->create();
        $librarian->attachRole('librarian');

        $prefect = factory(App\User::class)->create();
        $prefect->attachRole('library_prefect');
    }
}
