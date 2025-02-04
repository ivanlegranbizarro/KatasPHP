<?php

class Libro
{
    public function __construct(
        private string $titulo,
        private string $autor,
        private DateTime $fecha
    ) {}

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     *
     * @return  self
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of autor
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     *
     * @return  self
     */
    public function setAutor($autor)
    {
        $this->autor = $autor;

        return $this;
    }

    /**
     * Get the value of fecha
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set the value of fecha
     *
     * @return  self
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }
}

class Biblioteca
{
    public array $libros = [];
    public function __construct(
        private string $nombre
    ) {}

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function agregarLibro(Libro $libro): self
    {
        $this->libros[] = $libro;

        return $this;
    }

    public function eliminarLibro(Libro $libro): self
    {
        $key = array_search($libro, $this->libros);
        if ($key !== false) {
            unset($this->libros[$key]);
        }

        return $this;
    }

    public function todosLosLibros(): void
    {
        if (empty($this->libros)) {
            echo 'No hay libros en la biblioteca.' . PHP_EOL;
            return;
        }
        foreach ($this->libros as $libro) {
            echo $libro->getTitulo() . PHP_EOL;
            echo $libro->getAutor() . PHP_EOL;
            echo $libro->getFecha()->format('d-m-Y') . PHP_EOL;
        }
    }
}


$biblioteca = new Biblioteca('Mi Biblioteca');
$libro1 = new Libro('El Principito', 'Antoine de Saint-Exupéry', new DateTime('2003-01-01'));

$biblioteca->agregarLibro($libro1);

$biblioteca->todosLosLibros();

$biblioteca->eliminarLibro($libro1);

echo PHP_EOL;
echo 'A ver qué imprime:' . PHP_EOL;
$biblioteca->todosLosLibros();
