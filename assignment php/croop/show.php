<?php
    include('database.php');
    $obj =new query();

    if(isset($_GET['type']) && $_GET['type']=='delete'){
        $id=$obj->get_safe_str($_GET['id']);
        $condition_arr=array('id'=>$id);
        $obj->deleteData('user',$condition_arr);
    }

    $page  = 1;
    $limit = 4;
    if(isset($_GET['page'])) {
        $page = $_GET['page'];
    }

    echo $page;
    // exit;

    $offset = ($page - 1) * $limit;
    // echo $offset;

    $result= $obj->getData($limit, $offset);

    $content = '
    <table id="table" class="table table-striped table-bordered">
        <thead>
            <tr class="bg-primary text-white">
                <th>SrNo.</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>
            <tbody>
    ';

    foreach($result as $row) {
        $content .= "<tr>";

        $content .= '

        <td>'.$row['id'].'</td> 
        <td>'.$row['Name'].'</td>
        <td>'.$row['email'].'</td>
        <td>'.$row['mobile'].'</td>
        
        <td align="center">
           <a href="manage-users.php?id='.$row['id'].'" class="text-primary"><i class="fa fa-fw fa-edit"></i> Edit</a>  
           <a href="?type=delete&id='.$row['id'].'" class="text-danger"><i class="fa fa-fw fa-trash"></i> Delete</a>
        </td>
        ';

        $content .= "</tr>";
       
    }
    
    $content .= "</tbody></table>";

    echo $content;
?>
<?php 
//require_once "pagination.php";
?>


