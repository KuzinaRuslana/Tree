<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Node;

class TreeController extends Controller
{
    public function getTreeStructure()
    {
        $nodes = Node::whereNull('parent_id')->with('childrenRecursive')->get();

        return view('tree.index', compact('nodes'));
    }

    public function getFlatList()
    {
        $nodes = Node::all();
    
        return view('tree.flat', compact('nodes'));
    }   
}
