<?php 

abstract class Node {
    private Node $next;
    protected function setNextNode($next) {
        $this->next = $next;
    }
    public function validate($credential) {
        if(isset($this->next)) {
            return $this->next->validate($credential);
        }
        return false;
    }
}
