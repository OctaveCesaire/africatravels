<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'agency_id',
        'name',
        'description',
        'price',
    ];

    // Relationships
    public function agency()
    {
        return $this->belongsTo(User::class, 'agency_id');
    }

    // Scopes
    public function scopeFilterByAgency($query, $agencyId)
    {
        return $query->where('agency_id', $agencyId);
    }

    public function scopeSearchByName($query, $name)
    {
        return $query->where('name', 'LIKE', "%{$name}%");
    }
}
