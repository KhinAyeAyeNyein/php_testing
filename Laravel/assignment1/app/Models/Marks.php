<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Marks extends Model
    {
        use SoftDeletes;
        protected $fillable = [
            'student_id',
            'Myanmar',
            'English',
            'Mathematics',
            'Chemistry',
            'Physics',
            'Biology',
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    }
?>
