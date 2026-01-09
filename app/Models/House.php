<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
        'bedrooms',
        'year_built',
    ];

    public function tenants()
    {
        return $this->hasMany(Tenant::class);
    }
}
