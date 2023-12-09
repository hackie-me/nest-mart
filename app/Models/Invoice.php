<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'invoices';
    protected $fillable = [
        'invoice_number',
        'due_date',
        'first_name',
        'last_name',
        'company_name',
        'address_line_1',
        'address_line_2',
        'country',
        'city',
        'zip_code',
        'phone',
        'email',
        'additional_information',
        'payment_method',
        'payment_status',
        'cart_id',
        'vendor_id',
        'user_id',
    ];

    protected $casts = [
        'due_date' => 'datetime',
    ];
    public function user(): BelongsTo{
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function vendor(): BelongsTo{
        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }
    public function cart(): BelongsTo{
        return $this->belongsTo(Cart::class, 'cart_id', 'id');
    }

}

