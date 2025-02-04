<?php
/* kata-football-manager
Onzena Kata per l'especialitat FullstackPHP 20-4-23 Hem d’enregistrar informació d’un videojoc manager d’equips de futbol:

El manager de futbol tindrà equips. Els equips tenen nom, un pressupost,any de fundació i ...
Jugadors/es de futbol: Amb nom,edad i posició i un valor de mercat.
Els equips tenem a més empleats/ades que tenen un nom, un número concret d’anys d’antiguitat i un rol(Entrenador, Entrenador Auxiliar, Preparador Físic, Psicòleg, o economista)
Els jugadors/es poden/vendre o comprar. Això implica que poden cambiar d’equip afectant això a l’economia dels equips que venen o compren.
Pensa també com enregistrar informació d’aquestes transaccions de jugadors/es.
Pensa un model de classes que pugui gestionar tota aquesta informació e implementa. */

enum Rol
{
    case Entrenador;
    case EntrenadorAuxiliar;
    case PreparadorFisic;
    case Psicoleg;
    case Economista;
}

enum PosicioCamp
{
    case Porter;
    case Defensa;
    case Migcampista;
    case Davanter;
    case Lateral;
}

class Manager
{
    public function __construct(
        private string $nom,
        private array $equips = []
    ) {}

    public function getNom(): string
    {
        return $this->nom;
    }

    public function getEquips(): array
    {
        return $this->equips;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function addEquip(Equip $equip): void
    {
        $this->equips[] = $equip;
    }
}

class Equip
{
    public function __construct(
        private string $nom,
        private int|float $pressupost,
        private DateTime $fundacio,
        private array $jugadors
    ) {}

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function sellJugador(Jugador $jugador): void
    {
        $this->pressupost += $jugador->getValor();

        $this->jugadors = array_filter($this->jugadors, function ($j) use ($jugador) {
            return $j != $jugador;
        });
    }

    public function buyJugador(Jugador $jugador): void
    {
        $this->pressupost -= $jugador->getValor();;
        $this->jugadors[] = $jugador;
    }
}

class Jugador
{
    public function __construct(
        private string $nom,
        private DateTime $naixament,
        private PosicioCamp $posicio,
        private int|float $valor,
    ) {}

    public function getValor(): int|float
    {
        return $this->valor;
    }

    public function getEdad(): int
    {
        return $this->naixament->diff(new DateTime())->y;
    }
}


class Empleat
{
    public function __construct(
        private string $nom,
        private Rol $rol,
        private int $antiguitat,
    ) {}
}
