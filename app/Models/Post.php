<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use JetBrains\PhpStorm\ArrayShape;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;


class Post extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;
    use HasSlug;

    protected $guarded = ['id'];

    const TYPE_ARTICLE = 5;
    const TYPE_SERVICE = 6;
    const TYPE_SOLUTION = 7;
    const TYPE_PRODUCT = 8;

    public static function convertStringToTypeId($string): int
    {
        switch ($string) {
            case 'articles':
                return self::TYPE_ARTICLE;
            case 'services':
                return self::TYPE_SERVICE;
            case 'solutions':
                return self::TYPE_SOLUTION;
            case 'products':
                return self::TYPE_PRODUCT;
            default: return 0;
        }
    }

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('title')
            ->saveSlugsTo('slug');
    }

    public function author(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
