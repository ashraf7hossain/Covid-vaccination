<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'nid',
        'vaccine_center_id',
        'scheduled_date',
        'status'
    ];

    public function vaccineCenter()
    {
        return $this->belongsTo(VaccineCenter::class);
    }
}
