<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DeposerCv extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'prenom',
        'numero',
        'creator_id',
        'booster_id',
        'file',
        'image',
        'categorie',
        'description',
        'booster',
        'nombre',
    ];


}
