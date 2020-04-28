<?php

use App\Models\Resume\ResumeEducation;
use Illuminate\Database\Seeder;

class ResumeEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ResumeEducation::class, 3)->create();
    }
}
