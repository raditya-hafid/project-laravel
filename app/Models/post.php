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

    public function scopeFilter($query, array $filters){
       

        $query->when($filters['Cari']??false, function($query, $Cari){
            return $query->where('title','like','%' . $Cari . '%')
            ->orWhere('body','like','%' . $Cari . '%');
        });

        $query->when($filters['category']??false, function($query, $category){
            return $query->whereHas('category' , function($query) use($category){
                $query->where('slug',$category);
            });
        });

        $query->when($filters['author']??false, function($query, $author){
            return $query->whereHas('author' , function($query) use($author){
                $query->where('username',$author);
            });
        });


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
