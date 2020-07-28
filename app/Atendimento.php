<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Atendimento extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_id', 'user_id', 'cliente', 'observacao',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tipo() {
        return $this->belongsTo(Tipo::class);
    }
}
