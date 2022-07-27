<?php

namespace Database\Seeders;

use App\Models\User;
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
        User::insert([
            [
                'name'      => 'Sulastri',
                'email'     => 'sulastri@gmail.com',
                'password'  => bcrypt('123')
            ],
            [
                'name'      => 'Andi',
                'email'     => 'andi@gmail.com',
                'password'  => bcrypt('123')
            ],
        ]);
    }
}
