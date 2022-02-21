<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Salary
 *
 * @property int $id
 * @property int $emp_no
 * @property int $salary
 * @property string $from_date
 * @property string $to_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Salary newModelQuery()
 * @method static Builder|Salary newQuery()
 * @method static Builder|Salary query()
 * @method static Builder|Salary whereCreatedAt($value)
 * @method static Builder|Salary whereEmpNo($value)
 * @method static Builder|Salary whereFromDate($value)
 * @method static Builder|Salary whereId($value)
 * @method static Builder|Salary whereSalary($value)
 * @method static Builder|Salary whereToDate($value)
 * @method static Builder|Salary whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Salary extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "emp_no",
        "salary",
        "from_date",
        "to_date"
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_no');
    }


}
