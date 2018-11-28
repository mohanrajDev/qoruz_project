<?php

namespace App;

use App\Question;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class UserTest extends Model
{
    
    /**
     * Get the user for the test.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Get the questions for the test.
     */
    public function questions()
    {
        return $this->belongsToMany(Question::class, 'test_questions', 'test_id');
    }

    /**
     * Get the questions for the test.
     */
    public function answers()
    {
        return $this->hasMany('App\TestAnswer', 'test_id');
    }


    /**
     * Get the score for the test.
     */
    public function getScoreAttribute()
    {
       return $this->answers()->sum('score');
    }


     /**
     * Get the duration for the test.
     */
    public function getDurationAttribute()
    {
        $end_time = Carbon::parse($this->completed_at);
        $start_time = Carbon::parse($this->started_at);
        $interval = $end_time->diffInSeconds($start_time);
        return  $interval . ' Seconds';
    }


}

