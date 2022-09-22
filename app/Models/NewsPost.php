<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    use HasFactory;

    protected $table = 'newsposts';
    protected $fillable = ['title', 'content', 'newscategory_id'];

    public function newscategory()
    {
        return $this->belongsTo(NewsPostCategory::class);
    }
}
