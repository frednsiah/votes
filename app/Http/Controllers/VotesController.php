<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Vote;

class VotesController extends Controller {

    public function index () {
        $colors =  Color::get();
        return view('votes', [
            'colors' => $colors,
        ]);
    }

    public function get(Color $color) {
        return [
            'success' => true,
            'data' => [
                'votes' => $color->totalVotes->first() ? $color->totalVotes->first()->totalVotes : 0,
            ]
        ];
    }
}
