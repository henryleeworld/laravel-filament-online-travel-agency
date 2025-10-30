<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Geoobject extends Model
{
    /** @use HasFactory<\Database\Factories\GeoobjectFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['city_id', 'name', 'lat', 'long'];

    /**
     * Get the city that owns the geoobject.
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
