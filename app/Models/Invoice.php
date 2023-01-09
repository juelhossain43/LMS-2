<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $fillable=[
        'due_date',
        'paid_date',
        'user_id',
    ];
    public function item(){
        return $this->hasMany(InvoiceItem::class);
    }
}
