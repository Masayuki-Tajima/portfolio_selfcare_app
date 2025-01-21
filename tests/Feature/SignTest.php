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

    /**
     * 体調サインの新規登録機能テスト
     */
    public function test_sign_can_be_created()
    {
        //外部キー制約を無効化
        Schema::disableForeignKeyConstraints();

        //ユーザーデータの用意
        $user = User::factory()->create();

        //体調サインのデータをPOSTメソッドで送信
        $sign = [
            'user_id' => $user->id,
            'sign' => '咳が出る',
            'sign_type' => 1,
        ];
        $this->actingAs($user)->post(route('signs.store', ['user_id' => $user->id]), $sign);

        //送信したデータがconditionsテーブルに保存されているか検証
        $this->assertDatabaseHas('signs', $sign);

        //外部キー制約を有効化
        Schema::enableForeignKeyConstraints();
    }

    /**
     * 体調サインの削除機能テスト
     */
    public function test_sign_can_be_deleted()
    {
        //外部キー制約を無効化
        Schema::disableForeignKeyConstraints();

        //ユーザーデータの用意
        $user = User::factory()->create();

        //体調サインデータの用意
        $sign = new Sign();
        $sign->id = 1;
        $sign->user_id = $user->id;
        $sign->sign = '咳が出る';
        $sign->sign_type = 1;
        $sign->save();

        $this->actingAs($user)->delete(route('signs.destroy', ['user_id' => $user->id, 'sign_id' => $sign->id]));

        //保存したデータがsignsテーブルから論理除されているか検証
        $this->assertSoftDeleted('signs', ['id' => $sign->id]);

        //外部キー制約を有効化
        Schema::enableForeignKeyConstraints();
    }

}
