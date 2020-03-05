<?php
use App\Models\User;
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
        User::create([
            'name' => 'Dumon de Magalhães',
            'email' => 'dumon.dmd@hotmail.com',
            'password' => bcrypt('123456'),
        ]);
    }
}
