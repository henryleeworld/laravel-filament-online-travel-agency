<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bed extends Model
{
    /** @use HasFactory<\Database\Factories\BedFactory> */
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = ['room_id', 'bed_type_id', 'name'];

    /**
     * Get the bed type that owns the bed.
     */
    public function bed_type(): BelongsTo
    {
        return $this->belongsTo(BedType::class);
    }

    /**
     * Get the room that owns the bed.
     */
    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
