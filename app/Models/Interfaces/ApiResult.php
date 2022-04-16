<?php


namespace App\Models\Interfaces;


use Illuminate\Http\Request;

interface ApiResult
{
    public function execute(Request $request);
}
