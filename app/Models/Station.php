<?php

namespace App\Models;

use App\Models\Traits\AllFor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Station extends Model
{
    use HasFactory;
    use AllFor;
    use Searchable;

    const  searchable_fields = ['id', 'code', 'name', 'company_id'];

    protected $fillable = [
        'name',
        'code',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function toSearchableArray()
    {
        return $this->only(self::searchable_fields);
    }
}
