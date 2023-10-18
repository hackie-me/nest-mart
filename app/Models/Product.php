<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'image',
        'gallery',
        'name',
        'category_id',
        'price',
        'summary',
        'description',
        'stock',
        'type',
        'sku',
        'mfg',
        'exp',
        'tags',
        'vendor_id',
    ];

    protected $casts = [
        'gallery' => 'json',
        'tags' => 'json',
        'mfg' => 'date',
        'exp' => 'date',
    ];

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function vendor() : BelongsTo
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function sizeWeights() : HasMany
    {
        return $this->hasMany(SizeWeight::class);
    }

    public function additionalProductInfos() : HasMany
    {
        return $this->hasMany(AdditionalProductInfo::class);
    }
}
