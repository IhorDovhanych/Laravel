<?php

namespace App\Http\Resources;

use App\Models\Grade;
use Illuminate\Database\Eloquent\Casts\ArrayObject;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $allGrades = Grade::all();
        $studentGrades = new ArrayObject();
        foreach ($allGrades as $grade){
            if($grade->student_id == $this->id){
                $studentGrades->append($grade);
            }
        }
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'course' => $this->course,
            'specialization' => $this->specialization,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_id' => $this->user_id,
            'grades_count' => count($studentGrades),
            'grades' => $this->when(request()->route()->getName() == 'student.id', $studentGrades)
        ];
    }
}
