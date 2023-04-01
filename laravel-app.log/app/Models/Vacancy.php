<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Vacancy extends Model
{
    use HasFactory;
    protected $table = "vacancy";
    protected $fillable = [
      'company_name',
      'position',
      'salary'
    ];

    public function candidate() : BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }
}
