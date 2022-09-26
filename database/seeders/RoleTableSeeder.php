<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'super_admin',
            'admin'
        ];

        foreach ($roles as $role) {
            Role::factory()->create([
                'name' => $role,
                'display_name' => Str::ucfirst($role)
            ]);
        }
    }
}
