<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Node;

class NodeSeeder extends Seeder
{
    public function run(): void
    {
        $level1 = Node::create(['title' => 'Уровень 1']);
        $child11 = Node::create(['title' => 'Потомок 1.1', 'parent_id' => $level1->id]);
        $child111 = Node::create(['title' => 'Потомок 1.1.1', 'parent_id' => $child11->id]);
        $child1111 = Node::create(['title' => 'Потомок 1.1.1.1', 'parent_id' => $child111->id]);
        $child12 = Node::create(['title' => 'Потомок 1.2', 'parent_id' => $level1->id]);
        $child121 = Node::create(['title' => 'Потомок 1.2.1', 'parent_id' => $child12->id]);

        $level2 = Node::create(['title' => 'Уровень 2']);
        $child21 = Node::create(['title' => 'Потомок 2.1', 'parent_id' => $level2->id]);
    }
}
