<?php 

    // Principio de responsabilidad unica -> Buscamos que cada parte (clase, componente, etc) de nuestro codigo se dedique y funcione para una sola cosa

    class MenuTienda{

        function mostrarMenu(){} // SI

        function agregarProductoCarrito(){} // NO

        function sumarTotalCarrito(){} // NO

        function eliminarUsuario(){} // NO

        function logIn(){} // NO

        function logOut(){} // NO

        function registrarUsuario(){} // NO


    }

?>