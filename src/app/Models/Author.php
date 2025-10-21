<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $fillable = ['name','age','nationality'];
    public function getDetail()
    {
        $txt = 'ID:'.$this->id .' ' . $this->name .'(' . $this->age . '才'.')' . $this->nationality;
        return $txt;
    }
}
