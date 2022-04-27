<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Skill;
use App\Models\category;
use Illuminate\Support\Facades\Hash;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

            $categories = category::create([
                'title' => 'تطوير الويب',
                'is_active'=> 'مفعل',


            ]);

            $categories->attachRole('admin');
        }
    }


