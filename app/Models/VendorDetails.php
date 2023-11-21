<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VendorDetails extends Model
{
    use HasFactory;
    protected $table = 'vendor_details';
    protected $primaryKey = 'id';

    protected $fillable = [
        'vendor_id',
        'address_id',
        'name',
        'summary',
        'phone',
        'twitter',
        'facebook',
        'instagram',
        'pinterest',
        'since',
    ];

    protected $casts = [
        'since' => 'date',
    ];

    public function vendor() : BelongsTo
    {
        return $this->belongsTo(User::class, 'vendor_id');
    }

    public function address() : HasOne
    {
        return $this->hasOne(Address::class, 'user_id', 'vendor_id');
    }

}
