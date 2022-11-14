<?php
include_once 'lib/db/index.php';
global $db;

$db = new DB();

function getAllDepartments()
{
    global $db;
    try {
        $query = "SELECT * FROM departments";
        $results = $db->query($query);

        $data =[];

        while ($row = $results->fetch_assoc()) {
            $data[] = $row;
        }

        return $data;
    } catch (\Throwable $th) {
        return null;
    }
    
}
