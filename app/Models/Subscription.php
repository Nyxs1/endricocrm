<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Customer;
use App\Models\Service;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'service_id',
        'start_date',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
