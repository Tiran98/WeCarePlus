<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Tymon\JWTAuth\Contracts\JWTSubject;
use App\Supplier;

class StockOrder extends Eloquent implements JWTSubject, AuthenticatableContract
{
    use Notifiable;
    use Authenticatable; 

    protected $connection = 'mongodb';
    protected $collection = 'StockOrder';

    protected $fillable = [
        'Supplier Id', 'Item Name','Qty','Message'
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    public function suppliers()
    {
        return $this->belongsTo(Supplier::class,'supplier_id');
    }
}
