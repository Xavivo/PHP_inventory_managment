<?php
// Array del inventario que tendremos
$carrito = [];
$inventario = [
    "Electronica" => [
        "Switch 2" => ["nombre" => "Switch 2", "precio" => 300, "cantidad" => 5],
        "Iphone 16" => ["nombre" => "Iphone 16", "precio" => 800, "cantidad" => 2],
        "Auriculares Logitech" => ["nombre" => "Auriculares Logitech", "precio" => 30, "cantidad" => 15]
    ],
    "Ropa" => [
        "Chaqueta" => ["nombre" => "Chaqueta", "precio" => 60, "cantidad" => 10],
        "Guantes" => ["nombre" => "Guantes", "precio" => 3, "cantidad" => 20]
    ],
    "Alimentos" => [
        "Leche" => ["nombre" => "Leche", "precio" => 1.5, "cantidad" => 50],
        "Kebab" => ["nombre" => "Kebab", "precio" => 6, "cantidad" => 30]
    ]
];

// Agregar al carrito
function agregarAlCarrito($categoria, $producto, $cantidad) {
    global $inventario, $carrito;

    // Accedemos a los datos del producto directamente
    $datosProducto = $inventario[$categoria][$producto];
    $stockActual = $datosProducto["cantidad"];
    $precio = $datosProducto["precio"];

    // Comprobamos si el producto existe (si el nombre es igual al que buscamos)
    if ($datosProducto["nombre"] == "") {
        echo "El producto seleccionado no existe\n";
    } 
    // Comprobamos si hay stock
    else if ($stockActual < $cantidad) {
        echo "No hay suficiente stock del producto seleccionado\n";
    } 
    else {
        $carrito[] = ["producto" => $producto, "cantidad" => $cantidad, "precio" => $precio];

        // Restamos el stock en el inventario
        $inventario[$categoria][$producto]["cantidad"] = $stockActual - $cantidad;
        
        echo "Se ha añadido: " . $producto . "\n";
    }
}

// Función para mostrar lo agregado con la función anterior
function mostrarCarrito() {
    global $carrito;
    $total = 0;

    echo "\nMostrando carrito abajo...\n\n";

    // Recorremos el carrito con un foreach
    foreach ($carrito as $item) {
        $nombre = $item["producto"];
        $cant = $item["cantidad"];
        $precioUnidad = $item["precio"];
        
        $subtotal = $precioUnidad * $cant;
        $total = $total + $subtotal; // Vamos sumando al total

        echo "Producto: " . $nombre . " | Cantidad: " . $cant . " | Precio: " . $subtotal . "€\n";
    }

    // Miramos si hay que aplicar descuento
    if ($total > 100) {
        $descuento = $total * 0.10; // Calculamos el 10%
        $total = $total - $descuento; // Se lo restamos al total
        echo "\nDescuento del 10% aplicado perfectamente\n\n";
    }

    echo "El total de la compra es: " . $total . "€\n";
}

agregarAlCarrito("Electronica", "Switch 2", 1);
agregarAlCarrito("Ropa", "Chaqueta", 2);
agregarAlCarrito("Alimentos", "Kebab", 5);

mostrarCarrito();

?>