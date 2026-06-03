<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class AppointmentStatusNotification extends Notification
{
    use Queueable;

    protected $appointment;
    protected $status;

    public function __construct($appointment, $status)
    {
        $this->appointment = $appointment;
        $this->status = $status;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => "Your appointment on {$this->appointment->appointment_date} has been {$this->status}.",
            'appointment_id' => $this->appointment->id,
            'status' => $this->status,
        ];
    }
}
