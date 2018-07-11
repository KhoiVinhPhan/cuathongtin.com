<?php

namespace Core\Repositories;
use Illuminate\Support\Facades\DB;

class FileRepository implements FileRepositoryContract
{

    public function index()
    {
        $data = DB::table('files')
                    ->select('files.*', 'users.name as nameUser')
                    ->join('users', 'users.user_id', '=', 'files.user_id_maked')
                    ->whereNull('files.deleted_at')
                    ->get();
        return $data;
    }

    public function edit($id)
    {
        $data = DB::table('files')
                    ->select('*')
                    ->whereNull('deleted_at')
                    ->where('file_id','=', $id)
                    ->first();
        return $data;
    }

}