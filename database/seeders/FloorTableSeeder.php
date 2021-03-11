<?php

namespace Database\Seeders;

use App\Models\Floor;
use Illuminate\Database\Seeder;

class FloorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array = [
            [
                'name' => '前転',
                'first' => '前回り~体操すわり',
                'second' => '坂道前転',
                'third' => '坂道前回り~体操すわり',
            ],
            [
                'name' => 'ブリッジ',
                'first' => '瞬時',
                'second' => '頭つき',
                'third' => '肩つき',
            ],
            [
                'name' => '後転',
                'first' => 'うしろにまわれる',
                'second' => '坂道後転',
                'third' => '坂道でうしろにまわれる',
            ],
            [
                'name' => '開脚前転・後転',
                'first' => '坂道開脚後転',
                'second' => '坂道開脚前転',
            ],
            [
                'name' => 'カベ倒立',
                'first' => 'せなかカベ倒立5秒',
                'second' => 'おなかカベ倒立5秒',
                'third' => 'トンネル5秒',
            ],
            [
                'name' => '側転',
                'first' => '縦向き側転横回り',
                'second' => 'よこむき側転',
                'third' => '直立~キックカベ倒立',
            ],
            [
                'name' => '逆立ち前回り',
                'first' => '補助倒立前転',
                'second' => '3点倒立(屈伸・伸身)',
            ],
            [
                'name' => 'ヘッドスプリング',
                'first' => '3点倒立~ブリッジ',
                'second' => '台~ヘッドスプリング',
                'second' => 'ひざ立てブリッジ',
            ],
            [
                'name' => '転回',
                'first' => '補助あり',
                'second' => '側転前向き立ち',
                'third' => 'その場倒立倒れ込み',
            ],
            [
                'name' => 'バク転',
                'first' => '補助あり',
                'second' => 'ジャンプまっすぐねる',
                'third' => '伸膝後転',
            ],
            [
                'name' => '片足転回',
                'first' => '補助あり',
                'second' => '片足前方ブリッジ',
                'third' => '片ひざ立てブリッジ',
            ],
            [
                'name' => '転回連続',
                'first' => '補助あり',
                'second' => '側転1/4~転回',
                'third' => '側転1/4~倒れ込み',
            ],
            [
                'name' => 'ロンダート',
                'first' => '1/2倒立(補助)',
                'second' => 'たて向き側転',
                'third' => 'ひざ立て~側転',
            ],
            [
                'name' => 'ロンダート',
                'first' => '補助あり',
                'second' => 'ロンダート~止まってバク転',
                'third' => 'ロンダート~ジャンプねる',
            ],
            [
                'name' => '宙返り',
                'first' => '補助あり',
                'second' => '台にジャンプのる',
            ],
        ];


        foreach ($array as $item) {
            $FloorRow = new Floor();
            $FloorRow->name = $item['name'];
            $FloorRow->first_description = $item['first'];
            $FloorRow->second_description = $item['second'];
            if (isset($item['third'])) {
                $FloorRow->third_description = $item['third'];
            }
            $FloorRow->save();
        }
    }
}
