<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //funzione per avere pù Project all'interno delle categories

    protected $fillable = [
        'title',
        'slug',
        'description'
    ];


    public function projects()
    {
        return $this->hasMany(Project::class);
    }
}
