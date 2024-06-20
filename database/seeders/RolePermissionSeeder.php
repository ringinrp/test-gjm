<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $permissions = [
            'manage poliklinik',
            'manage schedule',

            'apply doctor'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        $doctorRole = Role::firstOrCreate([
            'name'=>'doctor'
        ]);
        $doctorPermissions = [
            'manage schedule',
        ];
        $doctorRole->syncPermissions($doctorPermissions);
        
        $patientRole = Role::firstOrCreate([
            'name'=>'patient'
        ]);
        $patientPermissions = [
            'apply doctor',
        ];
        $patientRole->syncPermissions($patientPermissions);

        $superAdminRole = Role::firstOrCreate(['name'=>'super_admin']);

        $user = User::create([
            'name'=>'Super Admin',
            'email'=>'admin@gmail.com',
            'nohp' => '082298225067',
            'password'=>bcrypt('admin123')
        ]);
        $user->assignRole($superAdminRole);
    
    }
}
