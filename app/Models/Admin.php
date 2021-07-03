<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
        protected $PrimaryKey = "id";
        public $timestamps = false;
        protected $fillable = ['username' , 'password'];
}
