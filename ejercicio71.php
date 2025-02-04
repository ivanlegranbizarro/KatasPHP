<?php
/* ### 2. Interfaz y Trait para Validación de Datos
**Enunciado:** Diseña una interfaz `Validatable` con un método `validate()`. Crea un trait `ValidationTrait` que implemente métodos genéricos de validación para diferentes tipos de datos (email, número de teléfono, etc.). */


interface Validatable
{
    public function validate(): bool;
}

trait ValidationTrait
{

    public function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function isPhoneNumberValid(string $phomeNumber): bool
    {
        return preg_match('/^\d{9}$/', $phomeNumber);
    }
}


class User implements Validatable
{
    use ValidationTrait;
    public function __construct(public string $email, public string $phoneNumber) {}
    public function validate(): bool
    {
        return $this->isValidEmail($this->email) && $this->isPhoneNumberValid($this->phoneNumber);
    }
}
