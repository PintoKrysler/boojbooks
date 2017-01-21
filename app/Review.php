<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
	protected $fillable = ['body'];

    // A review belongs to a book
    public function book(){
    	return $this->belongsTo(Book::class);
    }
}
