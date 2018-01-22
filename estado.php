<?php

    class Estado extends Database{

        // id
        public $id;

        // nome
        public $nome = '';

        // uf
        public $sigla = '';
        
        public function get() {

            // inserir os valores no banco
            $sql = "select * from estados ";
            $result = $this->conn()->query( $sql );

            // array de estados
            $estados = [];            
            
            // percorre todos os estados
            while ( $estado = $result->fetch_assoc() ) {

                $estados[] = [
                                'id' => $estado[ 'id' ],
                                'nome' => utf8_encode( $estado[ 'nome' ] ),
                                'sigla' => $estado[ 'sigla' ]
                            ];
            }

            // retorna todos os estados
            return $estados;
        }

        
        public function getById( $id ) {

            // inserir os valores no banco
            $sql = "select * from estados where id = " .$id;
            $result = $this->conn()->query( $sql );
            
            while ( $estado = $result->fetch_assoc() ) {
                $this->id = $estado[ 'id' ];
                $this->nome = utf8_encode( $estado[ 'nome' ] );
                $this->sigla = $estado[ 'sigla' ];
            }

            return $this;
        }
        
    }

?>