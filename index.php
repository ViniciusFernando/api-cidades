<?php 
    header('Access-Control-Allow-Origin: *'); 
    
    header('Content-Type: application/json; charset=utf-8');    

    // conecta com o banco
    include 'database.php';

    // pega a model do estado
    include 'estado.php';

    // pega a model do estado
    include 'cidade.php';

    switch ( $_GET[ 'acao' ]) {
        case 'busca_cidade':
            
            // seta a classe de estado
            $estado = new Estado();

            if( !is_integer( $_GET['estado'] ) ) {
                echo json_encode( [ 'error' => 'Busca irregular' ] );
                break;
            }

            // pega os estados
            $estado = $estado->getById( $_GET['estado'] );

            // verifica se existe estado
            if( count( $estado ) == 0 ) echo json_encode( [ 'error' => 'estado informado inexistente' ] );
            
            if( strlen( $_GET['cidade'] ) > 20 ) {
                echo json_encode( [ 'error' => 'Busca irregular' ] ); 
                break;
            }           

            // seta a classe de estado
            $cidade = new Cidade();

            // pega os estados
            $cidades = $cidade->getCidadeByNome( urldecode( $_GET['cidade'] ), $_GET['estado'] );
            
            if( count( $cidades ) == 0 ) echo json_encode( [] );
            else echo json_encode( $cidades );
            break;

        case 'estados':
            
            // seta a classe de estado
            $estado = new Estado();

            // pega os estados
            $estados = $estado->get();

            echo json_encode( $estados );
            break;
        
        default:
        
            break;
    }

?>
