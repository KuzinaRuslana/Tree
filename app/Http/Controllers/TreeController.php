<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Node;

class TreeController extends Controller
{
    public function getTreeStructure(Request $request)
    {
        $nodes = Node::whereNull('parent_id')->orderBy('title')->with('childrenRecursive')->get();
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
        $nodes = $this->getFlatListNodes($selectedNodeId);

        $allNodes = Node::orderBy('title')->get();

        return view('tree.flat', compact('nodes', 'allNodes', 'selectedNodeId'));
    }

    protected function getFlatListNodes($selectedNodeId)
    {
        if ($selectedNodeId) {
            $selectedNode = Node::with('childrenRecursive')->findOrFail($selectedNodeId);
            return $this->flatten($selectedNode);
        } else {
            $roots = Node::whereNull('parent_id')->orderBy('title')->with('childrenRecursive')->get();
            $nodes = [];

            foreach ($roots as $root) {
                $nodes = array_merge($nodes, $this->flatten($root));
            }

            return $nodes;
        }
    }

    private function flatten(Node $node): array
    {
        $result = [$node];

        foreach ($node->children as $child) {
            $result = array_merge($result, $this->flatten($child));
        }

        return $result;
    }

    public function destroy(Request $request)
    {
        Node::findOrFail($request['node_id'])->delete();

        return redirect()->route('tree.index');
    }
}
