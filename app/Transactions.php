<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $fillable = ['amount', 'id_client','transaction_date'];
}
