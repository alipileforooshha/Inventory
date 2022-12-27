<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    const Mosque = '0';
    const Inventory = '1';
    const Hosseinieh = '2';
    const Office = '3';

    protected $fillable = [
        'name',
        'code',
        'location',
        'is_vaghf'
    ];

    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];


    public static function Search($name, $code, $location, $is_vaghf){
        $query = Item::query();
        if(isset($name)){
            $query->where('name','like',"%{$name}%");
        }
        if(isset($code)){
            $query->where('code',$code);
        }
        if(isset($location)){
            $query->where('location',$location);
        }
        if(isset($is_vaghf)){
            $query->where('is_vaghf',$is_vaghf);
        }

        return $query->get();
    }
}
