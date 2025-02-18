<?php

final readonly class NotificationDTO
{
    public function __construct(
        public string $mensaje,
        public string $destinatario,
    ) {}
}

interface NotificationServiceInterface
{
    public function send(NotificationDTO $notification): bool;
}

final class EmailNotificationService implements NotificationServiceInterface
{
    public function send(NotificationDTO $notification): bool
    {
        echo "Enviando Email a {$notification->destinatario}: {$notification->mensaje}\n";
        return true;
    }
}

final class SMSNotificationService implements NotificationServiceInterface
{
    public function send(NotificationDTO $notification): bool
    {
        echo "Enviando SMS a {$notification->destinatario}: {$notification->mensaje}\n";
        return true;
    }
}
final class WhatsAppNotificationService implements NotificationServiceInterface
{
    public function send(NotificationDTO $notification): bool
    {
        echo "Enviando WhatsApp a {$notification->destinatario}: {$notification->mensaje}\n";
        return true;
    }
}


final class Notifier
{
    public function __construct(public NotificationServiceInterface $notificationService) {}

    public function notify(NotificationDTO $notification): bool
    {
        return $this->notificationService->send($notification);
    }
}

// Tres ejemplos

// Ejemplo con WhatsApp
$mensaje = new NotificationDTO("Hola!", "user@example.com");
$notifier1 = new Notifier(new WhatsAppNotificationService);
$notifier1->notify($mensaje);

// Ejemplo con SMS
$mensaje = new NotificationDTO("Hola!", "user@example.com");
$notifier2 = new Notifier(new SMSNotificationService);
$notifier2->notify($mensaje);

// Ejemplo con Email
$mensaje = new NotificationDTO("Hola!", "user@example.com");
$notifier3 = new Notifier(new EmailNotificationService);
$notifier3->notify($mensaje);
