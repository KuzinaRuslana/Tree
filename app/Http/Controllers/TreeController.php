<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Node;

class TreeController extends Controller
{
    public function getTreeStructure(Request $request)
    {
        $selectedNodeId = $request->input('node_id');
        
        $nodes = Node::whereNull('parent_id')->with('childrenRecursive')->get();
        $allNodes = Node::all();

        return view('tree.index', compact('nodes', 'allNodes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:nodes',
            'parent_id' => 'nullable|exists:nodes,id',
        ]);

        $node = new Node();
        $node->fill($validated);
        $node->save();

        return redirect()
            ->route('tree.index');
    }

    public function getFlatList(Request $request)
    {
        $selectedNodeId = $request->input('node_id');

        if ($selectedNodeId) {
            $selectedNode = Node::with('childrenRecursive')->findOrFail($selectedNodeId);
            $nodes = $this->flatten($selectedNode);
        } else {
            $nodes = Node::all();
        }

        $allNodes = Node::all();
    
        return view('tree.flat', compact('nodes', 'allNodes', 'selectedNodeId'));
    }
    
    private function flatten(Node $node): array
    {
        $result = [$node];

        foreach ($node->children as $child) {
            $result = array_merge($result, $this->flatten($child));
        }
    
        return $result;
    }
}
