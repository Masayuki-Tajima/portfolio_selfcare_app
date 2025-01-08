<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Condition;
use App\Models\Sign;
use App\Models\User;
use Illuminate\Support\Facades\Schema;

class ConditionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_condition_can_be_created()
    {
        //外部キー制約を無効化
        Schema::disableForeignKeyConstraints();

        //ユーザーデータの用意
        $user = new User();
        $user->id = 1;
        $user->name = 'Yamada';
        $user->email = 'yamada_test@example.com';
        $user->password = 'passya123';
        $user->save();

        //体調のデータをPOSTメソッドで送信
        $condition = [
            'user_id' => 1,
            'date' => '2024-01-08',
            'sleep_time' => '2024-01-08 00:30:00',
            'wakeup_time' => '2024-01-08 08:30:00',
            'exercise' => 'スクワット10回',
            'breakfast' => 'ヨーグルト、バナナ',
            'lunch' => 'ラーメン',
            'dinner' => 'ぶりの照り焼き',
            'comment' => '一日中眠気に襲われた。',
            'sleep_duration' => '08:00:00'
        ];
        $this->actingAs($user)->post(route('conditions.store', ['user_id' => 1]), $condition);

        //送信したデータがconditionsテーブルに保存されているか検証
        $this->assertDatabaseHas('conditions', $condition);

        //外部キー制約を有効化
        Schema::enableForeignKeyConstraints();
    }
}
