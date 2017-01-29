<?php
namespace HylianShield\NumberGenerator\Tests;

use HylianShield\NumberGenerator\NumberGenerator;

/**
 * @coversDefaultClass \HylianShield\NumberGenerator\NumberGenerator
 */
class NumberGeneratorTest extends \PHPUnit_Framework_TestCase
{
    /** @var NumberGenerator */
    private $generator;

    /**
     * Get the internal number generator,
     *
     * @return NumberGenerator
     */
    public function getGenerator(): NumberGenerator
    {
        if ($this->generator === null) {
            $this->generator = new NumberGenerator();
        }

        return $this->generator;
    }

    /**
     * @return int[][]
     */
    public function rangeProvider(): array
    {
        $number = PHP_INT_MIN;
        $calls  = [];

        while ($number <= PHP_INT_MAX) {
            $calls[] = [PHP_INT_MIN, $number];
            $calls[] = [$number, PHP_INT_MAX];

            $number++;

            if ($number < 0) {
                $number = intval($number / 16);
            } else {
                $number *= 16;
            }
        }

        return $calls;
    }

    /**
     * @dataProvider rangeProvider
     *
     * @param int $min
     * @param int $max
     *
     * @return int
     * @covers ::generateNumber
     */
    public function testGenerateNumber(int $min, int $max): int
    {
        return $this->getGenerator()->generateNumber($min, $max);
    }

    /**
     * @return int[][]
     */
    public function listProvider(): array
    {
        $ranges = $this->rangeProvider();
        $calls  = [];

        foreach (range(1, 3) as $size) {
            foreach ($ranges as $range) {
                $calls[] = array_merge([$size], $range);
            }
        }

        return $calls;
    }

    /**
     * @dataProvider listProvider
     *
     * @param int $size
     * @param int $min
     * @param int $max
     *
     * @return void
     * @covers ::generateList
     */
    public function testGetList(int $size, int $min, int $max)
    {
        $generator = $this->getGenerator();
        $list      = [];

        /** @noinspection PhpVoidFunctionResultUsedInspection */
        foreach ($generator->generateList($size, $min, $max) as $number) {
            $this->assertInternalType('integer', $number);
            $list[] = $number;
        }

        $this->assertCount($size, $list);
    }
}
