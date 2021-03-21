<?php

namespace App\Http\Controllers;

class ProgressController extends Controller
{
    public function save()
    {
        return view('save-progress');
    }

    public function store()
    {
    }

    public function retrieve()
    {
        return view('restore-progress');
    }

    public function restore()
    {
    }
}
