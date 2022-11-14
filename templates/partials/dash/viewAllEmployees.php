<?php
include_once 'lib/utils/table-generator.php';
include_once 'lib/db/controllers/employees.php';

// fetch employee data from the database
$employeeData = getAllEmployees();
// generate table headers from the employee data
$headerData = is_array($employeeData)? $employeeData[0]:[];
$tableHeaders = array_keys($headerData);

// generate table rows from the employee data
$tableData = [
    'tableHeaders' => $tableHeaders,
    'tableRows' => $employeeData,
];

echo "<h1>All Employees</h1>";
generateTable($tableData);
