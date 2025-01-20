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
        $user = User::factory()->create();

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
        $user = User::factory()->create();

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

    /**
     * 体調の編集画面の表示テスト
     */
    public function test_the_condition_edit_page_display_successful()
    {
        //外部キー制約を無効化
        Schema::disableForeignKeyConstraints();

        //ユーザーデータの用意
        $user = User::factory()->create();

        //体調データの用意
        $condition = new Condition();
        $condition->id = 1;
        $condition->user_id = 1;
        $condition->date = now()->format('Y-m-d');
        $condition->sleep_time = '2024-01-08 00:30:00';
        $condition->wakeup_time = '2024-01-08 08:30:00';
        $condition->exercise = 'スクワット10回';
        $condition->breakfast = 'ヨーグルト、バナナ';
        $condition->lunch = 'ラーメン';
        $condition->dinner = 'ぶりの照り焼き';
        $condition->comment = '一日中眠気に襲われた。';
        $condition->sleep_duration = '08:00:00';
        $condition->save();

        $response = $this->actingAs($user)->get(route('conditions.edit', ['user_id' => $user->id, 'condition_id' => $condition->id]));
        $response->assertStatus(200);

        //外部キー制約を有効化
        Schema::enableForeignKeyConstraints();
    }

    /**
     * 体調の更新機能テスト
     */
    public function test_condition_can_be_updated()
    {
        //外部キー制約を無効化
        Schema::disableForeignKeyConstraints();

        //ユーザーデータの用意
        $user = User::factory()->create();

        //体調データの用意
        $condition = new Condition();
        $condition->id = 1;
        $condition->user_id = 1;
        $condition->date = now()->format('Y-m-d');
        $condition->sleep_time = '2024-01-08 00:30:00';
        $condition->wakeup_time = '2024-01-08 08:30:00';
        $condition->exercise = 'スクワット10回';
        $condition->breakfast = 'ヨーグルト、バナナ';
        $condition->lunch = 'ラーメン';
        $condition->dinner = 'ぶりの照り焼き';
        $condition->comment = '一日中眠気に襲われた。';
        $condition->sleep_duration = '08:00:00';
        $condition->save();

        //更新データをPOSTメソッドで送信
        $condition = [
            'user_id' => 1,
            'sleep_time' => '2024-01-08 00:00:00',
            'wakeup_time' => '2024-01-08 08:30:00',
            'exercise' => '背筋20回',
            'breakfast' => '食パン1切れ',
            'lunch' => 'スパゲティ',
            'dinner' => 'カツカレー',
            'comment' => 'よく眠ることができ、一日中活動的に過ごせた。',
            'sleep_duration' => '08:30:00'
        ];
        $this->actingAs($user)->put(route('conditions.update', ['user_id' => 1, 'condition_id' => 1]), $condition);

        //送信したデータがconditionsテーブルに保存されているか検証
        $this->assertDatabaseHas('conditions', $condition);

        //外部キー制約を有効化
        Schema::enableForeignKeyConstraints();
    }

    /**
     * 体調の削除機能テスト
     */
    public function test_condition_can_be_deleted()
    {
        //外部キー制約を無効化
        Schema::disableForeignKeyConstraints();

        //ユーザーデータの用意
        $user = User::factory()->create();

        //体調データの用意
        $condition = new Condition();
        $condition->id = 1;
        $condition->user_id = $user->id;
        $condition->date = now()->format('Y-m-d');
        $condition->sleep_time = '2024-01-08 00:30:00';
        $condition->wakeup_time = '2024-01-08 08:30:00';
        $condition->exercise = 'スクワット10回';
        $condition->breakfast = 'ヨーグルト、バナナ';
        $condition->lunch = 'ラーメン';
        $condition->dinner = 'ぶりの照り焼き';
        $condition->comment = '一日中眠気に襲われた。';
        $condition->sleep_duration = '08:00:00';
        $condition->save();

        $this->actingAs($user)->delete(route('conditions.destroy', ['user_id' => $user->id, 'condition_id' => $condition->id]));

        //保存したデータがconditionsテーブルから削除されているか検証
        $this->assertDatabaseMissing('conditions', ['id' => $condition->id]);

        //外部キー制約を有効化
        Schema::enableForeignKeyConstraints();
    }
}
