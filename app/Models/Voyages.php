<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voyages extends Model
{
    //
    use HasFactory;
    protected $table = 'voyages';
    protected $fillable = ['titre', 'description', 'eventDate','image','prix'];
}
