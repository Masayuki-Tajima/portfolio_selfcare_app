<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Condition;
use App\Models\Sign;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class SignTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 体調サインの新規登録画面の表示テスト
     */
    public function test_sign_create_page_can_be_rendered()
    {
        //ユーザーデータの用意
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('signs.create', ['user_id' => $user->id]));

        $response->assertStatus(200);
    }
}
