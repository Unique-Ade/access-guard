<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
  use App\Models\User;

class UserActivity extends Model
{
    protected $table = 'user_activities';
    protected $fillable = [
        'user_id',
        'activity',
    ];
  

public function user()
{
    return $this->belongsTo(User::class);
}

}
