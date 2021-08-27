<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    use HasFactory;
    protected $hidden = ['created_at', 'updated_at'];

    /**
     * synonyms_pools table relation
     *
     * @author Arif C A <aca@lbit.in>
     * 
     * @return Void
     */
    public function synonyms_pools()
    {
        return $this->belongsTo('App\Models\SynonymsPool');
    }
}
