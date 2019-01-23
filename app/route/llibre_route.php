
<?php
use App\Model\Llibre;

$app->group('/llibre/', function () {

    $this->get('', function ($req, $res, $args) {
        $obj = new Llibre();   
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->getAll()
            )
        );
    });
    
    $this->get('{id}', function ($req, $res, $args) {
        $obj = new Llibre();   
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->getOne($args["id"])
            )
        );         
    });
    $this->get('{id}/autors', function ($req, $res, $args) {
        $obj = new Llibre();   
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->getAutors($args["id"])
            )
        );         
    });
           
    $this->post('', function ($req, $res, $args) {
            $atributs=$req->getParsedBody();  //llista atributs del client
            $obj = new Llibre();
            return $res
               ->withHeader('Content-type', 'application/json')
               ->getBody()
               ->write(
                json_encode(
                    $obj->insert($atributs)
                )
            );             
    });

    $this->put('{id}', function ($req, $res, $args) {
        $atributs=$req->getParsedBody();  //llista atributs del client
        $atributs["id"]=$args["id"];     // Afegim id a la llista d'atributs
        $obj = new Llibre();
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->update($atributs)
            )
        ); 
    });  
    
    $this->delete('{id}', function ($req, $res, $args) {
        $obj = new llibre();   
        return $res
           ->withHeader('Content-type', 'application/json')
           ->getBody()
           ->write(
            json_encode(
                $obj->delete($args["id"])
            )
        ); 
    });
        
});

 ?>