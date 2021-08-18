<?php


class SearchController
{
    public function get($args = [])
    {   
        echo file_get_contents("../resources/pages/index.php");
    }
}
