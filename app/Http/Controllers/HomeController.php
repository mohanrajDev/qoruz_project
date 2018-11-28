<?php

namespace App\Http\Controllers;

use App\User;
use App\Question;
use App\TestAnswer;
use Carbon\Carbon;
use PDF;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('test.success');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        // Admin Dashboard
        if ($user->type == 'admin') {
           $users = User::where('type', '<>', 'admin')->get();
           return view('admin', ['users' => $users]);
        } 

        // User Test Dashboard
        if (!$user->isTestCreated()) {
           $user =  $user->createTest();
        } 

        return view('home', ['user' => $user]);
    }

    /**
     * Store the test answers.
     *
     * @return \Illuminate\Http\Response
     */
    public function testStore(Request $request)
    {
        $fields = $request->except(['_token']);

        $test = auth()->user()->test;

        foreach ($fields as $field => $value) {
            $questionId = str_after($field, '_');
            $question = Question::find($questionId);  
            
            $answer = new TestAnswer;
            $answer->test_id = $test->id;
            $answer->question_id = $question->id;
            $answer->answer = $value;
            $answer->score = 0;

            if ($question->answer ==  $answer->answer) {
                $answer->score = 1;
            }

            $answer->save();

        }

        $test->ended_at = Carbon::now();
        $test->status = 1;
        $test->save();

        auth()->logout();

        return redirect()->route('home');
    }


    /**
     * Test timer.
     *
     * @return Time
     */
    public function testTimeout()
    {
        $test = auth()->user()->test;
        $time = '00 : 00 : 00';
        $time_out = false;

        if ($test->status == 0) {

            $end_time = Carbon::parse($test->ended_at);
            $interval = $end_time->diffInSeconds(Carbon::now());

            if ($end_time->greaterThan(Carbon::now())) {
                 $time = gmdate('H : i : s', $interval);
            } else {
                $time_out = true;
                $test->status = 2;
                $test->completed_at = Carbon::now();
                $test->save();
            }
            
        } 

        return [
            'time' => $time,
            'timeout' => $time_out
        ];
    }

    /**
     * Result PDF.
     *
     * @return PDF 
     */
    public function testPdf()
    {
      $users = User::where('type', '<>', 'admin')->get();
      PDF::SetCreator('MohanRaj');
      PDF::SetAuthor('MohanRaj');
      PDF::SetTitle('Test Result');
      PDF::SetSubject('Test');

        // remove default header/footer
      PDF::setPrintHeader(false);
      PDF::setPrintFooter(false);

        // set default monospaced font
      PDF::SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
      
        // set auto page breaks
      PDF::SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
      PDF::setImageScale(PDF_IMAGE_SCALE_RATIO);
      PDF::SetDisplayMode('fullpage', 'SinglePage', 'UseNone');

        // set font
      PDF::SetFont('helvetica', 'B', 20);

      PDF::AddPage('P', 'A4');
      PDF::writeHTML(view('pdf', ['users' => $users]), true, false, true, false, '');
      PDF::Output('test_results.pdf', 'i');

    }
}
