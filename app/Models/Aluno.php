<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = ['name', 'email', 'data', 'cursos'];

    public function search($filter = null){

        $results = $this->where(function ($query) use($filter){
            if($filter){
                $query->where('name', 'LIKE', "%{$filter}%");
            }
        })
        ->paginate();
        return $results;
    }
}
