<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Equipment extends Model
{
    use HasFactory;

    protected $primaryKey = 'code';
    public $timestamps = false;

    /**
     * Get the comments for the blog post.
     */
    public function equipment(): HasMany
    {
        return $this->hasMany('App\Models\EquipmentType', 'code', 'code_type');
    }
}
