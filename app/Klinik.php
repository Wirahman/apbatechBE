<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klinik extends Model
{
	protected $primaryKey = 'kduser';
    /**
     * @var array
     */
    protected $fillable = [
        'kduser', 'username', 'password', 'nama', 'hakakses', 'kdklinik', 'kdcabang'
    ];
}
