<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model {

    public function color () {
        return $this->belongsTo('App\Models\Color');
    }
}
