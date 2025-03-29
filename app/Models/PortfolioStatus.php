<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioStatus extends Model{

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
    ];

    const PUBLIC = 1;
    const PRIVATE = 2;
}
