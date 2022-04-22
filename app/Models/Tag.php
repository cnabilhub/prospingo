<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function prospects(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Prospect::class);
    }
}
