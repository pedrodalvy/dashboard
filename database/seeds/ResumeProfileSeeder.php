<?php

use App\Models\Resume\ResumeProfile;
use Illuminate\Database\Seeder;

class ResumeProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ResumeProfile::class, 1)->create();
    }
}
