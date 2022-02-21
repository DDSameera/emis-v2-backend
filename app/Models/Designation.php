<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "titles";

    protected $fillable = [
        'emp_no',
        'title',
        'from_date',
        'to_date',
    ];

    public function employee()
    {
        return $this->belongsTo(Designation::class, 'emp_no');
    }


}
