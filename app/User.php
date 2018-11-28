<?php

namespace App;

use App\UserTest;
use App\Question;
use Carbon\Carbon;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    
    /**
     * Create user's test with questions.
     *
     * @return void
     */    
    public function createTest()
    {
        $test = new UserTest;
        $test->user_id = $this->id;
        $test->started_at = Carbon::now();
        $test->ended_at = Carbon::now()->addSeconds(60);
        $test->save();
        $questions = Question::get()->random(5);
        $test->questions()->saveMany($questions);

        return $this;
    }

    /**
     * Get the user that owns the test.
     */  
    public function test()
    {
        return $this->hasOne('App\UserTest');
    }


     /**
     * Get the user test status.
     */  
    public function isTestCreated()
    {
        return $this->test ? true : false;
    }
}
