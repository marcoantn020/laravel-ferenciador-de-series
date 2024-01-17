<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = ['number'];
    protected $casts = ['watched' => 'boolean'];

//    deve ser utilizado quando se tem uma regra
//    protected function watched(): Attribute
//    {
//        return  new Attribute(
//            get: fn ($watched) => (bool) $watched ,
//        );
//    }


    public $timestamps = false;

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}
