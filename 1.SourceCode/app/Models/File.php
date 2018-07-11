<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'file_id';
    
    protected $fillable = [
        'title', 
        'content', 
        'user_id_maked',
        'user_id_deleted',
        'user_id_updated',
    ];
}
