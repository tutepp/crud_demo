<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class TutorialController extends Controller
{
    public function index()
    {
        $tutorial =  [
            [
                'title' => 'demo title 1',
                'description' => 'demo description 1',
                'published' => true
            ],
            [
                'title' => 'demo title 2',
                'description' => 'demo description 2',
                'published' => true
            ]

        ];

        return response()->json($tutorial, 200);
    }
}
