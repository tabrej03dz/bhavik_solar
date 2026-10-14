<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'mobile', 'requirement', 'city', 'message'])]
class Enquiry extends Model
{
    use HasFactory;
}
