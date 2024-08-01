<?php

namespace Database\Seeders;

use App\Models\student;
use App\Models\User;
use App\Models\test;
use Database\Factories\testfactoryFactory;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User as AuthUser;

use function Illuminate\Types\Model\test;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        test::factory(5)->create();
        user::factory(5)->create();
        student::factory(5)->create();

        // student::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }

    // public function run(): void
    // {

    //     $this->call([
    //         studentseeder::class
    //         // add other file with ','
    //     ]);
    // }
}
