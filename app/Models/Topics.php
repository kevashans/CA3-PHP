<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topics extends Model
{
    use HasFactory;
    protected $fillable = ['topic_name', 'slug', 'topic_description', 'topic_image', 'members'];
}
