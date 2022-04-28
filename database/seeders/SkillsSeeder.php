<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $photoshop = Skill::create([
            'name' => 'فتشوب',
   
            'is_active' => 1,


        ]);
        $tasmim = Skill::create([
            'name' => 'التصميم الابداعي',
          
            'is_active' => 1,

        ]);
        $advire = Skill::create([
            'name' => ' اعلان',
          
            'is_active' => 0,
        ]);

        $microsoft = Skill::create([
            'name' => ' مايكروسوفت وورد',
           
            'is_active' => 1,
        ]);

        $translate = Skill::create([
            'name' => '  الترجمة',
            
            'is_active' => 1,
        ]);
    }
}