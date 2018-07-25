<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class SecCategoryProduct extends Model
{
    use SoftDeletes;

    public $table = 'sec_category_product';

    protected $primaryKey = 'sec_category_product_id';
    
    protected $fillable = [
        'name', 
        'category_product_id', 
        'user_id_maked',
        'user_id_deleted',
        'user_id_updated',
    ];
}