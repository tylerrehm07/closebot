<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{

    protected $appends = ['calculations'];

    public function properties()
    {
      return $this->belongsToMany('App\Property')
        ->withPivot('id', 'date', 'time', 'completed')
        ->withTimestamps();
    }

    public function getCalculationsAttribute()
    {
      $today = Carbon::now(new \DateTimeZone('America/New_York'));
      $results = [];

      $slug = str_slug($this->name, '_');
      $carbon = new Carbon($this->pivot->date . ' ' . $this->pivot->time);

      $results[$slug] = [
        'dueDate' => $this->pivot->date,
        'daysUntil' => $today->diffInDays($carbon),
        'hoursUntil' => $today->diffInHours($carbon),
        'isCompleted' => !empty($this->pivot->completed) ? true : false,
      ];

      return $results;
    }
}
