<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $super_admin  = Role::create([
            'name'          => 'super_admin', 
            'display_name'  => 'إدارة النظام',
            'description'   => 'This is role of super admin, has full permissions'
        ]);
        $admin  = Role::create([
            'name'          => 'admin', 
            'display_name'  => 'إدارة المحتوى',
            'description'   => 'This is role of admin, has partially permissions'
        ]);

        $seeker = Role::create([
            'name'          => 'seeker', 
            'display_name'  => 'طالب الخدمة',
            'description'   => 'This is role of seeker, who register to post to get a service'
        ]);

        $provider = Role::create([
            'name'          => 'provider', 
            'display_name'  => 'مقدم الخدمة',
            'description'   => 'This is role of provider, who register to provide and offer a service'
        ]);
    }
}
