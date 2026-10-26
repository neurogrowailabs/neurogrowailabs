<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConsentLog extends Model
{
    use HasFactory;

    protected $table = 'b2b_consent_logs';

    protected $fillable = [
        'lead_name',
        'business_name',
        'contact_info',
        'origin',
        'ip_address',
        'user_agent',
        'accepted_terms_msa',
        'accepted_privacy_nda_whatsapp',
        'legal_version',
        'timestamp_utc',
    ];

    protected $casts = [
        'accepted_terms_msa' => 'boolean',
        'accepted_privacy_nda_whatsapp' => 'boolean',
        'timestamp_utc' => 'datetime',
    ];
}
