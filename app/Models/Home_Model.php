<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home_Model extends Model
{
    use HasFactory;

    public static function index()
    {
        $data = ['ell', 'ilmu komputer'];
        return $data;
    }
}
