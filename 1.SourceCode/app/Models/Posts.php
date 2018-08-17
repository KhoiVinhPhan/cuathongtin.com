<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use SoftDeletes;

    public $table = 'posts';

    protected $primaryKey = 'post_id';
    
    protected $fillable = [
        'title', 
        'content', 
        'path_to_image', 
        'status', 
        'user_id_maked',
        'user_id_deleted',
        'user_id_updated',
    ];
}
