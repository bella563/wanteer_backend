<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    // Liste des attributs mass assignable
    protected $fillable = [
        'user_id',
        'company_name',
        'contact_name',
        'contact_email',
        'contact_phone',
        'address',
    ];

    // Définir la relation avec le modèle User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
