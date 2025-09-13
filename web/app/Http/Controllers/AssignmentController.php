<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chore;
use App\Models\Member;

class AssignmentController extends Controller
{
    function index()
    {
        $chores = Chore::all();
        $members = Member::all();
        $favorites = Chore::where('is_favorite', true)->get();
        return view('assignment.index', ['chores' => $chores, 'members' => $members, 'favorites' => $favorites]);
    }
}
