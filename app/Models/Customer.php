<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Subscription;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'customer_code',
        'name',
        'phone',
        'email',
        'address',
        'subscribed_at',
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    // optional convenience: layanan customer
    public function services()
    {
        return $this->belongsToMany(Service::class, 'subscriptions')
            ->withPivot(['start_date', 'status'])
            ->withTimestamps();
    }
}
