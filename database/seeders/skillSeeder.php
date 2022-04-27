<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Skill;
use App\Models\category;
use Illuminate\Support\Facades\Hash;

class skillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            $skills = Skill::create([
                'name' => 'فتشوب',
                'level' => 'متقدم',
                'is_active'=> 'مفعل'

            ]);


    }
}

