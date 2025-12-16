<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectService extends Model
{
    use HasFactory;

    protected $table = 'project_services';

    protected $fillable = [
        'project_id',
        'service_id',
        'qty',
        'price_snapshot',
    ];

    protected $casts = [
        'qty' => 'integer',
        'price_snapshot' => 'decimal:2',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
