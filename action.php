<?php 

require_once 'db.php';

$db = new Database();
if(isset($_POST['action']) && $_POST['action'] == "view"){
    $output = '';
    $data = $db->read();
    if($db->totalRowCount()>0){
        $output .=  '<table class="table table-striped table-sm table-bordered">
        <thead>
            <tr class="text-center">
                <th>ID</th>
                <th>Email</th>
                <th>Last Name</th>
                <th>First Name</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>';
        foreach($data as $row){
            $output .= '<tr class="text-center text-secondary">
            <td> '. $row['id'] .' </td>
            <td>' . $row['first_name'] .' </td>
            <td> '. $row['last_name'] .' </td>
            <td> '. $row['email'] .' </td>
            <td> '. $row['phone'] .' </td>
            <td>
                <a href="#" id="'. $row['id'] .'" title="View Deatils" class="text-sucsses infoBtn">
                    <i class="fa-solid fa-circle-info"></i>&nbsp;
                </a>

                <a href="#" id="'. $row['id'] .'" title="Edit" class="text-primary editBtn" data-toggle="modal" data-target="#editUserModal">
                    <i class="fas fa-edit fa-lg"></i>&nbsp;
                </a>

                <a href="#" id="'. $row['id'] .'" title="Delete" class="text-danger delBtn">
                    <i class="fas fa-trash fa-lg"></i>
                </a>
            </td>
            </tr>
            '; 
        }
        $output .= '</tbody></table>';
        echo $output;
    }

    else{
        echo '<h3 class="text-center text-secondary mt-5">: No Record Found!</h3>';
    }
}

if(isset($_POST['action']) && $_POST['action'] == "insert"){

    $data = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone'],
    ];
    $db->insert($data);
}

if (isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $row = $db->getUserByID($id);
    echo json_encode($row);
}

if (isset($_POST['action']) && $_POST['action'] == "update") {
    $id = $_POST['id'];
    $data = [
        'fname' => $_POST['fname'],
        'lname' => $_POST['lname'],
        'email' => $_POST['email'],
        'phone' => $_POST['phone']
    ];
    $row = $db->update($id, $data);
}

if (isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    if ($db->delete($id)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
}