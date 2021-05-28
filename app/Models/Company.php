<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }

    public function drivers()
    {
        return $this->hasMany(Driver::class);
    }

    public function routes()
    {
        return $this->hasMany(Route::class);
    }
}
