<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Attributes\Scope;

trait ValidForRange
{
    /**
     * Scope a query to only include valid.
     */
    #[Scope]
    public function validForRange($query, array $range = [])
    {
        $query->where(function ($query) use ($range) {
            return $query
                ->where(function ($query) use ($range) {
                    $query->where('start_date', '>=', reset($range))->where('end_date', '<=', end($range));
                })
                ->orWhere(function ($query) use ($range) {
                    $query->whereBetween('start_date', $range)->orWhereBetween('end_date', $range);
                })
                ->orWhere(function ($query) use ($range) {
                    $query->where('start_date', '<=', reset($range))
                        ->where('end_date', '>=', end($range));
                });
        });
    }

}
