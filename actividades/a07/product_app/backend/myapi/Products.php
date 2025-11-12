<?php
    namespace MARKETZONE\MAIN;
    
    class Products extends DataBase {
        private $response; // Respuesta enviada al cliente

        public function __construct($db, $user='root', $pass='12345') {
            $this->response = [];
            parent::__construct($db, $user, $pass); // Inicializa BD
        }

        public function add($product) {
            // Inicialización de respuesta a cliente
            $response = [
                'status'  => 'error',
                'message' => 'Ya existe un producto con ese nombre'
            ];

            if(isset($_POST['nombre'])) {
                // SE TRANSFORMA EL POST A UN STRING EN JSON, Y LUEGO A OBJETO
                $jsonOBJ = json_decode( json_encode($_POST) );

                $sql = "SELECT * FROM productos WHERE nombre = '{$jsonOBJ->nombre}' AND eliminado = 0";
                $result = $conexion->query($sql);
                
                if ($result->num_rows == 0) {
                    $conexion->set_charset("utf8");
                    $sql = "INSERT INTO productos VALUES (null, '{$jsonOBJ->nombre}', '{$jsonOBJ->marca}', '{$jsonOBJ->modelo}', {$jsonOBJ->precio}, '{$jsonOBJ->detalles}', {$jsonOBJ->unidades}, '{$jsonOBJ->imagen}', 0)";
                    if($conexion->query($sql)) {
                        $response['status'] =  "success";
                        $response['message'] =  "Producto agregado";
                    } else {
                        $response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
                    }
                }

                $result->free();
                // Cierra la conexion
                $conexion->close();
            }
        }

        public function delete($id) {
            $response = array(
                'status'  => 'error',
                'message' => 'La consulta falló'
            );
            // SE VERIFICA HABER RECIBIDO EL ID
            if( isset($_POST['id']) ) {
                $id = $_POST['id'];
                // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
                $sql = "UPDATE productos SET eliminado = 1 WHERE id = {$id}";
                if ( $conexion->query($sql) ) {
                    $response['status'] =  "success";
                    $response['message'] =  "Producto eliminado";
                } else {
                    $response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
                }
                $conexion->close();
            } 
        }

        public function edit($product) {
            $response = [
                'status'  => 'error',
                'message' => 'La consulta falló'
            ];
            // SE VERIFICA HABER RECIBIDO EL ID
            if( isset($_POST['id']) ) {
                $jsonOBJ = json_decode( json_encode($_POST) );
                
                // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
                $sql =  "UPDATE productos SET nombre='{$jsonOBJ->nombre}', marca='{$jsonOBJ->marca}',";
                $sql .= "modelo='{$jsonOBJ->modelo}', precio={$jsonOBJ->precio}, detalles='{$jsonOBJ->detalles}',"; 
                $sql .= "unidades={$jsonOBJ->unidades}, imagen='{$jsonOBJ->imagen}' WHERE id={$jsonOBJ->id}";
                $conexion->set_charset("utf8");
                if ( $conexion->query($sql) ) {
                    $response['status'] =  "success";
                    $response['message'] =  "Producto actualizado";
                } else {
                    $response['message'] = "ERROR: No se ejecuto $sql. " . mysqli_error($conexion);
                }
                $conexion->close();
            } 
        }

        public function list() {
            $sql = "SELECT * FROM productos WHERE eliminado = 0";
            if ( $result = $conexion->query($sql) ) {
                // SE OBTIENEN LOS RESULTADOS
                $rows = $result->fetch_all(MYSQLI_ASSOC);

                if(!is_null($rows)) {
                    // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                    foreach($rows as $num => $row) {
                        foreach($row as $key => $value) {
                            $response[$num][$key] = utf8_encode($value);
                        }
                    }
                }

                $result->free();
            } else {
                die('Query Error: '.mysqli_error($conexion));
            }
            $conexion->close();
        }

        public function search($search) {
            if( isset($_GET['search']) ) {
                $search = $_GET['search'];
                // SE REALIZA LA QUERY DE BÚSQUEDA Y AL MISMO TIEMPO SE VALIDA SI HUBO RESULTADOS
                $sql = "SELECT * FROM productos WHERE (id = '{$search}' OR nombre LIKE '%{$search}%' OR marca LIKE '%{$search}%' OR detalles LIKE '%{$search}%') AND eliminado = 0";
                if ( $result = $conexion->query($sql) ) {
                    // SE OBTIENEN LOS RESULTADOS
                    $rows = $result->fetch_all(MYSQLI_ASSOC);

                    if(!is_null($rows)) {
                        // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                        foreach($rows as $num => $row) {
                            foreach($row as $key => $value) {
                                $response[$num][$key] = utf8_encode($value);
                            }
                        }
                    }

                    $result->free();
                } else {
                    die('Query Error: '.mysqli_error($conexion));
                }

            }
      
        }

        public function single($id) {
             if( isset($_POST['id']) ) {
                $id = $_POST['id'];

                $sql = "SELECT * FROM productos WHERE id = {$id}";
                if ( $result = $conexion->query($sql) ) {
                    // SE OBTIENEN LOS RESULTADOS
                    $row = $result->fetch_assoc();

                    if(!is_null($row)) {
                        // SE CODIFICAN A UTF-8 LOS DATOS Y SE MAPEAN AL ARREGLO DE RESPUESTA
                        foreach($row as $key => $value) {
                            $response[$key] = utf8_encode($value);
                        }
                    }
                    $result->free();
                } else {
                    die('Query Error: '.mysqli_error($conexion));
                }
                $conexion->close();
            }
        }
        
        public function singleByName($name) {
            if( isset($_GET['nombre']) ) {
                $nombre = $_GET['nombre'];
                $sql = "SELECT * FROM productos WHERE nombre LIKE '{$nombre}' AND eliminado = 0";
                if ( $result = $conexion->query($sql) ) {
                    // SE OBTIENEN LOS RESULTADOS
                    $row = $result->fetch_assoc();

                    if(!is_null($row)) {
                        foreach($row as $key => $value) {
                            $response[$key] = utf8_encode($value);
                        }
                    }
                    $result->free();
                } else {
                    die('Query Error: '.mysqli_error($conexion));
                }
                $conexion->close();
            }        
        }

        // Conversión de array a JSON -> Devuelve String
        public function getResponse() {
            return json_encode($response, JSON_PRETTY_PRINT);
        }

    }
?>

