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


function createDepartment($departmentName)
{
    global $db;
    $db = $db ?? new DB();
    // capitalize the first letter of each word
    $departmentName = ucwords($departmentName);
    try {
        $query = "INSERT INTO departments (department_name) VALUES (?)";

        $stmt = $db->conn->prepare($query);
        $stmt->bind_param('s', $departmentName);
        $stmt->execute();
        $stmt->close();
        // get the id of the newly created department
        return $db->conn->insert_id;
    } catch (\Throwable $th) {
        return null;
    }
}
