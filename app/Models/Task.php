<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Middleware;


class Task extends Model
{
    use HasFactory;
    protected $hidden =[
        "id",
        "user_id",
    ];
    protected $table = 'tasks';
    
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'status',
        'category_id',
    ];
    // Contoh untuk Laravel
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }
    public function category()
    {
    return $this->belongsTo(Category::class);
    }

}