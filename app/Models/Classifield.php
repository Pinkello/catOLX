<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classifield extends Model
{
    use HasFactory;

    public static function getRandomId(): int
    {
        return self::inRandomOrder()->value('id') ?? self::factory()->create()->id;
    }

    protected $fillable = [
        'name',
        'price',
        'description',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
}
