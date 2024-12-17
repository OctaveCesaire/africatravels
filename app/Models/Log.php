<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'message',
        'context',
    ];

    protected $casts = [
        'context' => 'array',
    ];

    // Methods
    public function sendAlertEmail($adminEmail)
    {
        // Logic to send email alert to administrator
        \Mail::to($adminEmail)->send(new \App\Mail\LogAlert($this));
    }
}
