<<<<<<< HEAD:class-search.php
<?php

class search{
    private $mysqli;
    
    public function __construct(){
        $this ->connect();
    }
    
    private function connect(){
        $this->mysqli = new mysqli('localhost','root',"",'logintest');
    }
    
    public function search($search_term){
        $sanitized = $this->mysqli->real_escape_string($search_term);
        
        $query = $this->mysqli->query("
        SELECT first, last, email, industry, years
        FROM newuser
        WHERE industry LIKE '%{$sanitized}%'
        OR first LIKE '%{$sanitized}%'
        ORDER by years
        ");
        
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
=======
<?php

class search{
    private $mysqli;
    
    public function __construct(){
        $this ->connect();
    }
    
    private function connect(){
        $this->mysqli = new mysqli('localhost','root',"",'logintest');
    }
    
    public function search($search_term){
        $sanitized = $this->mysqli->real_escape_string($search_term);
        
        $query = $this->mysqli->query("
        SELECT first, last, email, industry, years
        FROM newuser
        WHERE industry LIKE '%{$sanitized}%'
        OR first LIKE '%{$sanitized}%'
        ORDER by years DESC
        ");
        
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
>>>>>>> 01333f06c9ceac7fd571b146e2c449aa816f304a:candidate/class-search.php
}