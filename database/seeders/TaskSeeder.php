<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use DateTime;
class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('tasks')->insert([
            "title" => "Review code",
            "Content" => "Test all code for bugs and fix what you find",
            "date" => new DateTime('2023-04-10'),
        ]);

        DB::table('tasks')->insert([
            "title" => "Create Component",
            "Content" => "Programming a component for application navigation",
            "date" => new DateTime('2023-04-15'),
        ]);


    }
}
