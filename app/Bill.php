<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Bill extends Model
{
    protected $fillable = [
        'name',
        'description',
        'amount',
        'due_date',
        'due_month',
        'autopay',
        'account_id',
    ];

    public function account()
    {
        return $this->belongsTo('App/Account');
    }

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = $value * 100;
    }

    public function getAmountAttribute($value)
    {
        return $value / 100;
    }

    public function isPaid()
    {
        return $this->attributes['paid'] === 1;
    }

    public function isDue()
    {
        return $this->attributes['paid'] !== 1;
    }

    public function isPastDue()
    {
        $now = Carbon::now();

        if ($this->isDue()) {
            $now = Carbon::now();

            if ($this->attributes['due_month'] === 0) {
                // today's date is after the due date
                return $now->day > $this->attributes['due_date'];
            } else {
                /**
                 * This month is after the due month
                 * or this month is the same as the due month and today's date is past the due date
                 */
                return $now->month > $this->attributes['due_month'] 
                    || $now->month === $this->attributes['due_month'] && $now->day > $this->attributes['due_date'];
            }
        }
    }

    public function isDueToday()
    {
        if ($this->isDue()) {
            $now = Carbon::now();

            if ($this->attributes['due_month'] === 0) {
                // today's date is the due date
                return $now->day === $this->attributes['due_date'];
            } else {
                // today's date is the due date and the current month is the due month
                return $now->month === $this->attributes['due_month'] && $now->day === $this->attributes['due_date'];   
            }
        }
    }

    public function dueDateWithSuffix()
    {
        $dueDate = new Carbon("2019-01-{$this->attributes['due_date']}", 'America/Chicago');

        return $dueDate->format('jS');
    }

    public function getMonthName()
    {
        switch ($this->attributes['due_month']) {
            case 0:
                return;
            case 1:
                return 'January';
            case 2:
                return 'February';
            case 3:
                return 'March';
            case 4:
                return 'April';
            case 5:
                return 'May';
            case 6:
                return 'June';
            case 7:
                return 'July';
            case 8:
                return 'August';
            case 9:
                return 'September';
            case 10:
                return 'October';
            case 11:
                return 'November';
            case 12:
                return 'December';
        }
    }
}
