<?php

$carrito = [];
$inventario = [
    "Electronica" => [
        "Switch 2" => ["nombre" => "Switch 2", "precio" => 400, "cantidad" => 10],
        "Iphone 16" => ["nombre" => "Iphone 16", "precio" => 600, "cantidad" => 5],
        "Auriculares Logitech" => ["nombre" => "Auriculares Logitech", "precio" => 30, "cantidad" => 15]
    ],
    "Ropa" => [
        "Chaqueta" => ["nombre" => "Chaqueta", "precio" => 69.99, "cantidad" => 19],
        "Camiseta" => ["nombre" => "Camiseta", "precio" => 25.99, "cantidad" => 60]
    ],
    "Alimentos" => [
        "Barrita Kitkat" => ["nombre" => "Barrita Kitkat", "precio" => 2, "cantidad" => 100],
        "Pan de masa madre" => ["nombre" => "Pan de", "precio" => 1.5, "cantidad" => 23]
    ]
];

function agregarAlCarrito($categoria, $producto, $cantidad) {
    global $inventario, $carrito;

    $precioUnitario = $inventario[$categoria][$producto]["precio"];

    if ($inventario[$categoria][$producto]["cantidad"] >= $cantidad) {
        $carrito[] = [
            "nombre" => $producto,
            "cantidad" => $cantidad,
            "precio" => $precioUnitario
        ];

        $inventario[$categoria][$producto]["cantidad"] = $inventario[$categoria][$producto]["cantidad"] - $cantidad;
        
        echo "Añadido: " . $producto . " al carrito.<br>";
    } else {
        echo "No tenemos suficiente stock de " . $producto . "<br>";
    }
}

// Agregamos y mostramos por consola
agregarAlCarrito("Electronica", "Switch 2", 1);
agregarAlCarrito("Ropa", "Chaqueta", 2);

print_r($inventario["Electronica"]["Switch 2"]);
print_r($inventario["Ropa"]["Chaqueta"]);
?>