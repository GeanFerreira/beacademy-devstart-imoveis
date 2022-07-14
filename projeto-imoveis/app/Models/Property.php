<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'cidade_id');
    }

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function neighborhoods()
    {
        return $this->belongsToMany(Neighborhood::class)->withTimestamps();
    }
}
