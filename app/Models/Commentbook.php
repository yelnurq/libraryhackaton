<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentbook extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function user() 
    {
        return $this->belongsTo(User::class);
    }
    public function books()
    {
        return $this->belongsTo(Book::class);
    }
}
