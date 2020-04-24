<?php

use App\Models\Resume\ResumeExperience;
use Illuminate\Database\Seeder;

class ResumeExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ResumeExperience::class, 20)->create();
    }
}
