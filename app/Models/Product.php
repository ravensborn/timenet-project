<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {

       return $this->belongsTo(Category::class);
    }

}
