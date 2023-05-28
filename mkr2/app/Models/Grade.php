<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grade extends Model
{
    use hasFactory;
    protected $table = 'grades';
    protected $fillable = [
        'lesson_name',
        'grade',
        'grade_date',
        'student_id',
    ];
    public function student()
    {
        return $this->belongsTo(Student::class, 'journal_id', 'id');
    }
}
