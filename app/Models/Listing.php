<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Listing extends Model
{
    use HasFactory, softDeletes;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeFilter(Builder $query, array $filters): void
    {


        $query->when(
            $filters['priceFrom'] ?? false,
            fn($query, $value) => $query->where('price', '>=', $value))
            ->when(
                $filters['priceTo'] ?? false,
                fn($query, $value) => $query->where('price', '<=', $value)
            )->when(
                $filters['beds'] ?? false,
                fn($query, $value) => $query->where('beds', (int)$value < 6 ? '=' : '>=', $value)
            )->when(
                $filters['baths'] ?? false,
                fn($query, $value) => $query->where('baths', (int)$value < 6 ? '=' : '>=', $value)
            )->when(
                $filters['areaFrom'] ?? false,
                fn($query, $value) => $query->where('area', '>=', $value)
            )->when(
                $filters['areaTo'] ?? false,
                fn($query, $value) => $query->where('area', '<=', $value)
            );
    }
}
