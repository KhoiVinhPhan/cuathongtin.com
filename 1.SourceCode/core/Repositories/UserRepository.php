<?php

namespace Core\Repositories;
use Illuminate\Support\Facades\DB;
use Auth;

class UserRepository implements UserRepositoryContract
{

    public function index()
    {
        $data = DB::table('users')
                    ->select('users.*')
                    ->where('users.user_id', '=', Auth::user()->user_id)
                    ->first();
        return $data;
    }
}