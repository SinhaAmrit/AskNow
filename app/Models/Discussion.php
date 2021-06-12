<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Discussion extends Model
{
    use HasFactory;
    protected $fillable = ['title','category', 'summery', 'description', 'slug', 'user_id'];

    public function setSlugAttribute($title)
    {
    	$this->attributes['slug'] = $this->uniqueSlug($title);
    }

    private function uniqueSlug($title)
    {
    	$slug = Str::of($title)->slug('-')->lower()->ascii();
    	$count = Discussion::where('slug','LIKE',"{$slug}%")->count();
    	$newCount = $count > 0 ? ++$count : '';
    	return $newCount > 0 ? "$slug-$newCount" : $slug;
    }
}