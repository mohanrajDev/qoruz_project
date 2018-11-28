<?php

use App\Question;
use Illuminate\Database\Seeder;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Question 1
        $question1 = new Question;
        $question1->name = 'WWW stands for';
        $question1->option1 = 'World Worm Web';
        $question1->option2 = 'World Wide Web';
        $question1->option3 = 'World Word Web';
        $question1->option4 = 'None of the above';
        $question1->answer = 'option2';
        $question1->save();

        // Question 2
        $question2 = new Question;
        $question2->name = '1 + 1 = ?';
        $question2->option1 = '2';
        $question2->option2 = '1';
        $question2->option3 = '-2';
        $question2->option4 = '0';
        $question2->answer = 'option1';
        $question2->save();

        // Question 3
        $question1 = new Question;
        $question1->name = "The term _______ refers to the computer's physical components, such as the monitor, keyboard, memory chips, and hard drive.";
        $question1->option1 = 'Software';
        $question1->option2 = 'Hardware';
        $question1->option3 = 'Firmware';
        $question1->option4 = 'Output';
        $question1->answer = 'option2';
        $question1->save();

        // Question 4
        $question1 = new Question;
        $question1->name = '3 - 1 = ?';
        $question1->option1 = '2';
        $question1->option2 = '1';
        $question1->option3 = '-2';
        $question1->option4 = '-1';
        $question1->answer = 'option1';
        $question1->save();

        // Question 5
        $question1 = new Question;
        $question1->name = "The ______________ is an output device which produces output on paper.";
        $question1->option1 = 'Monitor';
        $question1->option2 = 'Keyboard';
        $question1->option3 = 'Printer';
        $question1->option4 = 'Mouse';
        $question1->answer = 'option3';
        $question1->save();

        // Question 6
        $question1 = new Question;
        $question1->name = "_________________ is a program used to create documents such as letters, essays, and resumes.";
        $question1->option1 = 'Microsoft Word';
        $question1->option2 = 'Microsoft Power Point';
        $question1->option3 = 'Microsoft Access';
        $question1->option4 = 'Visuval Basic';
        $question1->answer = 'option1';
        $question1->save();

        // Question 7
        $question1 = new Question;
        $question1->name = '2 * 2 = ?';
        $question1->option1 = '2';
        $question1->option2 = '4';
        $question1->option3 = '0';
        $question1->option4 = 'None of the above';
        $question1->answer = 'option2';
        $question1->save();

        // Question 8
        $question1 = new Question;
        $question1->name = "Which of the following software is used to view web pages?";
        $question1->option1 = 'Internet Browser';
        $question1->option2 = 'Web Browser';
        $question1->option3 = 'Page Viewer';
        $question1->option4 = 'All of the above';
        $question1->answer = 'option2';
        $question1->save();

        // Question 9
        $question1 = new Question;
        $question1->name = 'ISP stands for';
        $question1->option1 = 'International Service Provider';
        $question1->option2 = 'Internet Service Presenter';
        $question1->option3 = 'Internet Service Provider';
        $question1->option4 = 'All of the above';
        $question1->answer = 'option3';
        $question1->save();

        // Question 10
        $question1 = new Question;
        $question1->name = '10 / 2 = ?';
        $question1->option1 = '7';
        $question1->option2 = '5';
        $question1->option3 = '2';
        $question1->option4 = '0';
        $question1->answer = 'option2';
        $question1->save();
    }
}
