<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foto extends Model
{
    protected $fillable = [
        'reporter_id','foto','kategori','publish'
    ];

    public function reporter(){
        return $this->belongsTo(Reporter::class, 'reporter_id', 'id');
    }

}
