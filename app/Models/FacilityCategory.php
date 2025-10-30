<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FacilityCategory extends Model
{
    /** @use HasFactory<\Database\Factories\FacilityCategoryFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['name'];

    /**
     * Get the facilities for the facility category.
     */
    public function facilities(): HasMany
    {
        return $this->hasMany(Facility::class, 'category_id');
    }
}
