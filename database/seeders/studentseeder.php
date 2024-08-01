<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\student;
use Illuminate\Support\Facades\File;

class studentseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $students = collect([
        //     [
        //         'name' => 'test 2',
        //         'email' => 'test@,md.com'
        //     ],
        //     [
        //         'name' => 'test 3',
        //         'email' => 'test@gm==ail.com'
        //     ],
        //     [
        //         'name' => 'test 4',
        //         'email' => 'test@mail.com'
        //     ]
        // ]);

        // $students->each(function ($student) {
        //     student::insert($student);
        // });
        // student::create([
        //     'name' => 'test name',
        //     'email' => 'test@gmail.com'
        // ]);
        // $json = File::get(path: 'database\json\students.json');
        // $students = collect(json_decode($json));
        // $students->each(function ($student) {
        //     student::create([
        //         'name' => $student->name,
        //         'email' => $student->email
        //     ]);
        // });

        // for ($i = 0; $i < 10; $i++) {
        //     student::create([
        //         'name' => fake()->name,
        //         'email' => fake()->email
        //     ]);
        // }

    }
}
