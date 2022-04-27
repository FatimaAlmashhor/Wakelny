<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Skill;
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

            $photoshop = Skill::create([
                'name' => 'فتشوب',
                'level' => 'متقدم',
                'is_active'=> 'مفعل',
                'created_at	'=>'2022-04-26 21:26:07',
                'updated_at'=>'2022-04-26 21:26:08',


            ]);
            $tasmim = Skill::create([
                'name' => 'التصميم الابداعي',
                'level' => 'متقدم',
                'is_active'=> 'مفعل',
                'created_at	'=>'2022-04-26 21:26:07',
                'updated_at'=>'2022-04-26 21:26:08',

            ]);
            $advire = Skill::create([
                'name' => ' اعلان',
                'level' => 'متقدم',
                'is_active'=> 'معطل',
                'created_at	'=>'2022-04-26 21:26:07',
                'updated_at'=>'2022-04-26 21:26:08',


            ]);

            $microsoft = Skill::create([
                'name' => ' مايكروسوفت وورد',
                'level' => 'متوسط',
                'is_active'=> 'مفعل',
                'created_at	'=>'2022-04-26 21:26:07',
                'updated_at'=>'2022-04-26 21:26:04',
            ]);

            $translate = Skill::create([
                'name' => '  الترجمة',
                'level' => 'متوسط',
                'is_active'=> 'مفعل',
                'created_at	'=>'2022-04-26 21:26:07',
                'updated_at'=>'2022-04-26 21:26:04',



            ]);



            $skills->attachRole('admin');
        }
    }


