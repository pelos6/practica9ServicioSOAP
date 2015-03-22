<!DOCTYPE html>
<html>
    <head>
        <title>Tarea9 Servicios SOAP con WSDL</title>
        <meta charset="UTF-8">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h2>Servicios Web SOAP con WSDL</h2>
        <?php
        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
        $mostrar_form = FALSE;
        if (isset($_POST['enviar'])) {
            //$url="especificar la ubicación absoluta del fichero que contiene el objeto SoapServer";
            //$uri="especificar el directorio donde está el fichero"
            //$url = "http://localhost/CicloFormativoGradoSuperior/DAW_DWES/tareas/tarea9_serviciosSOAP/servicioW.php";
            //$uri = "http://localhost/CicloFormativoGradoSuperior/DAW_DWES/tareas/tarea9_serviciosSOAP";
            //Creamos un cliente para llamar a esa URL. 
            //Es obligatorio establecer el parámetro 'uri' al no tener WSDL , igual que ocurría al instanciar el objeto SoapServer
            // $cliente = new SoapClient("http://localhost//CicloFormativoGradoSuperior//DAW_DWES//tareas//tarea9_serviciosSOAP//servicioW.wsdl.xml");
            // $cliente = new SoapClient(null, array('location' => $url, 'uri' => $uri));
            require_once 'ServerW.php';
            //Instanciamos un objeto de la case ServerW
            //Esta clase se ha generado automáticamente por la herramienta wsdl2php
            $cliente = new ServerW();
            //Ahora por ejemplo podemos consumir el servicio getPVP();
            echo ("<h2>El pvp </h2>");
            $PVP = $cliente->getPVP($_POST['producto']);
            echo("<pre>");
            print_r($PVP);
            echo ("</pre>");
            //Ahora por ejemplo podemos consumir el servicio getStock();
            echo ("<h2>El stock </h2>");
            $stock = $cliente->getStock($_POST['producto'], $_POST['tienda']);
            echo("<pre>");
            print_r($stock);
            echo ("</pre>");

            //Ahora por ejemplo podemos consumir el servicio getFamilias();
            echo ("<h2>Las Familias </h2>");
            $familias = $cliente->getFamilias();
            echo("<pre>");
            print_r($familias);
            echo ("</pre>");
            //Ahora por ejemplo podemos consumir el servicio getFamilias();
            echo ("<h2>Los productos de la Familia </h2>");
            $productoFamilia = $cliente->getProductosFamilia($_POST['familia']);
            echo("<pre>");
            print_r($productoFamilia);
            echo ("</pre>");
        } else {
            $mostrar_form = TRUE;
            require_once('/include/DB.php');
            $productos = DB::obtieneProductos();
            $tiendas = DB::obtieneTiendas();
            $familias = DB::obtieneFamilias();
        }
        ?>
        <?php
        if ($mostrar_form) {
            // tenemos que mostrar el formulario
            ?>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>"method ="POST">
                Producto 
                <select name="producto"id="">
                    <?php
                    foreach ($productos as $valor) {
                        echo('<option value="' . $valor->getCodigo() . '">' . $valor->getNombre_corto() . '</option>');
                    }
                    ?>  
                </select><br><br>
                Tienda 
                <select name="tienda"id="">
                    <?php
                    foreach ($tiendas as $tienda) {
                        echo('<option value="' . $tienda->getCodigo() . '">' . $tienda->getNombre() . '</option>');
                    }
                    ?>  
                </select><br><br>

                Familia 
                <select name="familia"id="">
                    <?php
                    foreach ($familias as $familia) {
                        echo('<option value="' . $familia . '">' . $familia . '</option>');
                    }
                    ?>  
                </select><br><br>
                <input type="submit"name ="enviar"/><br>
            </form>
            <?php
        }
        ?>
    </body>
</html>


