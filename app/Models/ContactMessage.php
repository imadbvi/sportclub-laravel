<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $fillable = ['user_id', 'name', 'email', 'subject', 'message', 'admin_reply', 'replied_at', 'is_read'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function casts(): array
    {
        return [
            'replied_at' => 'datetime',
            'is_read' => 'boolean',
        ];
    }

    public function replies()
    {
        return $this->hasMany(ContactMessageReply::class);
    }

    public function getStatusAttribute()
    {
        $latestReply = $this->replies()->latest()->first();

        if ($latestReply) {
            if ($latestReply->user_id === $this->user_id) {
                return $this->is_read ? 'Gelezen' : 'In afwachting';
            }
            return 'Beantwoord';
        }

        if ($this->admin_reply) {
            return 'Beantwoord';
        }

        return $this->is_read ? 'Gelezen' : 'In afwachting';
    }
}
