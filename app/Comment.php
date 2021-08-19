<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded=[];

    protected $table='comments';

    protected $primaryKey = 'id_commentaire';

    public function commentable()
    {
        return $this->morphTo();
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
