<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'description',
        'starting_bid',
        'image',
        'slug'
    ];

    public function bids()
    {
        return $this->hasMany(Bid::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
