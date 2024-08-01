<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

// use Illuminate\Contracts\Auth\Authenticatable;

class User extends Authenticatable
{


    use HasFactory;

    public $timestamps = false;
    protected $guarded = [];// $fillable opposit of guarded

    public function setEmailAttribute($val)
    {
        $this->attributes['email'] = strtolower($val);
    }

    // public function setNameAttribute($val)
    // {
    //     $this->attributes['name'] = strtolower($val);
    // }


    // public function getNameAttribute($val)
    // {
    //     return ucwords($val);
    // }


    //new format for accessors and  mutators

    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn(string $val) => ucwords($val),
            set: fn(string $val) => strtolower($val)

        );
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed'
        ];
    }

}
