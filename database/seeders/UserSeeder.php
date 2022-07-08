<?php

namespace Database\Seeders;

use App\Models\Report;
use App\Models\School;
use App\Models\User;
use Database\Factories\ReportFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        School::factory(30)->create();

        $masterAdmin = User::create([
            'name' => 'Master Admin', 
            'email' => 'master@gmail.com',
            'password' => bcrypt('master'),
            'code' => '0000'
        ]);

        $masterAdmin->assignRole('master_admin');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com', 
            'password' => bcrypt('admin'), 
            'code' => '1111'
        ]);
        
        $admin->assignRole('admin');
        
        User::factory(29)->create();

        Report::factory(1000)->create();
    }
}
