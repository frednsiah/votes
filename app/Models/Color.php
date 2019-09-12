<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model {
    
    public function votes () {
        return $this->hasMany('App\Models\Vote');
    }

    public function totalVotes() {
        return $this->votes()->selectRaw('color_id, sum(votes) as totalVotes')->groupBy('color_id')->latest();
    }
}
