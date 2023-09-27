<?php 
require_once "Node.php";
require_once "BasicNode.php";
require_once "JwtNode.php";
require_once "GeoNode.php";
class AuthChain {
    private Node $rootNode;
    public function __construct(){
        $this->rootNode = new BasicNode(
            new JwtNode(
                new GeoNode()
            )
        );
    }
    public function validate($credentials){
        return $this->rootNode->validate($credentials);
    }
}

?>