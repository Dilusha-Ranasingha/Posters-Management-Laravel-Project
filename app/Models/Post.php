<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'user_id',
    ];


    // This defines the relationship between the Post and the User models.A post belongs to a single user.
    // A Post belongs to a User, meaning each post is associated with a single user via the 'user_id' field.
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
