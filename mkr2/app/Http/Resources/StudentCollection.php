<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
//        $collection = $this->collection;
//        for($i = 0; $i < count($collection); $i = $i + 1){
//            unset($collection[$i]['grades']);
//        }
        return [
            'data' => $this->collection,
        ];
    }
}
