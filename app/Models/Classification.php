<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Classification extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'test_minat_bakat',
        'test_psikotes',
        'test_numerik',
        'result',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class);
    }
}
