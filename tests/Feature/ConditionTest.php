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
     * 体調の新規登録画面の表示テスト
     */
    public function test_the_condition_create_page_display_successful()
    {
        //ユーザーデータの用意
        $user = new User();
        $user->id = 1;
        $user->name = 'Yamada';
        $user->email = 'yamada_test@example.com';
        $user->password = 'passya123';
        $user->save();

        $response = $this->actingAs($user)->get(route('conditions.create', ['user_id' => $user->id]));

        $response->assertStatus(200);
    }

    /**
     * 体調の新規登録機能テスト
     */
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
            'date' => now()->format('Y-m-d'),
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
