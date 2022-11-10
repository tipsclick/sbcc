<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use HasFactory, SoftDeletes;

    protected $dates = ['start_date', 'revision_date', 'expiry_date'];

    public function files()
    {
        return $this->hasMany(TenantFile::class)->orderBy('created_at', 'DESC');
    }
}
