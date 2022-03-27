<?php

namespace App\Models;

use App\Models\Channel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $guarded=[];

    public function getRouteKeyName()
    {
        return 'uid';
    }

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function getThumbnailAttribute()
    {
        if ($this->thumbnail_img) {
            return '/videos/' . $this->uid . '/' . $this->thumbnail_img;
        } else {
            return '/videos/' . 'default.png';
        }
    }
}
