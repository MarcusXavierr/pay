<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class JobContractType extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(JobPost::class);
    }
}
