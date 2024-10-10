<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaccineCenter extends Model
{
    use HasFactory;
    use HasFactory;

    protected $fillable = ['name', 'daily_capacity', 'next_date', 'occupied'];

    // One VaccineCenter has many registrations
    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}
