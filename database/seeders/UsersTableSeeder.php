<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')
        ]);
        $employee = User::create([
            'name' => 'employee',
            'prenom' => 'employee',
            'email' => 'employee@employee.com',
            'password' => Hash::make('password')
        ]);
        $entreprise = User::create([
            'name' => 'entreprise',
            'email' => 'entreprise@entreprise.com',
            'password' => Hash::make('password')
        ]);

        $adminRole = Role :: where('name','admin')->first();
        $employeeRole = Role::where('name','employee')->first();
        $entrepriseRole = Role::where('name','entreprise')->first();

        $admin->roles()->attach($adminRole);
        $employee->roles()->attach($employeeRole);
        $entreprise->roles()->attach($entrepriseRole);
    }
}
