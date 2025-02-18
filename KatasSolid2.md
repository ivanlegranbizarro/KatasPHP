📌 Enunciados
1️⃣ Kata: "Notificador Flexible" (Repetido como referencia)

Crea un sistema de notificaciones donde puedas cambiar fácilmente el método de notificación (Email, SMS, WhatsApp).

Requisitos:

    Define un NotificationDTO con el mensaje y el destinatario.
    Crea una interfaz NotificationServiceInterface con send(NotificationDTO $notification): bool.
    Implementa tres clases que la usen:
        EmailNotificationService
        SmsNotificationService
        WhatsAppNotificationService
    Crea un Notifier que reciba NotificationServiceInterface y use el método send().

2️⃣ Kata: "Generador de Reportes"

Crea un sistema donde puedas generar reportes en diferentes formatos (PDF, CSV, JSON).

Requisitos:

    Define un Report con datos genéricos.
    Crea una interfaz ReportGeneratorInterface con generate(Report $report): string.
    Implementa tres clases que la usen:
        PdfReportGenerator
        CsvReportGenerator
        JsonReportGenerator
    Crea un ReportService que reciba ReportGeneratorInterface y use el método generate().

3️⃣ Kata: "Sistema de Pagos"

Crea un sistema que permita procesar pagos con diferentes métodos (Tarjeta, PayPal, Criptomonedas).

Requisitos:

    Define un Payment con el monto y la moneda.
    Crea una interfaz PaymentProcessorInterface con process(Payment $payment): bool.
    Implementa tres clases que la usen:
        CardPaymentProcessor
        PaypalPaymentProcessor
        CryptoPaymentProcessor
    Crea un PaymentService que reciba PaymentProcessorInterface y use el método process().

4️⃣ Kata: "Conversor de Monedas"

Crea un sistema que convierta montos entre distintas monedas (USD, EUR, JPY).

Requisitos:

    Define una interfaz CurrencyConverterInterface con convert(float $amount, string $from, string $to): float.
    Implementa tres clases que la usen con tasas fijas:
        UsdToEurConverter
        UsdToJpyConverter
        EurToJpyConverter
    Crea un CurrencyService que reciba CurrencyConverterInterface y use el método convert().

5️⃣ Kata: "Compresor de Archivos"

Crea un sistema que permita comprimir archivos en distintos formatos (ZIP, TAR, RAR).

Requisitos:

    Define una interfaz CompressorInterface con compress(string $filePath): string.
    Implementa tres clases que la usen:
        ZipCompressor
        TarCompressor
        RarCompressor
    Crea un CompressionService que reciba CompressorInterface y use el método compress().

6️⃣ Kata: "Autenticación Flexible"

Crea un sistema de autenticación que permita iniciar sesión con diferentes métodos (Usuario/Contraseña, Google, Facebook).

Requisitos:

    Define una interfaz AuthenticatorInterface con authenticate(string $username, string $password): bool.
    Implementa tres clases que la usen:
        BasicAuthenticator
        GoogleAuthenticator
        FacebookAuthenticator
    Crea un AuthService que reciba AuthenticatorInterface y use el método authenticate().

7️⃣ Kata: "Filtrador de Productos"

Crea un sistema que filtre productos según distintos criterios (Precio, Categoría, Disponibilidad).

Requisitos:

    Define un Product con atributos genéricos.
    Crea una interfaz ProductFilterInterface con filter(array $products): array.
    Implementa tres clases que la usen:
        PriceFilter
        CategoryFilter
        AvailabilityFilter
    Crea un ProductService que reciba ProductFilterInterface y use el método filter().

8️⃣ Kata: "Conversor de Texto"

Crea un sistema que convierta texto a diferentes formatos (Mayúsculas, Minúsculas, Capitalizado).

Requisitos:

    Define una interfaz TextConverterInterface con convert(string $text): string.
    Implementa tres clases que la usen:
        UppercaseConverter
        LowercaseConverter
        CapitalizedConverter
    Crea un TextService que reciba TextConverterInterface y use el método convert().

9️⃣ Kata: "Generador de Códigos de Barras"

Crea un sistema que genere códigos de barras en distintos formatos (EAN-13, QR, Code128).

Requisitos:

    Define una interfaz BarcodeGeneratorInterface con generate(string $data): string.
    Implementa tres clases que la usen:
        Ean13Generator
        QrCodeGenerator
        Code128Generator
    Crea un BarcodeService que reciba BarcodeGeneratorInterface y use el método generate().

🔟 Kata: "Logger Flexible"

Crea un sistema de logging que registre eventos en distintos formatos (Texto, JSON, XML).

Requisitos:

    Define una interfaz LoggerInterface con log(string $message): void.
    Implementa tres clases que la usen:
        TextLogger
        JsonLogger
        XmlLogger
    Crea un LogService que reciba LoggerInterface y use el método log().

🛠 Soluciones
1️⃣ Notificador Flexible

// NotificationDTO.php
class NotificationDTO {
    public $message;
    public $recipient;

    public function __construct($message, $recipient) {
        $this->message = $message;
        $this->recipient = $recipient;
    }
}

// NotificationServiceInterface.php
interface NotificationServiceInterface {
    public function send(NotificationDTO $notification): bool;
}

// EmailNotificationService.php
class EmailNotificationService implements NotificationServiceInterface {
    public function send(NotificationDTO $notification): bool {
        echo "Enviando email a {$notification->recipient}: {$notification->message}\n";
        return true;
    }
}

// SmsNotificationService.php
class SmsNotificationService implements NotificationServiceInterface {
    public function send(NotificationDTO $notification): bool {
        echo "Enviando SMS a {$notification->recipient}: {$notification->message}\n";
        return true;
    }
}

// WhatsAppNotificationService.php
class WhatsAppNotificationService implements NotificationServiceInterface {
    public function send(NotificationDTO $notification): bool {
        echo "Enviando WhatsApp a {$notification->recipient}: {$notification->message}\n";
        return true;
    }
}

// Notifier.php
class Notifier {
    private $notificationService;

    public function __construct(NotificationServiceInterface $notificationService) {
        $this->notificationService = $notificationService;
    }

    public function notify(NotificationDTO $notification): bool {
        return $this->notificationService->send($notification);
    }
}

2️⃣ Generador de Reportes

// Report.php
class Report {
    public $data;

    public function __construct($data) {
        $this->data = $data;
    }
}

// ReportGeneratorInterface.php
interface ReportGeneratorInterface {
    public function generate(Report $report): string;
}

// PdfReportGenerator.php
class PdfReportGenerator implements ReportGeneratorInterface {
    public function generate(Report $report): string {
        return "Generando reporte PDF: " . json_encode($report->data);
    }
}

// CsvReportGenerator.php
class CsvReportGenerator implements ReportGeneratorInterface {
    public function generate(Report $report): string {
        return "Generando reporte CSV: " . implode(',', $report->data);
    }
}

// JsonReportGenerator.php
class JsonReportGenerator implements ReportGeneratorInterface {
    public function generate(Report $report): string {
        return json_encode($report->data);
    }
}

// ReportService.php
class ReportService {
    private $reportGenerator;

    public function __construct(ReportGeneratorInterface $reportGenerator) {
        $this->reportGenerator = $reportGenerator;
    }

    public function generateReport(Report $report): string {
        return $this->reportGenerator->generate($report);
    }
}

3️⃣ Sistema de Pagos

// Payment.php
class Payment {
    public $amount;
    public $currency;

    public function __construct($amount, $currency) {
        $this->amount = $amount;
        $this->currency = $currency;
    }
}

// PaymentProcessorInterface.php
interface PaymentProcessorInterface {
    public function process(Payment $payment): bool;
}

// CardPaymentProcessor.php
class CardPaymentProcessor implements PaymentProcessorInterface {
    public function process(Payment $payment): bool {
        echo "Procesando pago con tarjeta de {$payment->amount} {$payment->currency}\n";
        return true;
    }
}

// PaypalPaymentProcessor.php
class PaypalPaymentProcessor implements PaymentProcessorInterface {
    public function process(Payment $payment): bool {
        echo "Procesando pago con PayPal de {$payment->amount} {$payment->currency}\n";
        return true;
    }
}

// CryptoPaymentProcessor.php
class CryptoPaymentProcessor implements PaymentProcessorInterface {
    public function process(Payment $payment): bool {
        echo "Procesando pago con criptomonedas de {$payment->amount} {$payment->currency}\n";
        return true;
    }
}

// PaymentService.php
class PaymentService {
    private $paymentProcessor;

    public function __construct(PaymentProcessorInterface $paymentProcessor) {
        $this->paymentProcessor = $paymentProcessor;
    }

    public function processPayment(Payment $payment): bool {
        return $this->paymentProcessor->process($payment);
    }
}

4️⃣ Conversor de Monedas

// CurrencyConverterInterface.php
interface CurrencyConverterInterface {
    public function convert(float $amount, string $from, string $to): float;
}

// UsdToEurConverter.php
class UsdToEurConverter implements CurrencyConverterInterface {
    public function convert(float $amount, string $from, string $to): float {
        return $amount * 0.85; // Ejemplo de tasa
    }
}

// UsdToJpyConverter.php
class UsdToJpyConverter implements CurrencyConverterInterface {
    public function convert(float $amount, string $from, string $to): float {
        return $amount * 110.0; // Ejemplo de tasa
    }
}

// EurToJpyConverter.php
class EurToJpyConverter implements CurrencyConverterInterface {
    public function convert(float $amount, string $from, string $to): float {
        return $amount * 130.0; // Ejemplo de tasa
    }
}

// CurrencyService.php
class CurrencyService {
    private $currencyConverter;

    public function __construct(CurrencyConverterInterface $currencyConverter) {
        $this->currencyConverter = $currencyConverter;
    }

    public function convertCurrency(float $amount, string $from, string $to): float {
        return $this->currencyConverter->convert($amount, $from, $to);
    }
}

5️⃣ Compresor de Archivos

// CompressorInterface.php
interface CompressorInterface {
    public function compress(string $filePath): string;
}

// ZipCompressor.php
class ZipCompressor implements CompressorInterface {
    public function compress(string $filePath): string {
        return "Comprimido en ZIP: $filePath";
    }
}

// TarCompressor.php
class TarCompressor implements CompressorInterface {
    public function compress(string $filePath): string {
        return "Comprimido en TAR: $filePath";
    }
}

// RarCompressor.php
class RarCompressor implements CompressorInterface {
    public function compress(string $filePath): string {
        return "Comprimido en RAR: $filePath";
    }
}

// CompressionService.php
class CompressionService {
    private $compressor;

    public function __construct(CompressorInterface $compressor) {
        $this->compressor = $compressor;
    }

    public function compressFile(string $filePath): string {
        return $this->compressor->compress($filePath);
    }
}

6️⃣ Autenticación Flexible

// AuthenticatorInterface.php
interface AuthenticatorInterface {
    public function authenticate(string $username, string $password): bool;
}

// BasicAuthenticator.php
class BasicAuthenticator implements AuthenticatorInterface {
    public function authenticate(string $username, string $password): bool {
        // Lógica de autenticación básica
        return $username === "admin" && $password === "1234";
    }
}

// GoogleAuthenticator.php
class GoogleAuthenticator implements AuthenticatorInterface {
    public function authenticate(string $username, string $password): bool {
        // Lógica de autenticación con Google
        return true;
    }
}

// FacebookAuthenticator.php
class FacebookAuthenticator implements AuthenticatorInterface {
    public function authenticate(string $username, string $password): bool {
        // Lógica de autenticación con Facebook
        return true;
    }
}

// AuthService.php
class AuthService {
    private $authenticator;

    public function __construct(AuthenticatorInterface $authenticator) {
        $this->authenticator = $authenticator;
    }

    public function authenticateUser(string $username, string $password): bool {
        return $this->authenticator->authenticate($username, $password);
    }
}

7️⃣ Filtrador de Productos

// Product.php
class Product {
    public $price;
    public $category;
    public $available;

    public function __construct($price, $category, $available) {
        $this->price = $price;
        $this->category = $category;
        $this->available = $available;
    }
}

// ProductFilterInterface.php
interface ProductFilterInterface {
    public function filter(array $products): array;
}

// PriceFilter.php
class PriceFilter implements ProductFilterInterface {
    public function filter(array $products): array {
        return array_filter($products, fn($product) => $product->price < 50);
    }
}

// CategoryFilter.php
class CategoryFilter implements ProductFilterInterface {
    public function filter(array $products): array {
        return array_filter($products, fn($product) => $product->category === 'electronics');
    }
}

// AvailabilityFilter.php
class AvailabilityFilter implements ProductFilterInterface {
    public function filter(array $products): array {
        return array_filter($products, fn($product) => $product->available);
    }
}

// ProductService.php
class ProductService {
    private $filter;

    public function __construct(ProductFilterInterface $filter) {
        $this->filter = $filter;
    }

    public function getFilteredProducts(array $products): array {
        return $this->filter->filter($products);
    }
}

8️⃣ Conversor de Texto

// TextConverterInterface.php
interface TextConverterInterface {
    public function convert(string $text): string;
}

// UppercaseConverter.php
class UppercaseConverter implements TextConverterInterface {
    public function convert(string $text): string {
        return strtoupper($text);
    }
}

// LowercaseConverter.php
class LowercaseConverter implements TextConverterInterface {
    public function convert(string $text): string {
        return strtolower($text);
    }
}

// CapitalizedConverter.php
class CapitalizedConverter implements TextConverterInterface {
    public function convert(string $text): string {
        return ucwords($text);
    }
}

// TextService.php
class TextService {
    private $converter;

    public function __construct(TextConverterInterface $converter) {
        $this->converter = $converter;
    }

    public function convertText(string $text): string {
        return $this->converter->convert($text);
    }
}

9️⃣ Generador de Códigos de Barras

// BarcodeGeneratorInterface.php
interface BarcodeGeneratorInterface {
    public function generate(string $data): string;
}

// Ean13Generator.php
class Ean13Generator implements BarcodeGeneratorInterface {
    public function generate(string $data): string {
        return "Generando código de barras EAN-13: $data";
    }
}

// QrCodeGenerator.php
class QrCodeGenerator implements BarcodeGeneratorInterface {
    public function generate(string $data): string {
        return "Generando código QR: $data";
    }
}

// Code128Generator.php
class Code128Generator implements BarcodeGeneratorInterface {
    public function generate(string $data): string {
        return "Generando código de barras Code128: $data";
    }
}

// BarcodeService.php
class BarcodeService {
    private $barcodeGenerator;

    public function __construct(BarcodeGeneratorInterface $barcodeGenerator) {
        $this->barcodeGenerator = $barcodeGenerator;
    }

    public function generateBarcode(string $data): string {
        return $this->barcodeGenerator->generate($data);
    }
}

🔟 Logger Flexible

// LoggerInterface.php
interface LoggerInterface {
    public function log(string $message): void;
}

// TextLogger.php
class TextLogger implements LoggerInterface {
    public function log(string $message): void {
        echo "Log (Texto): $message\n";
    }
}

// JsonLogger.php
class JsonLogger implements LoggerInterface {
    public function log(string $message): void {
        echo json_encode(['log' => $message]) . "\n";
    }
}

// XmlLogger.php
class XmlLogger implements LoggerInterface {
    public function log(string $message): void {
        echo "<log>$message</log>\n";
    }
}

// LogService.php
class LogService {
    private $logger;

    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }

    public function logMessage(string $message): void {
        $this->logger->log($message);
    }
}
