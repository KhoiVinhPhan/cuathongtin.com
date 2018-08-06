<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CategoryNew extends Model
{
    use SoftDeletes;

    public $table = 'category_news';

    protected $primaryKey = 'category_new_id';
    
    protected $fillable = [
        'name', 
        'user_id_maked',
        'user_id_deleted',
        'user_id_updated',
    ];
}