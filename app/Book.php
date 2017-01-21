<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    // A book has 1 or more reviews
    public function reviews(){
    	return $this->hasMany(Review::class);
    }

    public function addReview(Review $review){
    	return $this->reviews()->save($review);
    }
}
