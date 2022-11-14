<?php

$acceptableTableNames = [
    'departments',
    'roles',
    'employees',
];
// create a helper that will either get all departments, roles, or employees

function getAll($tableName)
{
    global $acceptableTableNames;
    if (in_array($tableName, $acceptableTableNames)) {
        include_once 'lib/db/controllers/' . $tableName . '.php';
        $functionName = 'getAll' . ucfirst($tableName);
        return $functionName();
    }
    return [];
}


function getAllAndGenerate($tableName)
{
    global $acceptableTableNames;
    if (in_array($tableName, $acceptableTableNames)) {
        include_once 'lib/utils/table-generator.php';
        $tableData = getAll($tableName);
        // generate table headers from the role data
        $headerData = is_array($tableData) ? $tableData[0] : [];
        $tableHeaders = array_keys($headerData);

        // generate table rows from the role data
        $tableData = [
            'tableHeaders' => $tableHeaders,
            'tableRows' => $tableData,
        ];

        echo "<h1>All " . ucfirst($tableName) . "</h1>";
        generateTable($tableData);
    }
}
