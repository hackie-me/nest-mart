<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    protected $primaryKey = 'id';

    protected $fillable = [
        'address_line_1',
        'address_line_2',
        'city',
        'state',
        'zip_code',
        'country',
        'address_type',
    ];

    public function vendor(): HasOne
{
    return $this->hasOne(VendorDetails::class, 'address_id', 'id');
}
}
