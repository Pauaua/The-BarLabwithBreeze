<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Los atributos que se pueden asignar masivamente.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'rut',
        'birthdate',
        'email',
        'password',
        'role', // Aseguramos que está aquí
        'email_verified_at',
        'remember_token',
    ];

    /**
     * Los atributos que deben ocultarse para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Mutaciones de atributos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'role' => 'string', // Asegura que el rol sea string
        ];
    }

    /**
     * Valor por defecto para el campo 'role'.
     *
     * @return array<string, mixed>
     */
    protected $attributes = [
        'role' => 'student', // Valor por defecto
    ];

    // -----------------------------
    // Métodos auxiliares para roles
    // -----------------------------

    /**
     * Verifica si el usuario tiene un rol específico.
     *
     * @param string $role
     * @return bool
     */
    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    /**
     * Verifica si el usuario es admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->hasRole('admin');
    }

    /**
     * Verifica si el usuario es instructor.
     *
     * @return bool
     */
    public function isInstructor(): bool
    {
        return $this->hasRole('instructor');
    }

    /**
     * Verifica si el usuario es estudiante.
     *
     * @return bool
     */
    public function isStudent(): bool
    {
        return $this->hasRole('student');
    }

    // -----------------------------
    // Relaciones
    // -----------------------------

    /**
     * Cursos donde el usuario es instructor.
     */
    public function coursesAsInstructor()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    /**
     * Inscripciones del usuario.
     */
    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    /**
     * Cursos a los que el usuario está inscrito.
     */
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'enrollments');
    }
}