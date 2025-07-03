<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
  use HasFactory;
  protected $fillable = [
    "image",
    "title",
    "slug",
    "content",
    "category_id",
    "user_id",
    "published_at",
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function readTime($wordPerMinute = 200)
  {
    $wordCount = str_word_count(strip_tags($this->content));
    $readTime = ceil($wordCount / $wordPerMinute); // Assuming average reading speed of 200 words per minute
    return max(1, $readTime);
  }

  public function imageUrl(): string
  {
    if ($this->image) {
      return Storage::url($this->image);
    }
    return "https://tamilnaducouncil.ac.in/wp-content/uploads/2020/04/dummy-avatar.jpg";
  }
}
