<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image'
    ];

    protected $appends = ['links'];

    public function seasons(): HasMany
    {
        return $this->hasMany(Season::class, 'series_id' );
    }

    public function episodes(): HasManyThrough
    {
        return $this->hasManyThrough(Episode::class, Season::class);
    }

    protected static function booted()
    {
        self::addGlobalScope('ordered', function (Builder $queryBuilder) {
            $queryBuilder->orderBy('name');
        });
    }

    public function links(): Attribute
    {
        return  new Attribute(
            get: fn () => [
                [
                    'rel' => 'self',
                    'url' => "/api/v1/series/{$this->id}"
                ],
                [
                    'rel' => 'seasons',
                    'url' => "/api/v1/series/{$this->id}/seasons"
                ],
                [
                    'rel' => 'episodes',
                    'url' => "/api/v1/series/{$this->id}/episodes"
                ]
            ]
        );
    }
}
