<?php
include_once 'lib/utils/table-generator.php';
include_once 'lib/db/controllers/roles.php';

// fetch role data from the database
$roleData = getAllRoles();
// generate table headers from the role data
$headerData = is_array($roleData)? $roleData[0]:[];
$tableHeaders = array_keys($headerData);

// generate table rows from the role data
$tableData = [
    'tableHeaders' => $tableHeaders,
    'tableRows' => $roleData,
];

echo "<h1>All Roles</h1>";
generateTable($tableData);
