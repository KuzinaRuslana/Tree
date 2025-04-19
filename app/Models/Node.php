<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Node extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'parent_id'];

    public function children()
    {
        return $this->hasMany(Node::class, 'parent_id');
    }

    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
}
