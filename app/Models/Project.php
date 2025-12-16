<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Service;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'lead_id',
        'created_by',
        'reviewed_by',
        'status',
        'manager_note',
        'submitted_at',
        'approved_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
        'approved_at' => 'datetime',
    ];

    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }

    public function projectServices()
    {
        return $this->hasMany(ProjectService::class);
    }

    // optional convenience: ambil layanan via pivot
    public function services()
    {
        return $this->belongsToMany(Service::class, 'project_services')
            ->withPivot(['qty', 'price_snapshot'])
            ->withTimestamps();
    }
}
