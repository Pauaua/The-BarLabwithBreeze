<?php
// app/Models/Course.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'image_url', 'start_date', 'duration_weeks', 'instructor_id', 'published_status'
    ];

    // Relaciones
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }
}