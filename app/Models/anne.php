<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\semaine;

class anne extends Model
{
    use HasFactory;
    protected $fillable=['date_debut','date_fin'];
    public function semaines(){
        return $this->hasMany(semaine::class,'id_semaines');
    }
}
