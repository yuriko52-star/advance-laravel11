<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class HelloTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testHello(): void
    {
        /*$this->assertTrue(true);

        $arr = [];
        $this->assertEmpty($arr);

        $txt = "Hello World";
        $this->assertEquals('Hello World', $txt);

        $n = random_int(0, 100);
        $this->assertLessThan(100, $n);
        
        $response = $this->get('/');
        $response->assertStatus(200);

        $response = $this->get('/no_route');
        $response->assertStatus(404);
    
        */
    $user = User::factory()->create([
        'name' => 'aaa',
        'email' => 'bbb@ccc.com',
        'password' => 'test12345',
    ]);
    $this->assertDatabaseHas('users', [
        'name' => 'aaa',
        'email' => 'bbb@ccc.com',
        
    ]);
     // パスワードのハッシュが正しいか確認
     $this->assertTrue(Hash::check('test12345',$user->password));
}
}