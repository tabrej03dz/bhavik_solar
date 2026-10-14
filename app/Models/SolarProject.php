<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class SolarProject extends Model {
    protected $table = 'solar_projects';
    protected $guarded = ['id'];
    protected function casts(): array { return ['is_active'=>'boolean','is_featured'=>'boolean','completed_at'=>'date']; }
}
