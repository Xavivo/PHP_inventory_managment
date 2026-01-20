<?php

$carrito = [];
// Arrays multidimensionales que serán añadidos al array "carrito"
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

    // Buscamos el precio del producto dentro del inventario
    // Entramos en la categoría y luego en el nombre del producto
    $precioUnitario = $inventario[$categoria][$producto]["precio"];

    // Comprobamos si hay suficiente stock
    if ($inventario[$categoria][$producto]["cantidad"] >= $cantidad) {
        
        // Lo añadimos al array carrito creado anteriormente
        $carrito[] = [
            "nombre" => $producto,
            "cantidad" => $cantidad,
            "precio" => $precioUnitario
        ];

        // Restamos la cantidad del inventario original para que no se nos acabe en ningún caso
        $inventario[$categoria][$producto]["cantidad"] = $inventario[$categoria][$producto]["cantidad"] - $cantidad;
        
        echo "Añadido: " . $producto . " al carrito.<br>";
// utilizamos <br> para hacer un salto de linea cada vez que añadamos un producto (breakpoint)
    } else {
        echo "No tenemos suficiente stock de " . $producto . "<br>";
    }
}
?>