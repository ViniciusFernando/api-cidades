<?php

    class Cidade extends Database{

        // id
        public $id;

        // nome
        public $nome = '';

        // uf
        public $estados_id = '';
        
        public function get() {

            // inserir os valores no banco
            $sql = "select * from cidades ";
            $result = $this->conn()->query( $sql );

            // array de estados
            $cidades = [];
            
            // percorre todos os estados
            while ( $cidade = $result->fetch_assoc() ) {

                $cidades[] = [
                                'id' => $cidade[ 'id' ],
                                'nome' => utf8_encode( $cidade[ 'nome' ] ),
                                'estados_id' => $cidade[ 'estados_id' ]
                            ];
            }

            // retorna todos os estados
            return $cidades;
        }

        public function getCidadeByNome( $nome, $estadoId, $qtd = 10 ) {
            
            // inserir os valores no banco
            $sql = "select * from cidades where nome like '" .$nome ."%' and estados_id = " .$estadoId;
            $result = $this->conn()->query( $sql );

            // array de cidades
            $cidades = [];
            
            // percorre todos os estados
            while ( $cidade = $result->fetch_assoc() ) {
                $cidades[] = [
                                'id' => $cidade[ 'id' ],
                                'nome' => utf8_encode( $cidade[ 'nome' ] ),
                                'estados_id' => $cidade[ 'estados_id' ]
                            ];

                $qtd --;
                if( $qtd == 0 ) break;
            }

            // retorna as cidades
            return $cidades;
        }
        
    }

?>