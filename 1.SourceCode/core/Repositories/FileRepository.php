<?php

namespace Core\Repositories;
use Illuminate\Support\Facades\DB;
use Auth;

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

    public function update($input)
    {
        $data = DB::table('files')
                    ->where('file_id', $input['file_id'])
                    ->update([
                        'title'             => $input['title'],
                        'content'           => $input['content'],
                        'user_id_updated'   => Auth::user()->user_id,
                        'updated_at'        => now(),
                    ]);
        return $data;
    }

}