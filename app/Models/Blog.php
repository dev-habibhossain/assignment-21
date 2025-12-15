<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
   use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'category_id',
        'user_id',
        'summary',
        'full_desc',
        'image',
        'read_time',
        'published_date',
        'is_featured',
        // 'tags' if you add it to the migration later
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(AuthorUser::class, 'user_id');
    }
}
