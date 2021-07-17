<?php

namespace App\Http\Controllers;

class MatrixController2 extends Controller
{
    public function generate()
    {
        return response()->json(array('ok' => false, 'thesisResearch' => 'gaaaaaaaa', 200));
    }
}
