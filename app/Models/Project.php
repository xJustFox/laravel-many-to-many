<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['name','repository_link','description','date_start','date_end','img', 'type_id'];

    public function type(){
        return $this->belongsTo(Type::class);
    }
}
