<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserPhoto extends Model
{
    use SoftDeletes;

    public $table = 'user_photo';

    protected $primaryKey = 'user_photo_id';
    
    protected $fillable = [
        'user_id', 
        'type', 
        'filename',
        'filepath',
        'size',
        'mime',
        'org_filename',
        'user_id_maked',
        'user_id_deleted',
        'user_id_updated',
    ];
}
