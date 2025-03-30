<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Portfolio extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'description',
        'portfolio_status_id'
    ];


    public function portfolioStatus(): BelongsTo
    {
        return $this->belongsTo(PortfolioStatus::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(PortfolioItem::class);
    }

    public function history(): HasMany
    {
        return $this->hasMany(PortfolioHistory::class);
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('portfolio_status_id', PortfolioStatus::PUBLIC);
    }
}
