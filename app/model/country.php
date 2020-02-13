<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class country extends Model {

    protected $table = 'countries';

    public function Country() {

        $result = country::select("*")
                ->orderBy('country')
                ->get();

        return $result;
    }
}
