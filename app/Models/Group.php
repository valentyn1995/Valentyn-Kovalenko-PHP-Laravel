<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = 'groups';
    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class, 'group_id');
    }
}
