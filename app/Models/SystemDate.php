<?php

namespace App\Models;

use App\Support\HasAdvancedFilter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use \DateTimeInterface;

class SystemDate extends Model
{
    use HasAdvancedFilter, SoftDeletes, HasFactory;

    public $table = 'system_dates';

    protected $orderable = [
        'id',
        'branch.name_en',
        'current_system_date',
        'next_system_date',
        'next_week_end',
        'next_month_end',
        'next_year_end',
        'previous_year_end',
        'previous_month_end',
    ];

    protected $filterable = [
        'id',
        'branch.name_en',
        'current_system_date',
        'next_system_date',
        'next_week_end',
        'next_month_end',
        'next_year_end',
        'previous_year_end',
        'previous_month_end',
    ];

    protected $dates = [
        'current_system_date',
        'next_system_date',
        'next_week_end',
        'next_month_end',
        'next_year_end',
        'previous_year_end',
        'previous_month_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'branch_id',
        'current_system_date',
        'next_system_date',
        'next_week_end',
        'next_month_end',
        'next_year_end',
        'previous_year_end',
        'previous_month_end',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function getCurrentSystemDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setCurrentSystemDateAttribute($value)
    {
        $this->attributes['current_system_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getNextSystemDateAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setNextSystemDateAttribute($value)
    {
        $this->attributes['next_system_date'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getNextWeekEndAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setNextWeekEndAttribute($value)
    {
        $this->attributes['next_week_end'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getNextMonthEndAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setNextMonthEndAttribute($value)
    {
        $this->attributes['next_month_end'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getNextYearEndAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setNextYearEndAttribute($value)
    {
        $this->attributes['next_year_end'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPreviousYearEndAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setPreviousYearEndAttribute($value)
    {
        $this->attributes['previous_year_end'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getPreviousMonthEndAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('project.date_format')) : null;
    }

    public function setPreviousMonthEndAttribute($value)
    {
        $this->attributes['previous_month_end'] = $value ? Carbon::createFromFormat(config('project.date_format'), $value)->format('Y-m-d') : null;
    }
}
