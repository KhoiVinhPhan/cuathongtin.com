<?php

namespace Core\Repositories;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Models\File;

class FileRepository implements FileRepositoryContract
{

    public function index()
    {
        $data = DB::table('files')
                    ->select('files.*', 'users.name as nameUser')
                    ->join('users', 'users.user_id', '=', 'files.user_id_maked')
                    ->orderBy('file_id', 'desc')
                    ->whereNull('files.deleted_at')
                    ->where('files.user_id_maked', '=', Auth::user()->user_id)
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

    public function store($input)
    {
        DB::beginTransaction();
        try{
            $data = array(
                'title'         => $input['title'],
                'content'       => $input['content'],
                'user_id_maked' => Auth::user()->user_id,
                'created_at'    => now(),
            );
            $file_id = File::create($data)->file_id;
            DB::commit();
            return $file_id;
        } catch(\Exception $e){
            DB::rollback();
            return false;
        }
    }

}