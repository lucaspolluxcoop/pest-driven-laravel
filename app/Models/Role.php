<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    public const ADMIN = 'admin';
    public const ADVISOR = 'advisor';
    public const SUBSCRIPTOR = 'subscriptor';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'title',
        'value',
        'description',
    ];
}
