<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_course';
    public $incrementin = true;
    protected $fillable=['point_depart','point_arrivee','date_heure','id_chauffeur','statut'];
    

    public function chauffeur()
    {
        return $this->belongsTo(chauffeur::class, 'id_chauffeur');
    }
}
