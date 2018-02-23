<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public $timestamps = false;
    protected $fillable = array('start', 'end');
    public function user()
    {
        return $this->belongsTo(User::Class);
    }
}
