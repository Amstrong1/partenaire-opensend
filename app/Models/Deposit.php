<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;

    protected $table = 'recharges';

    protected $append = ['formatted_date'];

    /**
     * @return string
     */
    public function getFormattedDateAttribute()
    {
        return getFormattedDateHour($this->created_at);
    }

}
