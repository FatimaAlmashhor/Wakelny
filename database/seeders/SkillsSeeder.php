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
            'level' => 'متقدم',
            'is_active' => 1,


        ]);
        $tasmim = Skill::create([
            'name' => 'التصميم الابداعي',
            'level' => 'متقدم',
            'is_active' => 1,

        ]);
        $advire = Skill::create([
            'name' => ' اعلان',
            'level' => 'متقدم',
            'is_active' => 0,
        ]);

        $microsoft = Skill::create([
            'name' => ' مايكروسوفت وورد',
            'level' => 'متوسط',
            'is_active' => 1,
        ]);

        $translate = Skill::create([
            'name' => '  الترجمة',
            'level' => 'متوسط',
            'is_active' => 1,
        ]);
    }
}