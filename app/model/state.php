<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class state extends Model
{
     protected $table = 'states';

    public function Country() {

        $result = state::select("*")
                ->orderBy('state')
                ->get();

        return $result;
    }
    
    public function get($id) {

        $result = state::select("*")
                ->where('country_id', $id)
                ->get();

        return $result;
    }
}
