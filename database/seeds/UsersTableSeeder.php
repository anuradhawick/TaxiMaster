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
        (new \App\User(['username'=>'admin', 'password'=>\Illuminate\Support\Facades\Hash::make('admin'), 'firstName'=>'Dulaj', 'lastName'=>'Atapattu', 'phone'=>'0712481879', 'userType'=>"ADMIN"]))->save();
        (new \App\User(['username'=>'anuradha', 'password'=>\Illuminate\Support\Facades\Hash::make('anuradha'), 'firstName'=>'Anuradha', 'lastName'=>'Wickramrachchi', 'phone'=>'0712755777', 'userType'=>"DRIVER"]))->save();
        (new \App\User(['username'=>'ravidu', 'password'=>\Illuminate\Support\Facades\Hash::make('ravidu'), 'firstName'=>'Ravidu', 'lastName'=>'Lashan', 'phone'=>'0777123456', 'userType'=>"DRIVER"]))->save();
        (new \App\User(['username'=>'madhawa', 'password'=>\Illuminate\Support\Facades\Hash::make('madhawa'), 'firstName'=>'Madhawa', 'lastName'=>'Vidanapathirana', 'phone'=>'0712431234', 'userType'=>"TAXI_OPERATOR"]))->save();
    }
}
