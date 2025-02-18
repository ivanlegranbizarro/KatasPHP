📌 Enunciados
1️⃣ Kata: "Notificador Flexible"

Crea un sistema de notificaciones donde puedas cambiar fácilmente el método de notificación (Email, SMS, WhatsApp).
Requisitos:

    Define un NotificationDTO con el mensaje y el destinatario.
    Crea una interfaz NotificationServiceInterface con send(NotificationDTO $notification): bool.
    Implementa tres clases que la usen:
        EmailNotificationService
        SmsNotificationService
        WhatsAppNotificationService
    Crea un Notifier que reciba NotificationServiceInterface y use el método send().

2️⃣ Kata: "Almacén de Datos"

Diseña un sistema donde puedas almacenar datos en MySQL, archivos JSON o Redis sin cambiar la lógica principal.
Requisitos:

    Define un DataDTO con clave y valor.
    Crea una interfaz StorageInterface con save(DataDTO $data): bool.
    Implementa:
        MySQLStorage
        JsonFileStorage
        RedisStorage
    Usa un DataManager que reciba un StorageInterface e invoque save().

3️⃣ Kata: "Reportes a la Carta"

Genera reportes en PDF, Excel y CSV usando una interfaz común.
Requisitos:

    Define ReportDTO con título y contenido.
    Crea ReportGeneratorInterface con generate(ReportDTO $report): string.
    Implementa:
        PdfReportGenerator
        ExcelReportGenerator
        CsvReportGenerator
    Usa ReportManager que reciba ReportGeneratorInterface y ejecute generate().

4️⃣ Kata: "Procesador de Pagos"

Crea un sistema de pagos donde puedas cambiar el proveedor de pagos (PayPal, Stripe, MercadoPago) fácilmente.
Requisitos:

    Define PaymentDTO con monto y moneda.
    Crea PaymentGatewayInterface con process(PaymentDTO $payment): bool.
    Implementa:
        PayPalPaymentGateway
        StripePaymentGateway
        MercadoPagoPaymentGateway
    Usa PaymentProcessor que reciba PaymentGatewayInterface y ejecute process().

💡 Soluciones
1️⃣ Notificador Flexible

final readonly class NotificationDTO {
    public function __construct(public string $message, public string $recipient) {}
}

interface NotificationServiceInterface {
    public function send(NotificationDTO $notification): bool;
}

final class EmailNotificationService implements NotificationServiceInterface {
    public function send(NotificationDTO $notification): bool {
        echo "Enviando Email a {$notification->recipient}: {$notification->message}\n";
        return true;
    }
}

final class SmsNotificationService implements NotificationServiceInterface {
    public function send(NotificationDTO $notification): bool {
        echo "Enviando SMS a {$notification->recipient}: {$notification->message}\n";
        return true;
    }
}

final class Notifier {
    public function __construct(private NotificationServiceInterface $service) {}

    public function notify(NotificationDTO $notification): bool {
        return $this->service->send($notification);
    }
}

$notifier = new Notifier(new EmailNotificationService());
$notifier->notify(new NotificationDTO("Hola!", "user@example.com"));

2️⃣ Almacén de Datos

final readonly class DataDTO {
    public function __construct(public string $clave, public string $valor) {}
}

interface StorageInterface {
    public function save(DataDTO $data): bool;
}

final class MySQLStorage implements StorageInterface {
    public function save(DataDTO $data): bool {
        echo "Guardando en MySQL: {$data->clave} => {$data->valor}\n";
        return true;
    }
}

final class JsonFileStorage implements StorageInterface {
    public function save(DataDTO $data): bool {
        echo "Guardando en JSON: {$data->clave} => {$data->valor}\n";
        return true;
    }
}

final class DataManager {
    public function __construct(private StorageInterface $storage) {}

    public function store(DataDTO $data): bool {
        return $this->storage->save($data);
    }
}

$manager = new DataManager(new JsonFileStorage());
$manager->store(new DataDTO("usuario", "Juan"));

3️⃣ Reportes a la Carta

final readonly class ReportDTO {
    public function __construct(public string $title, public string $content) {}
}

interface ReportGeneratorInterface {
    public function generate(ReportDTO $report): string;
}

final class PdfReportGenerator implements ReportGeneratorInterface {
    public function generate(ReportDTO $report): string {
        return "Generando PDF: {$report->title}\n";
    }
}

final class CsvReportGenerator implements ReportGeneratorInterface {
    public function generate(ReportDTO $report): string {
        return "Generando CSV: {$report->title}\n";
    }
}

final class ReportManager {
    public function __construct(private ReportGeneratorInterface $generator) {}

    public function generateReport(ReportDTO $report): string {
        return $this->generator->generate($report);
    }
}

$manager = new ReportManager(new PdfReportGenerator());
echo $manager->generateReport(new ReportDTO("Ventas", "Datos de ventas"));

4️⃣ Procesador de Pagos

final readonly class PaymentDTO {
    public function __construct(public float $monto, public string $moneda) {}
}

interface PaymentGatewayInterface {
    public function process(PaymentDTO $payment): bool;
}

final class PayPalPaymentGateway implements PaymentGatewayInterface {
    public function process(PaymentDTO $payment): bool {
        echo "Procesando pago de {$payment->monto} {$payment->moneda} con PayPal\n";
        return true;
    }
}

final class StripePaymentGateway implements PaymentGatewayInterface {
    public function process(PaymentDTO $payment): bool {
        echo "Procesando pago de {$payment->monto} {$payment->moneda} con Stripe\n";
        return true;
    }
}

final class PaymentProcessor {
    public function __construct(private PaymentGatewayInterface $gateway) {}

    public function pay(PaymentDTO $payment): bool {
        return $this->gateway->process($payment);
    }
}

$processor = new PaymentProcessor(new PayPalPaymentGateway());
$processor->pay(new PaymentDTO(100.00, "USD"));
