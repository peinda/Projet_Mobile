<?php


namespace App\Service;


class compteService
{
    private function randomNumberSequence($requiredLength = 7, $highestDigit = 9) {
        $sequence = '';
        for ($i = 0; $i < $requiredLength; ++$i) {
            $sequence .= mt_rand(0, $highestDigit);
        }
        return $sequence;
    }
    public function genererNumeroCompte(){
        $codeTrans = $this->randomNumberSequence(4,9)."-".$this->randomNumberSequence(3,9)."-".$this->randomNumberSequence(2,9);
        return $codeTrans;
    }
}
