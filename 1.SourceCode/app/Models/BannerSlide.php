<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class BannerSlide extends Model
{
    use SoftDeletes;

    public $table = 'banner_slide';

    protected $primaryKey = 'banner_slide_id';
    
    protected $fillable = [
        'title', 
        'information', 
        'path_to_image', 
        'user_id_maked',
        'user_id_deleted',
        'user_id_updated',
    ];
}