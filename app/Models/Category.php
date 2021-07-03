<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $primarykey='id';
    public $timestamps=false;
    protected $fillable=['category','category_slug'];
}
