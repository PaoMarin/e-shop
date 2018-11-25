<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(array(
            'email' => 'pao@admin.com',
            'name'=> 'Paola',
            'lastname'=> 'Marin',
            'phonenumber'=> '86278151',
            'address'=> 'La Union',
            'admin'=> 'true',
            'password' => Hash::make('12345') // Hash::make() nos va generar una cadena con nuestra contraseña encriptada
        ));
    }
}
