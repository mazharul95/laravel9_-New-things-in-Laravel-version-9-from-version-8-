<?php

namespace App;
namespace App\Models;

use App\Enums\PostState;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Searchable;

    // #=[SearchUsingFullText('body')] 
    // public function toSearchableArray()
    // {
    //     return [
    //         'title' => $this->title,
    //         'body' => $this->body
    //     ];
    // }
        protected $appends = [
            'path'
        ];

        public function path(): Attribute
        {
            return Attribute::get(fn()=> route('posts.show',$this));
        }
}

