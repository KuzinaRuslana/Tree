<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    public function children()
    {
        return $this->hasMany(Node::class, 'parent_id');
    }
}
