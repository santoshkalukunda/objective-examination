<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'subject_id' => 1,
                'title' => 'Which of the following branch of Physics deal with study of Atomic Nuclei?',
                'a' => 'Nuclear Physics',
                'b' => 'Bio Physics',
                'c' => 'Atomic Physics',
                'd' => 'None of the above',
                'ans' => 'A',
                'expire_date' => '2023-08-01',
            ],
            [
                'subject_id' => 1,
                'title' => 'The force acting on a body for a short time are called as:',
                'a' => 'Average force',
                'b' => 'Momentum',
                'c' => 'Impulse',
                'd' => 'Tension',
                'ans' => 'C',
                'expire_date' => '2023-08-01',
            ],
            [
                'subject_id' => 1,
                'title' => 'The thrust on the rocket is:',
                'a' => 'in the same direction of the rocket',
                'b' => 'in the opposite direction of the rocket',
                'c' => 'at 90° to the direction of the rocket',
                'd' => 'None of the above',
                'ans' => 'B',
                'expire_date' => '2023-08-01',
            ],
            [
                'subject_id' => 1,
                'title' => 'What is the average power consumption of a heartbeat in an adult?',
                'a' => '1.2 watt',
                'b' => '112.5 watt',
                'c' => '200 watt',
                'd' => '500 watt',
                'ans' => 'A',
                'expire_date' => '2023-08-01',
            ],
            [
                'subject_id' => 1,
                'title' => 'What is the effect on velocities of the two bodies of equal masses when they undergo elastic collision in one dimension?',
                'a' => 'remains same',
                'b' => 'gets interchanged',
                'c' => 'becomes twice of the original velocity',
                'd' => 'becomes half of the original velocity',
                'ans' => 'B',
                'expire_date' => '2023-08-01',
            ],
            [
                'subject_id' => 2,
                'title' => 'Trimethylxanthine is a chemical name of a stimulant which is found in tea and coffee. What is the popular name?',
                'a' => 'Thein ',
                'b' => 'Caffeine',
                'c' => 'Theobromine',
                'd' => 'Theophylline',
                'ans' => 'B',
                'expire_date' => '2023-08-01',
            ],
            [
                'subject_id' => 2,
                'title' => 'Calcium Magnesium Silicate is commonly called as ________?',
                'a' => 'Asbestos',
                'b' => 'Borax',
                'c' => 'Baking Soda',
                'd' => 'Washing Soda',
                'ans' => 'A',
                'expire_date' => '2023-08-01',
            ],
            [
                'subject_id' => 2,
                'title' => 'Which of the following is incorrect about the Inter atomic and Intermolecular Forces?',
                'a' => 'Both the forces are electrical in origin',
                'b' => 'Both the forces are active over short distances',
                'c' => 'General shape of force-distance graph is similar for both the forces',
                'd' => 'None of the above',
                'ans' => 'D',
                'expire_date' => '2023-08-01',
            ],
            [
                'subject_id' => 2,
                'title' => 'What is the body called which does not have any tendency to recover its original configuration, on the removal of deforming force?',
                'a' => 'Perfectly plastic',
                'b' => 'Perfectly elastic',
                'c' => 'Perfectly ductile',
                'd' => 'None of the above',
                'ans' => 'A',
                'expire_date' => '2023-08-01',
            ],
            [
                'subject_id' => 2,
                'title' => 'What is the ratio of change in configuration to the original configuration called as?',
                'a' => 'Strain',
                'b' => 'Stress',
                'c' => 'Elasticity',
                'd' => 'Rebound',
                'ans' => 'A',
                'expire_date' => '2023-08-01',
            ],
        ];
        foreach ($questions as $question) {
            Question::create($question);
        }
    }
}
