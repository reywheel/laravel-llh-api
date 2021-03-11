<?php

namespace App\Models;

use App\Scopes\OwnScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PulseData extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    protected $guarded = [];

    protected static function booted()
    {
        static::addGlobalScope(new OwnScope());
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
