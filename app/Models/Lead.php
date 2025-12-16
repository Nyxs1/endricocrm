<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'address',
        'status',
    ];
    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function customer()
    {
        return $this->hasOne(Customer::class);
    }
}
