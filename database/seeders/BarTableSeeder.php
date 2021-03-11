<?php

namespace Database\Seeders;

use App\Models\Bar;
use Illuminate\Database\Seeder;

class BarTableSeeder extends Seeder
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
                'name' => 'ぶら下がり',
                'first' => '5秒ぶら下がる',
                'second' => '瞬時ぶら下がり',
            ],
            [
                'name' => 'つばめ~前回りおり',
                'first' => 'つばめ~前に回れる',
                'second' => 'ジャンプ~つばめ',
                'third' => 'つばめができる',
            ],
            [
                'name' => '足抜きまわり',
                'first' => '足抜き(片道)',
                'second' => '鉄棒に足タッチ',
            ],
            [
                'name' => '懸垂肘曲げ5秒',
                'first' => '足を高くして5秒キープ',
                'second' => 'エレベーター5秒キープ',
                'third' => 'エレベーター3秒キープ',
            ],
            [
                'name' => '逆上がり',
                'first' => '補助あり',
                'second' => '逆上がり~ふとん',
                'third' => 'つばめ~もとどおり',
            ],
            [
                'name' => '後ろ回り',
                'first' => '補助あり',
                'second' => 'つばめスイング',
                'third' => 'つばめヨコ移動',
            ],
            [
                'name' => 'ふみこしおり',
                'first' => '補助あり',
                'second' => 'つばめでの手の持ちかえ(順手~逆手、坂手~逆手)',
            ],
            [
                'name' => '前回り',
                'first' => '補助あり',
                'second' => '肘を伸ばして前回りおり',
            ],
            [
                'name' => 'とびこしおり',
                'first' => '補助あり',
                'second' => '片逆手でつばめスイング',
                'third' => '膝を伸ばしてつばめスイング',
            ],
            [
                'name' => '後ろ回り連続',
                'first' => '補助あり',
                'second' => 'ジャンプ逆上がり',
                'third' => 'スイング1回~後ろ回り',
            ],
            [
                'name' => '前回り~即後ろ回り',
                'first' => '補助あり',
                'second' => '前回り~つばめスイング',
            ],
            [
                'name' => '前回り連続',
                'first' => '補助あり',
                'second' => 'ジャンプ逆上がり',
                'third' => 'スイング1回~後ろ回り',
            ],
            [
                'name' => '屈伸前回り',
                'first' => '補助あり',
                'second' => '肘・膝を伸ばして前回りおり',
            ],
            [
                'name' => '屈伸前回り連続',
                'first' => '補助あり',
                'second' => '屈伸前回り~屈伸前回りおり',
            ],
            [
                'name' => '自由演技',
                'first' => '上がり技',
                'second' => '中技3つ',
                'third' => 'おり技',
            ],
        ];


        foreach ($array as $item) {
            $BarRow = new Bar();
            $BarRow->name = $item['name'];
            $BarRow->first_description = $item['first'];
            $BarRow->second_description = $item['second'];
            if (isset($item['third'])) {
                $BarRow->third_description = $item['third'];
            }
            $BarRow->save();
        }
    }
}
