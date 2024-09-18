<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use  App\Models\Autores;
use Illuminate\Database\Eloquent\SoftDeletes;

class Livro extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'livros';

    protected $fillable = ['titulo', 'description', 'autores_id'];
    public function autores(){
        return $this->belongsTo(Autores::class, 'autores_id');
    }
}