<?php

namespace App;

trait Favoritable {

    /**
     * Boot the trait.
     */
    protected static function bootFavoritable()
    {
        static::deleting(function ($model) {
            $model->favorites->each->delete();
        });
    }

    public function favorites()
    {
        return $this->morphMany(Favorite::class,'favorited');
    }
 
    public function favorite()
    {
        $attributes = ['user_id' => auth()->id()]; 
 
        if(! $this->favorites()->where($attributes)->exists()) {
            
            return $this->favorites()->create($attributes);
        }
     }
 
     public function unfavorite()
     {
         $attributes = ['user_id' => auth()->id()]; 
         $this->favorites()->where($attributes)->delete();
     }
 
     public function getIsFavoritedAttribute()
     {
        return $this->isFavorited();
     }
 
     public function isFavorited()
     {
        return $this->favorites()->where('user_id', auth()->id())->exists();
     }
 
     public function getFavoritesCountAttribute()
     {
        return $this->favorites->count();
     }
}