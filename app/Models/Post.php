<?php

namespace App\Models;
use Cviebrock\EloquentSluggable\Sluggable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable=[
        'title',
        'desc',
        'user_id'
    ];

    // public function myUserPost(){
        
    //     return $this->belongsTo(User::class,"user_id");
    // }
    public function user(){
        
        return $this->belongsTo(User::class);
    }



    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
   
}
