<?php

namespace App;
namespace App\Models;

use App\Enums\PostState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Scout\Attributes\SearchUsingFullText;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    use Searchable;
    
    #=[SearchUsingFullText('body')] 
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'body' => $this->body
        ];

        
    }
    protected $casts = [
        'state'=>PostState::class           
    ];
}

