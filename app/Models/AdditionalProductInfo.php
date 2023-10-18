<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdditionalProductInfo extends Model
{
    use HasFactory;
    protected $table = 'additional_product_infos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'product_id',
        'stand_up',
        'folded_w_o_wheels',
        'folded_w_wheels',
        'door_pass_through',
        'frame',
        'weight',
        'capacity',
        'width',
        'height',
        'handle_height',
        'wheels',
        'seat_back_height',
        'head_room',
        'color',
        'size',
    ];

    public function product() : BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
