<?php

class search{
    private $mysqli;
    
    public function __construct(){
        $this ->connect();
    }
    
    private function connect(){
        $this->mysqli = new mysqli('localhost','root',"",'logintest');
    }
    
    public function search($search_term,$search_term2){
        $sanitized = $this->mysqli->real_escape_string($search_term);
        $sanitized2 = $this->mysqli->real_escape_string($search_term2);

        
        $query = $this->mysqli->query("
        SELECT  first, last, email, industry, years, userPic, user_cv
        FROM newuser
        WHERE industry LIKE '%{$sanitized}%'
        AND years >= '$sanitized2'
        ORDER by years ASC
        ");

        

        
        /*
        $query = $this->mysqli->query("
        SELECT first, last, email, industry, years, userPic
        FROM newuser
        WHERE industry LIKE '%{$sanitized}%'
        OR years LIKE '%{$sanitized}%'
        ORDER by years DESC
        ");
        */

        //check results
        if( !$query->num_rows){
            return false;
        }
        
        
        //loop and fetch objects
        while($row = $query->fetch_object()){
            $rows[] = $row;
        }
        
        //build our return result
        $search_results = array(
        'count' => $query ->num_rows,
        'results' => $rows,
        );
        
        return $search_results;
    }
}