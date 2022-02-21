<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Employee
 *
 * @property int $id
 * @property int $emp_no
 * @property string $birth_date
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $hire_date
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Employee newModelQuery()
 * @method static Builder|Employee newQuery()
 * @method static Builder|Employee query()
 * @method static Builder|Employee whereBirthDate($value)
 * @method static Builder|Employee whereCreatedAt($value)
 * @method static Builder|Employee whereEmpNo($value)
 * @method static Builder|Employee whereFirstName($value)
 * @method static Builder|Employee whereGender($value)
 * @method static Builder|Employee whereHireDate($value)
 * @method static Builder|Employee whereId($value)
 * @method static Builder|Employee whereLastName($value)
 * @method static Builder|Employee whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Employee extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = "emp_no";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $fillable = [
        'emp_no',
        'birth_date',
        'first_name',
        'last_name',
        'gender',
        'hire_date'
    ];

    public function salaries()
    {
        return $this->hasMany(Salary::class, 'emp_no', 'emp_no');
    }

    public function designations()
    {
        return $this->hasMany(Designation::class, 'emp_no', 'emp_no');
    }


}
