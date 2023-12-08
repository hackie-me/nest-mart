<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        'size_weight',
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
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function vendor() : BelongsTo
    {
        return $this->belongsTo(VendorDetails::class, 'vendor_id', 'vendor_id');
    }

    public function sizeWeights() : HasMany
    {
        return $this->hasMany(SizeWeight::class);
    }

    public function additionalProductInfos() : HasOne
    {
        return $this->hasOne(AdditionalProductInfo::class, 'product_id', 'id');
    }

    public function wishLists() : HasMany
    {
        return $this->hasMany(WishList::class);
    }

    public function carts() : HasMany
    {
        return $this->hasMany(Cart::class);
    }
}
