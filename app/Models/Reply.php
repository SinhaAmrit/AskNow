<?php

namespace App\Models;

use App\Models\Discussion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['discussion_id','content'];
    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function discussion()
    {
    	return $this->belongsTo(Discussion::class);
    }
}
