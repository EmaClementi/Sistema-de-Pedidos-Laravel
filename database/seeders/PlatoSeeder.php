<?php

namespace Database\Seeders;

use App\Models\Plato;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $platos = [
            ['nombre' => 'Asado', 'descripcion' => 'Tradicional barbacoa argentina con variedad de carnes', 'precio' => 1500],
            ['nombre' => 'Locro', 'descripcion' => 'Sopa espesa de maíz, frijoles, patatas y carne', 'precio' => 1000],
            ['nombre' => 'Choripán', 'descripcion' => 'Sándwich de chorizo asado con chimichurri', 'precio' => 500],
            ['nombre' => 'Milanesa a la Napolitana', 'descripcion' => 'Milanesa con salsa de tomate, jamón y queso', 'precio' => 900],
            ['nombre' => 'Pollo al disco', 'descripcion' => 'Pollo cocinado en disco de arado con vegetales', 'precio' => 1200],
            ['nombre' => 'Provoleta', 'descripcion' => 'Queso provolone asado con orégano y ají', 'precio' => 600],
            ['nombre' => 'Matambre arrollado', 'descripcion' => 'Carne enrollada con vegetales y huevo', 'precio' => 1100],
            ['nombre' => 'Fugazza', 'descripcion' => 'Pizza argentina cubierta con cebollas y queso', 'precio' => 1300],
            ['nombre' => 'Carbonada', 'descripcion' => 'Estofado de carne con maíz, patatas y frutas', 'precio' => 1100],
            ['nombre' => 'Humita', 'descripcion' => 'Pasta de maíz con queso envuelta en hojas de maíz', 'precio' => 600],
            ['nombre' => 'Puchero', 'descripcion' => 'Sopa de carne con verduras y garbanzos', 'precio' => 950],
            ['nombre' => 'Vitel Toné', 'descripcion' => 'Rodajas de ternera en una salsa cremosa de atún y alcaparras', 'precio' => 1200],
            ['nombre' => 'Matambre a la pizza', 'descripcion' => 'Carne a la parrilla cubierta con salsa de tomate y queso', 'precio' => 1400],
            ['nombre' => 'Sorrentinos', 'descripcion' => 'Pasta rellena similar a los raviolis, pero más grande y redonda', 'precio' => 900],
            ['nombre' => 'Bife de chorizo', 'descripcion' => 'Corte de carne de res jugoso y tierno', 'precio' => 1600],
        ];

        foreach ($platos as $plato) {
            Plato::create($plato);
        };
    }
}
