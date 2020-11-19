<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'civilite',
        'prenom',
        'nom',
        'fonction',
        'service',
        'email',
        'telephone',
        'date_naissance',
        'nom_societe',
        'adresse_societe',
        'code_postal_societe',
        'ville_societe',
        'telephone_societe',
        'site_web_societe',
    ];
	protected $table="contacts";

    public function company()
	{
		return $this->belongsTo('App\Models\Company');
	}
}
