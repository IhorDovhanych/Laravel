<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    use hasFactory;
    protected $table = 'students';
    protected $fillable = [
        'full_name',
        'course',
        'specialization'
    ];
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

}
