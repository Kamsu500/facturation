<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['nom'];

    protected $table = 'roles';

    protected $primaryKey='role_id';

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
