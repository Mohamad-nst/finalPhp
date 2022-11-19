<?php
class NotFound extends Controller{
    public function index(){
        return $this->views("NotFound/404");
    }
}