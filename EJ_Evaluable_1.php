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
        
        // Usamos \n para la consola
        echo "Se ha añadido: " . $producto . " al carrito.\n";
    } else {
        echo "No hay suficiente stock de " . $producto . "\n";
    }
}

agregarAlCarrito("Electronica", "Switch 2", 1);
agregarAlCarrito("Ropa", "Chaqueta", 2);

function mostrarCarrito() {
    global $carrito;
    $total = 0;

    echo "Contenido del carrito:\n";
    foreach ($carrito as $producto) {
        $subtotal = $producto["precio"] * $producto["cantidad"];
        $total += $subtotal;
        echo "- " . $producto["nombre"] . ": " . $producto["cantidad"] . " x $" . $producto["precio"] . " = $" . $subtotal . "\n";
    }
    echo "El total a pagar es: $" . $total . "\n";
}

mostrarCarrito();