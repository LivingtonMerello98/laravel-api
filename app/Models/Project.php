<?php

namespace App\Models;

//i modelli category e technology sono all'interno dello stesso namespace 
//possiao anche evitare di importarli 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;



class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'title',
        'description',
        'category_id',
        'slug',
        'cover'
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class, 'project_technology');
    }

    // Accessor per ottenere l'URL completo dell'immagine cover
    public function getCoverAttribute($value)
    {
        return asset('storage/' . $value);
    }
}

// url('/')
