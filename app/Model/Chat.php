<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    /**
     * Fields that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['user_id', 'message', 'full_name','channel_id'];

    public function channels()
    {
        return $this->belongsTo(Channels::class, 'channel_id');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
