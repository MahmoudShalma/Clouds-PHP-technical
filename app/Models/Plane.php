<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    use HasFactory;
    protected $guarded;
    public function customerPlane()
    {
        return $this->hasOne(CustomerPlane::class);
    }
}
