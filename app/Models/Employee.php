<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employees';
    protected $fillable = [
        'name',
        'address',
        'email',
        'no_tlp',
        'company',
    ];

    public function companyFrom(): BelongsTo
    {
        return $this->belongsTo(Company::class, 'id_company');
    }
}