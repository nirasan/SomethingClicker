<?php

class Gacha extends AppModel {
    public $name = 'Gacha';

    public function lottery() {
        $gachas = $this->find('all');
        
        # 抽選優先度の合計を求める
        $total = 0;
        foreach ($gachas as $gacha) {
            $total += $gacha['Gacha']['priority'];
        }
        
        # 抽選する
        $lotted = mt_rand(1, $total);
        $curr = 0;
        foreach ($gachas as $gacha) {
            $curr += $gacha['Gacha']['priority'];
            if ($curr >= $lotted) {
                return $gacha;
            }
        }
    }
}
