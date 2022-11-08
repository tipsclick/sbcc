<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserLoginHistory extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'user_id', 'user_ip', 'browser_details'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
