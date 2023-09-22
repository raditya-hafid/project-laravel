<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable; error



class post extends Model
{
    use HasFactory;
    // use Sluggable; //error

    // protected $fillable=['User_id','category_id','title','slug','exe','body'];
    protected $guarded=['id'];
    protected $with=['category','author'];

    public function scopeFilter($query){
        if (request('search')) {
            return $query->where('title','like','%' . request('search') . '%')
            ->orWhere('body','like','%' . request('search') . '%');
        }
    }

    public function category()
    {
        return $this->belongsTo(category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class,'User_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
//error
    // public function sluggable(): array
    // {
    //     return [
    //         'slug' => [
    //             'source' => 'title'
    //         ]
    //     ];
    // }
}
