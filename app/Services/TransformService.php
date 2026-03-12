<?php

namespace App\Services;

use App\Models\Transform;
use Illuminate\Support\Facades\DB;
use Exception;

class TransformService
{
    private const ORIGINAL = "1234567890qwertyuiopasdfghjkl;zxcvbnm,./";
    private $keyboard;
    public function __construct()
    {
        $this->keyboard = str_split(self::ORIGINAL);
    }
    public function transform($transforms, $text)
    {
        DB::beginTransaction();
        try {
            foreach ($transforms as $t) {
                if ($t === 'H') {
                    $this->horizontalFlip();
                }
                elseif ($t === 'V') {
                    $this->verticalFlip();
                }
                elseif (is_numeric($t)) {
                    $this->shift((int)$t);
                }
            }
            $result = $this->transformText($text);
            Transform::create([
                'transforms' => implode(',', $transforms),
                'input_text' => $text,
                'output_text' => $result
            ]);
            DB::commit();
            return $result;

        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('Transform gagal: ' . $e->getMessage());
        }
    } 

    private function horizontalFlip()
    {
        for ($i = 0; $i < 40; $i += 10) {
            $row = array_slice($this->keyboard, $i, 10);
            $row = array_reverse($row);
            array_splice($this->keyboard, $i, 10, $row);
        }
    }

    private function verticalFlip()
    {
        $rows = array_chunk($this->keyboard, 10);
        $rows = array_reverse($rows);
        $this->keyboard = array_merge(...$rows);
    }

    private function shift($n)
    {
        $len = count($this->keyboard);
        $n = $n % $len;
        if ($n > 0) {
            $this->keyboard = array_merge(
                array_slice($this->keyboard, -$n),
                array_slice($this->keyboard, 0, $len - $n)
            );
        } elseif ($n < 0) {
            $n = abs($n);
            $this->keyboard = array_merge(
                array_slice($this->keyboard, $n),
                array_slice($this->keyboard, 0, $n)
            );
        }
    }

    private function transformText($text)
    {

        $original = str_split(self::ORIGINAL);
        $map = array_combine($original, $this->keyboard);
        return strtr($text, $map);
    }

}