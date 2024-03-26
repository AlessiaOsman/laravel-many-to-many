<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class Project extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'url', 'type_id'];

    public function getFormattedDate($column, $format='d-m-Y'){
        
        return Carbon::create($this->$column)->format($format);
    }

    public function contentTruncate($column){
        return Str::limit($this->$column, 20);
    }

    public function printImage(){
        return asset('storage/'. $this->image);
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }

    public function technologies(){
        return $this->belongsToMany(Technology::class);
    }
}
