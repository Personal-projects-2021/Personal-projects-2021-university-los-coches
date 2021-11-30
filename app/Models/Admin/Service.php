<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'duration', 'type_id'];

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
