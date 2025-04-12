<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'classifield_id',
        'path',
    ];

    public function classifield()
    {
        return $this->belongsTo(Classifield::class);
    }
}
