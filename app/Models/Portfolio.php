<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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


    public function portfolioStatus()
    {
        return $this->belongsTo(PortfolioStatus::class);
    }

    public function scopePublic(Builder $query): Builder
    {
        return $query->where('portfolio_status_id', PortfolioStatus::PUBLIC);
    }
}
