<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

class User extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    // Relación uno a muchos: un usuario puede tener muchos pedidos
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}