<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit_model extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'type',
        'dusun',
        'latlang'
    ];

    public function search($query)
    {
        return $this->where('location', 'LIKE', '%' . $query . '%')->get();
    }

    public function quickSearch($value)
    {
        return $this->where('type', 'like', '%' . $value . '%')->get();
    }
}
