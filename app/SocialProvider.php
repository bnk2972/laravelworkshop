<?php

namespace App;

use App\Admin;
use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    protected $fillable = [
        'provider_id',
        'provider'
    ];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
