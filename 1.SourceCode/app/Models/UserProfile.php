<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use SoftDeletes;

    public $table = 'user_profile';

    protected $primaryKey = 'user_profile_id';
    
    protected $fillable = [
        'user_id', 
        'phone', 
        'address',
        'birthday',
        'gender',
        'city',
        'facebook',
        'information',
        'user_id_maked',
        'user_id_deleted',
        'user_id_updated',
    ];
}
