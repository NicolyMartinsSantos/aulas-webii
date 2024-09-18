<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use  App\Models\Livro;
use Illuminate\Database\Eloquent\SoftDeletes;

class Autores extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['nome', 'apelido', 'nacionalidade'];
    public function livros (){
        return $this->hasMany(Livro::class);
    }
}