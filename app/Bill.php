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

        return $now->day > $this->attributes['due_date'] && $this->isDue();
    }

    public function isDueToday()
    {
        $now = Carbon::now();

        return $now->day === $this->attributes['due_date'] && $this->isDue();
    }

    public function dueDateWithSuffix()
    {
        $dueDate = new Carbon("2019-01-{$this->attributes['due_date']}", 'America/Chicago');

        return $dueDate->format('jS');
    }
}
