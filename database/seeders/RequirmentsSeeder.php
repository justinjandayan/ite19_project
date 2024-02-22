<?php


namespace Database\Seeders;

use App\Models\Requirments;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RequirmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            "Syllabus",
            "Accomplishment Report",
            "Table of Specifications",
            "Test Questionnaire",
            "Grade",
            "Class Observations",
            "Class Record",
        ];

        foreach ($data as $requirment) {
            DB::table('requirments')->insert([
                'name' => $requirment,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
