<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'speed',
        'price',
        'description',
        'features',
        'is_active',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function projectServices()
    {
        return $this->hasMany(ProjectService::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
