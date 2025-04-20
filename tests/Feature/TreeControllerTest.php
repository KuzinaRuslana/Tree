<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Node;
use App\Http\Controllers\TreeController;
use Database\Seeders\NodeSeeder;

class TreeControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->seed(NodeSeeder::class);
    }

    public function testGetFlatList(): void
    {
        $expected = json_decode(file_get_contents(base_path('tests/Fixtures/flat_list_result.json')), true);

        $controller = new TreeController();
        $nodes = $controller->getFlatListNodes(null);
        $actual = array_map(fn($node) => $node->title, $nodes);

        $this->assertSame($expected, $actual);
    }

    public function testStore(): void
    {
        $data = Node::factory()->make()->only('title');
        $response = $this->post(route('tree.index'), $data);
        $response->assertRedirect(route('tree.index'));

        $this->assertDatabaseHas('nodes', $data);
    }

    public function testDestroy(): void
    {
        $node = Node::factory()->create();
        $response = $this->delete(route('tree.destroy', ['node_id' => $node->id]));
        $response->assertRedirect(route('tree.index'));

        $this->assertDatabaseMissing('nodes', $node->only('id'));
    }
}

