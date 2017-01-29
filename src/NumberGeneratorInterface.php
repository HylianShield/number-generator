<?php
namespace HylianShield\NumberGenerator;

interface NumberGeneratorInterface
{
    /**
     * Generate a list of the given size, ranging between min and max.
     *
     * @param int $size
     * @param int $min
     * @param int $max
     *
     * @yield  int
     * @return void
     */
    public function generateList(
        int $size,
        int $min = 0,
        int $max = PHP_INT_MAX
    );

    /**
     * Generate a number between min and max.
     *
     * @param int $min
     * @param int $max
     *
     * @return int
     */
    public function generateNumber(int $min = 0, int $max = PHP_INT_MAX): int;
}
