<?php

namespace Database\Seeders;

use App\Models\VaultingHourse;
use Illuminate\Database\Seeder;

class VaultingHourseTableSeeder extends Seeder
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
                'name' => '両足ジャンプ(1段)',
                'first' => 'とび箱にのれる',
                'second' => 'フープに両足ジャンプ',
                'third' => 'うさぎジャンプ(その場)',
            ],
            [
                'name' => 'ロイター板ジャンプ',
                'first' => '走ってフープジャンプ',
                'second' => 'ケンケングー',
                'third' => 'その場両足ジャンプ(2段)',
            ],
            [
                'name' => '4段開脚とび(よこ)',
                'first' => 'その場開脚とび',
                'second' => 'その場開脚のり',
                'third' => 'ロイタージャンプ2段',
            ],
            [
                'name' => '4段台上前転(たて)',
                'first' => '低い台に走って台上前転',
                'second' => '低い台にその場台上前転',
                'third' => 'ロイタージャンプ3段',
            ],
            [
                'name' => '4段開脚とび(よこ)',
                'first' => 'その場閉脚とび',
                'second' => 'その場閉脚のり',
                'third' => 'ロイタージャンプ4段',
            ],
            [
                'name' => '6段開脚とび(たて)',
                'first' => 'その場開脚とび',
                'second' => 'その場開脚のり',
                'third' => 'ロイタージャンプ6段',
            ],
            [
                'name' => '6段台上前転(たて)',
                'first' => '低い台に走って台上前転',
                'second' => '低い台にその場台上前転',
                'third' => 'ロイタージャンプ6段',
            ],
            [
                'name' => '倒れ込み(2段)',
                'first' => '屈伸ジャンプ倒立~倒れる',
                'second' => 'かかえジャンプ倒立~倒れる',
                'second' => '倒立~倒れ込み(床)',
            ],
            [
                'name' => '4段転回とび',
                'first' => '4段転回とび',
            ],
            [
                'name' => '6段転回とび',
                'first' => '6段倒れ込み',
            ],
            [
                'name' => 'とび込み前転',
                'first' => '補助あり',
                'second' => 'その場とび込み前転',
            ],
            [
                'name' => 'かかえ込み前宙',
                'first' => '補助あり',
                'second' => 'かかえ込みジャンプ連続',
            ],
            [
                'name' => 'ロンダート',
                'first' => '1/2倒立(補助)',
                'second' => 'たて向き側転',
                'third' => 'ひざ立て~側転',
            ],
            [
                'name' => '屈伸前宙',
                'first' => '補助あり',
                'second' => '伸膝前転',
            ],
            [
                'name' => '伸身前宙',
                'first' => '補助あり',
                'second' => 'ゆりかご(手の操作)',
            ],
        ];


        foreach ($array as $item) {
            $VaultingHourseRow = new VaultingHourse();
            $VaultingHourseRow->name = $item['name'];
            $VaultingHourseRow->first_description = $item['first'];
            if (isset($item['second'])) {
                $VaultingHourseRow->second_description = $item['second'];
            }
            if (isset($item['third'])) {
                $VaultingHourseRow->third_description = $item['third'];
            }
            $VaultingHourseRow->save();
        }
    }
}
