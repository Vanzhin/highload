<?php

namespace App\Services;


class SortService
{
    public function arraySort(array $array, string $type = null): array
    {
        switch ($type) {
            case 'bubble':
                $swapped = true;
                $n = count($array);
                while ($swapped) {
                    $swapped = false;
                    for ($i = 0; $i < $n - 1; $i++)
                    {
                        if ($array[$i] > $array[$i + 1])
                        {
                            $temp = $array[$i];
                            $array[$i] = $array[$i + 1];
                            $array[$i + 1] = $temp;
                            $swapped = true;
                        }
                    }
                }
                break;
            default:
                sort($array);
        }
        return $array;
    }

}
