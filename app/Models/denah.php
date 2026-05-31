<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Denah extends Model
{
    protected $table = 'denah';

    protected $primaryKey = 'denah_id';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'denah_id',
        'blok',
        'tenant_id',
        'posisi_x',
        'posisi_y',
    ];

    public function tenant()
    {
        return $this->belongsTo(
            Tenant::class,
            'tenant_id',
            'tenant_id'
        );
    }
}
