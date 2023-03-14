<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FriendsController extends Controller
{
    public function index()
    {
        $friends = User::orderBy('id','desc')->paginate(10);
        return view('friends.index',['friends'=>$friends]);
    }
    public function open($id)
    {
       $friend = User::find($id);
       return view('friends.view',['friend'=>$friend]);
    }
}
