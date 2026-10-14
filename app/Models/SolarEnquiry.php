<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SolarEnquiry extends Model
{
    protected $fillable = [
        'name', 'phone', 'service', 'location', 'email',
        'message', 'status', 'admin_notes',
    ];

    public const SERVICES = [
        'Solar EPC', 'Rooftop Solar', 'Ground-Mounted Solar',
        'Solar Water Pumps', 'Commercial Solar', 'Domestic Solar',
        'Solar Street Lights', 'Support & Maintenance', 'Other / Not Sure',
    ];

    public const STATUSES = ['new', 'contacted', 'in_progress', 'converted', 'closed'];
}
