<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\SoftDeletes;

    class Students extends Model
    {
        use SoftDeletes;
        protected $fillable = [
        'name',
        'roll_Number',
        'class',
        'dob',
        ];
    
        protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    }
?>