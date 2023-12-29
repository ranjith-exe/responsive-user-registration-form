<?php

// Dummy employee data for illustration purposes
$employees = [

    
    ['id' => 1, 'name' => 'John Doe', 'position' => 'Software Engineer', 'department' => 'Engineering'],
    ['id' => 2, 'name' => 'Jane Smith', 'position' => 'Marketing Specialist', 'department' => 'Marketing'],
    ['id' => 3, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 4, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 5, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 6, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 7, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 8, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 9, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 10, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 11, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 12, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 13, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 14, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 15, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 16, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 17, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 18, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 19, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 20, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 21, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 22, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 23, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 24, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    ['id' => 25, 'name' => 'Mike Johnson', 'position' => 'Accountant', 'department' => 'Finance'],
    
];

// Pagination settings
$perPage = 5;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$search = isset($_GET['search']) ? $_GET['search'] : '';

// Filter employees based on search criteria
$filteredEmployees = array_filter($employees, function ($employee) use ($search) {
    return stripos($employee['name'], $search) !== false
        || stripos($employee['position'], $search) !== false
        || stripos($employee['department'], $search) !== false;
});

// Calculate total pages
$totalPages = ceil(count($filteredEmployees) / $perPage);

// Paginate the data
$paginatedEmployees = array_slice($filteredEmployees, ($page - 1) * $perPage, $perPage);

// Return JSON response
header('Content-Type: application/json');
echo json_encode(['employees' => $paginatedEmployees, 'totalPages' => $totalPages]);
