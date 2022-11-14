<?php

$test_table_data = [
    'tableHeaders' => [
        'ID',
        'Name',
        'Email',
        'Phone',
        'Address',
        'City',
        'State',
        'Zip',
    ],
    'tableRows' => [
        [
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'test@email.com',
            'phone' => '555-555-5555',
            'address' => '123 Main St',
            'city' => 'New York',
            'state' => 'NY',
            'zip' => '12345',
        ],
    ]
];


function generateTable($tableData)
{
    if (is_array($tableData)) {
        $tableHeaders = $tableData['tableHeaders'];
        $tableRows = $tableData['tableRows'];

        if (is_array($tableHeaders) && is_array($tableRows)) {
            $table = '<table class="table table-responsive table-dark table-striped table-hover table-bordered table-sm">';
            $table .= '<thead class="thead-dark">';
            $table .= '<tr>';

            // Generate the table headers
            foreach ($tableHeaders as $header) {
                $table .= '<th>' . $header . '</th>';
            }

            $table .= '</tr>';
            $table .= '</thead>';
            $table .= '<tbody>';

            // we need to generate the table row
            foreach ($tableRows as $row) {
                $table .= '<tr>';

                // we need to generate the table row data
                foreach ($row as $data) {
                    $table .= '<td >' . $data . '</td>';
                }

                $table .= '</tr>';
            }

            $table .= '</tbody>';
            $table .= '</table>';

            echo $table;
        }
    }
}
