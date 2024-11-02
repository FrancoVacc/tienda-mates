# Tienda E-Commerce desarrollada con laravel

### Día 1

-   Diseño de vistas
-   Vistas layout, footer, header

### Día 2

-   Vistas terminadas (home, nosotros, layout, etc.)
-   faltan vistas

## Día 3

-   Vista contacto terminada
-   falta hacer las vistas de tienda y carrito de compras
-   falta diseñar la db

## Día 4

-   Migraciones y modelo de productos, categrias y producto categoria
-   Dashboard Productos
-   controlador producto
-   carga de nuevo producto.

## Día 5

-   finalizada la carda de productos en el panel de usuarios
-   muestra de productos en el area de clientes
-   terminar los productos en el lado clientes

## Día 6

-   Mejoras visuales
-   Controlador de Categorías terminado (CRUD)
-   Falta implementar filtros por categorias en Dashboard y Cliente

## Día 7

-   implementación de filtros con categorias en cliente y productos del dashboard

## Día 8

-   Mensajería
-   controlador de mensajería
-   gestion de mensajes en dashboard
-   envio de emails y whatsapp

## Día 9

-   control de Disponibilidad sobre el Stok
-   Vistas con stok

## Día 10

-   Login para clientes
-   permitir ver el carrito si está logueado
-   arreglos visuales en las plantillas

## Día 11

-   agregamos el paquete Spattie Permission
-   Realizamos seeders para asignar roles y permisos
-   declaramos el rol admin y se lo agregarmos al usuario 1
-   Declaramos el rol cliente y se lo agregamos a todos los demás usuarios
-   activamos los middlewares
-   pusimos rutas protegidas con middlewares
-   creacion del modelo user_information
-   creacion del registro en blanco sobre el modelo user_informaton
-   colocacion de formulario para modificar todo en edit.blade.php junto con los datos de la cuenta personal.
-   actualizacion de datos personales
-   Creacion del modelo Address
-   Creacion del registro en blanco de Address
-   colocacion de formulario para modificar los datos de la direccion en edit.blade.php junto con los datos de la cuenta personal.
-   actualizacion del formulario de contacto, con autocompletado de informacion del usuario

## Día 12

-   Creacion de los modelos de Cart y Cart_item
-   Migraciones y creacion de la estructura de tablas correspondientes
-   creacion del controlador CartController
-   Carga de un carrito nuevo con sus respectivos item
-   Mostrar el carrito y sus items

## Día 13

-   Se activaron las funciones de los botones de actualizar y eliminar elementos del carrito
-   se mejoro el carrito en su parte visual
-   se agregó el boton comprar.
-   Revisar y diagramar la estructura de la base de datos para una compra

## Día 14

-   migracion y modelo Order
-   Creacion de OrderController
-   cargar una orden
-   eliminar el carrito y sus items
-   mostrar las orden de compra en una lista dentro del dashboard del comprador
-   mostrar la orden de compra con todos sus items.
-   arreglos varios en las vistas

## Día 15

-   Arreglos visuales y estructurales

## Día 16

-   Selector de forma de pago
-   Pendiente Integraciones de MP
-   creacion de modelo y migración de Status y Delivery
-   Ajuste del frontend para mostrar el Status y el delivery

## Día 17

-   Refactorización de componentes visuales
-   Refactorización de cart-btn
-   Contador de items
-   Refactorización del menú del dashboard.

## Día 18

-   Refactorizacón del menu de Breeze
-   Refactorización del Login, Register & password

## Día 19

-   Aplicar Emails
    -   Message (listo)
    -   Cuando un cliente compra un carrito
        -   uno al cliente con el numero de pedido, los items y el total a pagar (listo)
        -   uno al admin con el pedido (listo)
    -   Cuando se actualiza el estado del Carrito (listo)

## Día 20

-   Mensajes de Error y de confirmación
-   Mensajes de confirmación
    -   Cuando agrege un item al carrito (listo)
    -   Cuando elimine o actualice un articulo en el carrito (listo)
    -   Cuando actualice los datos (listo)
    -   Cuando envie un mensaje (listo)
-   Crear el usuario Admin a través de un seeder

## Día 21

-   Añadir Cloudinary para gestionar las imágenes (listo)

## Día 23

-   Implementación de Slugs en las rutas (listo)
-   Implementación del paquete Laravel-Lang para traducir a Español(listo)
-   Estilización del Dashboard
    -   Planteo del menú de Dashboard (listo)
    -   Ensamble de Componentes (listo)
    -   Agregar componentes de mensajes nuevos y de visualización de ventas (listo)
    -   Arreglar las vistas de productos, categorías, clientes, etc. (listo)
