<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstagramFeed extends Model
{
    protected $table = 'instagram_feeds';
    protected $fillable = ['product_id', 'image', 'insta_link', 'status'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
