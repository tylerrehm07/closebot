<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $guarded = [];
    protected $fillable = ['address1', 'address2', 'city', 'completed', 'discarded', 'state', 'zip'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_address', 'calculations', 'completion_date'];

    public function events()
    {
      return $this->belongsToMany('App\Event')
        ->withPivot('date', 'time', 'completed')
        ->withTimestamps();
    }

    public function getFullAddressAttribute()
    {
      $full = $this->address1;
      if(!empty($this->address2)){
        $full .= ' ' . $this->address2;
      }
      $full .= ', ' . $this->city . ', ' . $this->state . ' ' . $this->zip;
      return $full;
    }

    public function getCalculationsAttribute()
    {
      $complete = 0;
      $incomplete = 0;
      $percentage = 0.00;

      $events = $this->events()->get();
      $count = $events->count();

      foreach($events as $event){
        if(!empty($event->pivot->completed)){
          $complete++;
        } else {
          $incomplete++;
        }
      }

      if(!empty($count)){
        $percentage = round($complete / $count, 2);
      }

      return ['complete' => $complete, 'incomplete' => $incomplete, 'percentage' => $percentage];
    }

    public function getCompletionDateAttribute()
    {
      $completion_date = null;

      $events = $this->events()->get();
      foreach($events as $event)
      {
        if($event->pivot->date > $completion_date){
          $completion_date = $event->pivot->date;
        }
      }

      $carbon = new Carbon($completion_date);
      return ['carbon' => $carbon, 'year' => $carbon->year, 'day' => $carbon->day, 'month' => $carbon->month];
    }
}
