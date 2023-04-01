<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory;
    protected $table="candidates";
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'birth_year',
        'education',
        'specialization',
        'vacancy_list'
    ];

    public function vacancies() : HasMany
    {
        return $this->hasMany(Vacancy::class);
    }
}
