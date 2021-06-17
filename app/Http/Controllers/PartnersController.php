<?php

namespace App\Http\Controllers;

use App\Models\Partner;

class PartnersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Partner::select(['id', 'name'])->get());
    }
}
