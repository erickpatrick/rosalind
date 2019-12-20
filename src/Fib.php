<?php 

declare(strict_types=1);

namespace Acme;

class Fib 
{
    public function rabbitsRecurrenceRelations($n, $k)
    {
        $months = [1, 1];
        for ($i = 2; $i < $n; $i += 1) {
            $months[$i] = $months[$i - 1] + ($months[$i - 2] * $k);
        }

        return $months[$n - 1];
    }
}