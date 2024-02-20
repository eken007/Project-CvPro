<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Annonce extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'titre',
        'ville',
        'name_creator',
        'email_creator',
        'prenom_creator',
        'type',
        'datelimit',
        'categorie',
        'description',
        
    ];
}
