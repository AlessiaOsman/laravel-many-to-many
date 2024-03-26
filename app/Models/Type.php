<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    protected $fillable = ['label', 'color'];

    //questa funzione si richiama come proprietà $type->projects

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
