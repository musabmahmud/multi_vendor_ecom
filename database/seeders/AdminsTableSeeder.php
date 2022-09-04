<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id' => 1, 'name' => 'Super Admin', 'email' => 'admin@admin.com', 'password' => '$2a$12$tNpaCbnpQiczVdT8ci/3nudiwvvlDL27Q7YkyYoxTuPuB4M8PMsSO', 'type' => 'superadmin', 'vendor_id' => 0, 'image' => '', 'mobile' => '01309633888', 'status' => 1]
        ];
        Admin::insert($adminRecords);
    }
}
