<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Department;
use App\Models\Network;
use App\Models\Port;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // =========================
        // الأقسام
        // =========================
        $departments = [
            'قسم الحاسب',
            'قسم الكيمياء',
            'قسم الفيزياء',
            'قسم الإدارة',
            'قسم النبات',
            'قسم الحيوان',
            'قسم الحشرات',
            'قسم الجيولوجيا',
            'قسم الرياضيات',
            'MIS',
            'قسم الشؤون',
        ];

        $departmentModels = [];

        foreach ($departments as $departmentName) {
            $departmentModels[$departmentName] = Department::firstOrCreate([
                'name' => $departmentName,
            ]);
        }

        $cs = $departmentModels['قسم الحاسب'];
        $chem = $departmentModels['قسم الكيمياء'];
        $mis = $departmentModels['MIS'];

        // =========================
        // المستخدمين
        // =========================
        User::firstOrCreate(
            ['email' => 'gamal.mossoua@fsc.bu.edu.eg'],
            [
                'name' => 'Admin',
                'password' => Hash::make('12345678'),
                'role' => 'admin',
                'department_id' => $cs->id,
            ]
        );

        User::firstOrCreate(
            ['email' => 'network@test.com'],
            [
                'name' => 'Network Team',
                'password' => Hash::make('12345678'),
                'role' => 'network',
                'department_id' => $cs->id,
            ]
        );

        User::firstOrCreate(
            ['email' => 'chem@test.com'],
            [
                'name' => 'Chemistry User',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'department_id' => $chem->id,
            ]
        );

        User::firstOrCreate(
            ['email' => 'mis@test.com'],
            [
                'name' => 'MIS User',
                'password' => Hash::make('12345678'),
                'role' => 'user',
                'department_id' => $mis->id,
            ]
        );

        // =========================
        // Networks + Ports (تست)
        // =========================

        // Chemistry
        $chemNet1 = Network::firstOrCreate([
            'name' => 'Chem Network 1',
            'department_id' => $chem->id,
        ]);

        $chemNet2 = Network::firstOrCreate([
            'name' => 'Chem Network 2',
            'department_id' => $chem->id,
        ]);

        Port::firstOrCreate(['name' => 'Port 1', 'network_id' => $chemNet1->id]);
        Port::firstOrCreate(['name' => 'Port 2', 'network_id' => $chemNet1->id]);
        Port::firstOrCreate(['name' => 'Port 3', 'network_id' => $chemNet2->id]);
        Port::firstOrCreate(['name' => 'Port 4', 'network_id' => $chemNet2->id]);

        // MIS
        $misNet1 = Network::firstOrCreate([
            'name' => 'MIS Network 1',
            'department_id' => $mis->id,
        ]);

        $misNet2 = Network::firstOrCreate([
            'name' => 'MIS Network 2',
            'department_id' => $mis->id,
        ]);

        Port::firstOrCreate(['name' => 'Port 1', 'network_id' => $misNet1->id]);
        Port::firstOrCreate(['name' => 'Port 2', 'network_id' => $misNet1->id]);
        Port::firstOrCreate(['name' => 'Port 3', 'network_id' => $misNet2->id]);
        Port::firstOrCreate(['name' => 'Port 4', 'network_id' => $misNet2->id]);
    }
}