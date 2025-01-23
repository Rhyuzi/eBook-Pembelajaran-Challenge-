<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     * (Optional if table name is not plural of the model name)
     */
    protected $table = 'ebooks';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',      // Nama eBook
        'file_path', // Path ke file PDF
    ];

    /**
     * Indicates if the model should be timestamped.
     */
    public $timestamps = true; // Jika ada created_at dan updated_at
}
