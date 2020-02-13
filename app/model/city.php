<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class city extends Model
{
     protected $table = 'cities';

    public function Country() {

        $result = city::select("*")
                ->orderBy('city')
                ->get();

        return $result;
    }
    
    public function get($id) {

        $result = city::select("*")
                ->where('state_id', $id)
                ->get();

        return $result;
    }
}
