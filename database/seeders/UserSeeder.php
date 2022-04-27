<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $Dhoha = User::create([
            'name' => 'ضحى الخراساني',
            'email' => 'raihanahit2016@gmail.com',
            'password' => Hash::make('Dhoha@22?!'),
            'remember_token' => Str::random(60),
        ]);
        $Dhoha->attachRole('provider');

        $Fatima = User::create([
            'name' => 'فاطمة المشهور',
            'email' => 'fatima.almashhor@gmail.com',
            'password' => Hash::make('Fatima@22?!'),
            'remember_token' => Str::random(60),
        ]);
        $Fatima->attachRole('provider');

        $Afnan = User::create([
            'name' => 'أفنان القدسي',
            'email' => 'afnanalkadasi22@gmail.com',
            'password' => Hash::make('Afnan@22?!'),
            'remember_token' => Str::random(60),
        ]);
        $Afnan->attachRole('provider');

        $Roqaiah = User::create([
            'name' => 'رقية سيف',
            'email' => 'ruqaiah.saif@gmail.com',
            'password' => Hash::make('Roqaiah@22?!'),
            'remember_token' => Str::random(60),
        ]);
        $Roqaiah->attachRole('provider');
        
        $Mohammed = User::create([
            'name' => 'محمد الدعيس',
            'email' => 'mohammedaldoais1996@gmail.com',
            'password' => Hash::make('Mohammed@22?!'),
            'remember_token' => Str::random(60),
        ]);
        $Mohammed->attachRole('provider');

        $Haifa = User::create([
            'name' => 'هيفاء نبيل',
            'email' => 'haifa@gmail.com',
            'password' => Hash::make('Haifa@22?!'),
            'remember_token' => Str::random(60),
        ]);
        $Haifa->attachRole('provider');
        
        $Mokhtar = User::create([
            'name' => 'مختار غالب',
            'email' => 'mokhtar@gmail.com',
            'password' => Hash::make('Mokhtar@22?!'),
            'remember_token' => Str::random(60),
        ]);
        $Mokhtar->attachRole('provider');
        
        $Haitham = User::create([
            'name' => 'هيثم أمين',
            'email' => 'haitham@gmail.com',
            'password' => Hash::make('Haitham@22?!'),
            'remember_token' => Str::random(60),
        ]);
        $Haitham->attachRole('provider');
    }
}
