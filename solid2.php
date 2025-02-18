<?php
/* 1️⃣ Kata: "Notificador Flexible" (Repetido como referencia)

Crea un sistema de notificaciones donde puedas cambiar fácilmente el método de notificación (Email, SMS, WhatsApp).

Requisitos:

    Define un NotificationDTO con el mensaje y el destinatario.
    Crea una interfaz NotificationServiceInterface con send(NotificationDTO $notification): bool.
    Implementa tres clases que la usen:
        EmailNotificationService
        SmsNotificationService
        WhatsAppNotificationService
    Crea un Notifier que reciba NotificationServiceInterface y use el método send(). */
