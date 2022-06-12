<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Channels extends Model
{
    protected $table = 'channels';
    protected $fillable = ['user_id','channel_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
