<?php
   namespace App\Models;

   use Illuminate\Database\Eloquent\Factories\HasFactory;
   use Illuminate\Database\Eloquent\Model;
   use Illuminate\Database\Eloquent\SoftDeletes;

    class Job extends Model
    {
        use HasFactory;

       protected $fillable = [
        'title',
        'type',
        'designation',
        'applications',
        'duration',
        'description',
    ];


        public static function boot()
        {
            parent::boot();

            static::creating(function ($job) {
                $job->created_at = now();
                $job->updated_at = null; // prevent setting updated_at during creation
            });

            static::updating(function ($job) {
                $job->updated_at = now(); // set updated_at only on update
            });
        }
    }
