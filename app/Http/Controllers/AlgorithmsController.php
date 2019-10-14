<?php

namespace App\Http\Controllers;

use App\Algorithms\BinarySearch;

class AlgorithmsController extends Controller
{
    /**
     * Carry out a binary search on test data
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function binarySearch()
    {
        $orderedData = [1, 3, 4, 99, 110, 120, 130, 135, 136, 140, 147, 150];
        $target = $orderedData[
            array_rand($orderedData)
        ];

        $binarySearch = new BinarySearch;
        $position = $binarySearch->find($orderedData, $target);

        return response()->json([
            'orderedData' => $orderedData,
            'target' => $target,
            'position' => $position,
        ]);
    }
}
