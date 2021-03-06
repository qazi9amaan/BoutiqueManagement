<?php session_start();?>
<?php require_once '/var/www/html/libraries/config/config.php';?>
<?php include PARENT .'/includes/header.php';?>
<?php include PARENT .'/users/admin/includes/style-scripts.php';?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $data_to_db = array_filter($_POST);
    $data_to_db['created_by'] = $_SESSION['staff_user_id'];
    $data_to_db['created_at'] = date('Y-m-d H:i:s');
    $db = getDbInstance();
    $last_id = $db->insert('specifications', $data_to_db);
    if ($last_id)
    {
        $_SESSION['success'] = 'Specification added successfully!';
        header('Location: add_specs.php');
    	exit();
    }
    else
    {
        echo 'Insert failed: ' . $db->getLastError();
        exit();
    }
}

    $edit= false;
?>

<body>
    <div class="wrapper">
    <?php include PARENT. '/users/admin/includes/navbar.php';?>
    <div id="main_content" class="container-fluid pr-0">
        <div class="header sticky-top d-flex align-items-baseline justify-content-between ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-0 m-0 bg-white">
                    <li class="breadcrumb-item"><a href="/users/admin">Home</a></li>
                    <li class="breadcrumb-item"><a href="/users/admin/admin-items/Specs/Specs.php">Specifications</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>  


        <div class="info mx-1 mt-md-5 ">
        <div class="container card">
                    <div class="row  ">
                        <div class="card-body">
                            <!-- header -->
                            <div class=" d-flex pt-3  card-footer bg-primary text-white rounded border justify-content-between align-items-baseline ">
                                <h4 class="text-uppercase  lead">Add a specification</h4>
                            </div>
                           
                        </div>
                    </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                         <?php include PARENT.'/includes/flash_messages.php'; ?>
                                </div>
                                <div class="col-12">
                                    <form class="form" action="" method="post"  enctype="multipart/form-data">
                                        <?php include PARENT.'/users/admin/forms/specification_form.php'; ?>
                                    </form>
                                </div>
                                
                             
                            </div>
                        </div>
                    </div>

        </div>
    </div>
</body>
<?php include PARENT .'/includes/scripts.php';?>
