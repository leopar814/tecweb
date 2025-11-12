<?php

    class Products extends DataBase {
        private $data;
        private $response; // Respuesta de la BD

        public function __construct($db, $user='root', $pass='12345') {
            $this->response = '';
            parent::__construct($db, $user, $pass); // Inicializa BD
        }

        public function add($product) {

        }

        public function delete($id) {

        }

        public function edit($product) {

        }

        public function list() {

        }

        public function search($search) {

        }

        public function single($id) {

        }
        
        public function singleByName($name) {

        }

        // Conversión de array a JSON -> Devuelve String
        public function getData() {

        }

    }

?>

