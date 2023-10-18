<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SizeWeight extends Model
{
    use HasFactory;
    protected $table = 'size_weights';
    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'details',
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
