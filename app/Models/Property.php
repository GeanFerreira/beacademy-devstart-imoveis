<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'terreno',
        'salas',
        'banheiros',
        'dormitorios',
        'garagens',
        'descricao',
        'preco',
        'city_id',
        'type_id',
        'goal_id'
    ];

    public function address()
    {
        return $this->hasOne(Address::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
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

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }
}
