<?php
namespace HylianShield\NumberGenerator;

use Generator;

class NumberGenerator implements NumberGeneratorInterface
{
    /**
     * Generate a list of the given size, ranging between min and max.
     *
     * @param int $size
     * @param int $min
     * @param int $max
     *
     * @yield  int
     * @return Generator
     */
    public function generateList(
        int $size,
        int $min = 0,
        int $max = PHP_INT_MAX
    ): Generator {
        $size = abs($size);

        for ($i = 0; $i < $size; $i++) {
            yield $this->generateNumber($min, $max);
        }
    }

    /**
     * Generate a number between min and max.
     *
     * @param int $min
     * @param int $max
     *
     * @return int
     */
    public function generateNumber(int $min = 0, int $max = PHP_INT_MAX): int
    {
        return random_int($min, $max);
    }
}
