<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test extends Model
{
    use HasFactory;
    // protected $table = "test_table"; change table name in phpmyadmin without cozing any conflict
    // protected $primaryKey="test_id"; same for id renaming
    // // public $timestamps = false;
    // const CREATED_AT = "creation_date";
    // const UPDATED_AT = "updation_date";

    protected $attrubute = [
        'city' => 'delhi'
    ];

    // public function scopeActive($query)
    // {
    //     return $query->where('status', 1);
    // } for is_active type columns  in controller:: use actve()


    //global scope
    // protected static function booted(): void
    // {
    //     static::addGlobalScope('userdetail', function (Builder $builder) {
    //         $builder->where('status', 1);
    //     });
    // }
}

