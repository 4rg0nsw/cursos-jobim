<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['name'];

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
