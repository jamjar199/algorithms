<?php

namespace App\Algorithms;

class BinarySearch
{
    /** @var int $low */
    private $low;

    /** @var int $high */
    private $high;

    /**
     * Binary Search Implementation for integers
     *
     * @param array $sortedData
     * @param int $target
     * @return int|mixed|null
     */
    public function find(array $sortedData, int $target)
    {
        $this->setUp($sortedData);

        while ($this->low <= $this->high) {

            $mid = $this->getMidpoint();
            $guess = $sortedData[$mid];

            if ($guess === $target) {

                dd([
                    'guess' => $guess,
                    'mid' => $mid,
                    'target' => $target
                ]);

                return $mid;
            }

            $this->setRange($guess, $mid, $target);
        }

        return null;
    }

    /**
     * Set up search
     *
     * @param array $sortedData
     */
    private function setUp(array $sortedData)
    {
        $this->low = 0;
        $this->high = count($sortedData) -1;
    }

    /**
     * Finds the midpoint
     * Rounds down any decimals and removed leading zeros
     *
     * @return float
     */
    private function getMidpoint()
    {
        return (int) floor(($this->low + $this->high) / 2);
    }

    /**
     * Set up new range from previous guess
     *
     * @param int $guess
     * @param int $mid
     * @param int $target
     */
    private function setRange(int $guess, int $mid, int $target)
    {
        if ($guess > $target) {
            $this->high = $mid - 1;
        }

        if ($guess < $target) {
            $this->low = $mid + 1;
        }
    }
}
