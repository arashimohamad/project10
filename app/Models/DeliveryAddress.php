<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DeliveryAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'address',
        'city',
        'state',
        'country',
        'postcode',
        'mobile',
        'status'
    ];
    
    public static function deliveryAddresses() {
        $user_id = Auth::user()->id;
        $deliveryAddresses = DeliveryAddress::where('user_id', $user_id)
                            ->where('status', 1)
                            ->get()
                            ->toArray();
        return $deliveryAddresses;
    }
}
