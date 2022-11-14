<?php
include_once 'lib/utils/table-generator.php';
include_once 'lib/db/controllers/departments.php';

// fetch department data from the database
$departmentData = getAllDepartments();
// generate table headers from the department data

$headerData =is_array($departmentData)? $departmentData[0]:[];
$tableHeaders = array_keys($headerData);

// generate table rows from the department data
$tableData = [
    'tableHeaders' => $tableHeaders,
    'tableRows' => $departmentData,
];

echo "<h1'>All Departments</h1>";
generateTable($tableData);
