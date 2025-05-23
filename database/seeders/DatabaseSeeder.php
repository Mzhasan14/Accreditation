<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Criteria;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\AccreditationSection;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Buat tiga user admin
        $admin1 = User::create([
            'name' => 'Admin 1',
            'email' => 'admin1@example.com',
            'password' => Hash::make('123'),
            'role' => 'admin'
        ]);

        $admin2 = User::create([
            'name' => 'Admin 2',
            'email' => 'admin2@example.com',
            'password' => Hash::make('123'),
            'role' => 'admin'
        ]);

        $admin3 = User::create([
            'name' => 'Admin 3',
            'email' => 'admin3@example.com',
            'password' => Hash::make('123'),
            'role' => 'admin'
        ]);

        // Tambahkan validator
        User::create([
            'name' => 'Validator 1',
            'email' => 'v1@example.com',
            'password' => Hash::make('123'),
            'role' => 'validator1'
        ]);

        User::create([
            'name' => 'Validator 2',
            'email' => 'v2@example.com',
            'password' => Hash::make('123'),
            'role' => 'validator2'
        ]);

        // Kriteria dan section
        $sections = ['Penetapan', 'Pelaksanaan', 'Evaluasi', 'Pengendalian', 'Peningkatan'];

        foreach (range(1, 3) as $i) {
            $criteria = Criteria::create([
                'name' => 'Kriteria ' . $i
            ]);

            foreach ($sections as $sectionName) {
                AccreditationSection::create([
                    'criteria_id' => $criteria->id,
                    'name' => $sectionName
                ]);
            }

            // Hubungkan admin ke kriteria sesuai urutan
            $adminVar = ${"admin$i"}; // ambil variabel $admin1, $admin2, dll secara dinamis
            $adminVar->criteria()->attach([$criteria->id]);
        }
    }
}
