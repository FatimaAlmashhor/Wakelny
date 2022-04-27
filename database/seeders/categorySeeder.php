<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Skill;
use App\Models\category;
use Illuminate\Support\Facades\Hash;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     *
     * @return void
     */
    public function run()

    {
        //

            $web = category::create([
                'title' => 'تطوير الويب',
                'is_active'=> 'مفعل',
                'created_at	'=>'2022-04-26 21:26:09',
                'updated_at'=>'2022-04-26 21:26:04',

            ]);

            $consul = category::create([
                'title' => ' اعمال وخدمات استشارية',
                'is_active'=> 'مفعل',
                'created_at	'=>'2022-04-26 21:26:09',
                'updated_at'=>'2022-04-26 21:26:04',

            ]);
            $sound = category::create([
                'title' => '   تصميم صوتيات وفديوهات',
                'is_active'=> 'مفعل',
                'created_at	'=>'2022-04-26 21:26:09',
                'updated_at'=>'2022-04-26 21:26:04',

            ]);
            $elictronic = category::create([
                'title' => '     تسويق الكتروني ومبيعات',
                'is_active'=> 'مفعل',
                'created_at	'=>'2022-04-26 21:26:09',
                'updated_at'=>'2022-04-26 21:26:04',

            ]);


        }
    }


