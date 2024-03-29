<?php

namespace Database\Seeders;

use App\Models\Cat;
use App\Models\Exam;
use App\Models\Questions;
use App\Models\Skill;
use Database\Factories\SkillFactory;
use Illuminate\Database\Seeder;

class Catseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Cat::factory()->has(
            Skill::factory()->has(
                Exam::factory()->has(
                    Questions::factory()->count(15)
                )->count(2)
            )->count(8)
        )->count(5)->create();
    }
}
