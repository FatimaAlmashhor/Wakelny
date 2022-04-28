<?php

namespace Database\Seeders;

use App\Models\category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $web = category::create([
            'title' => 'تطوير الويب',
            'is_active' => 1,


        ]);

        $consul = category::create([
            'title' => ' اعمال وخدمات استشارية',
            'is_active' => 1,

        ]);
        $sound = category::create([
            'title' => '   تصميم صوتيات وفديوهات',
            'is_active' => 1,

        ]);
        $elictronic = category::create([
            'title' => '     تسويق الكتروني ومبيعات',
            'is_active' => 1,
        ]);
    }
}