<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    use SoftDeletes;

    public $table = 'category_product';

    protected $primaryKey = 'category_product_id';
    
    protected $fillable = [
        'name', 
        'user_id_maked',
        'user_id_deleted',
        'user_id_updated',
    ];
}