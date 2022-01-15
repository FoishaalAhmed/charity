<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CauseResearch extends Model
{
    use HasFactory;

    protected $fillable = [
        'research_id', 'cause_id',
    ];
}
