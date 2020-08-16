<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" type="text/css" href="static/css/bootstrap.min.css" />
        
        <script type="text/javascript" src="static/js/jquery.js"></script>
        
        <script type="text/javascript" src="static/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="static/js/bootstrap.min.js"></script>
        
        <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css/"/>
 
        <script type="text/javascript" src="DataTables/datatables.min.js"></script>

        <title>Index</title>

        <style>
            .animated {
                animation-duration: 3s;
                animation-fill-mode: both;
                animation-iteration-count: infinite;
                animation-direction: normal;
            }

            @keyframes bounce {

                0%,
                20%,
                50%,
                80%,
                100% {
                    transform: translateY(0);
                }

                40% {
                    transform: translateY(-10px);
                }

                60% {
                    transform: translateY(-5px);
                    text-shadow: 0.5px 1px 1px grey;
                }
            }

            :hover.bounce {
                animation-name: bounce;
            }
        </style>
        
        <script>
            $(document).ready(function(){
                
               
            });
            function mydelete(eid){
                //alert('jhh');
                $("#confirmtag").attr("href","deleteresponse.php?eid="+eid);
                //alert($("#confirmtag").attr("href"));
                $("#btnmodal").click();
                
            }
            
        </script>

    </head>
    <body>

        <?php
        require_once './connection.php';
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["eid"])){
                $eid=$_POST["eid"];
                $result=$conn->query("select * from empmaster where eid=".$eid.";");
            }
            
        }
        
        try{
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                if(isset($_GET["eid"])){
                    $eid=$_GET["eid"];
                if(!empty($eid))
                $result=$conn->query("select * from empmaster where eid=".$eid.";");
                }
                else {
                $result = $conn->query("select * from empmaster;");
            }
            }
        } catch (Exception $ex) {
                $result = $conn->query("select * from empmaster limit 10;");
        }
        ?>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand animated bounce" href="#">EMPLOYEE MANAGMENT SYSTEM</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="insert.php">Add Employee</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" method="post" action="index.php">
                    <input class="form-control mr-sm-2" required="required" name="eid" type="number" placeholder="Enter employee id" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
            </div>
        </nav>

        <table id="maintable" class="table table-hover table-dark table-bordered">
            <thead>
                <tr>
                    <th scope="col">Eid</th>
                    <th scope="col">Name</th>
                    <th scope="col">Emailid</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Mobileno</th>
                    <th scope="col">DOB</th>
                    <th scope="col">Dept name</th>
                    <th scope="col">Salary</th>
                    <th scope="col">UPDATE</th>
                    <th scope="col">DELETE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                try{
                if($result!=NULL)
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        ?>        
                        <tr>

                            <?php
                            foreach ($row as $entry) {
                                ?>    
                                <td><?php echo $entry ?></td>
                            <?php } ?>
                                
                                <td><a  href="update.php?eid=<?php echo $row['eid']?>" class="btn btn-warning" style="color:white;">Update</a></td>   
                                <td><button onclick="mydelete(<?php echo $row['eid']?>)"  class="btn btn-danger">Delete</button></td>
                        </tr>
                        <?php
                    }
                }
                }
             catch (Exception $ex){
     
            }
                //$conn->close();
                ?>

            </tbody>
        </table>
        
        <!-- Button trigger modal -->
        <button type="button" id="btnmodal" class="btn btn-primary"  hidden data-toggle="modal" data-target="#ModalScrollable">
            Launch demo modal
        </button>

        <!-- Modal -->
        <div class="modal fade" id="ModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalScrollableTitle">DELETE THE MEMBER</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modalbody">
                       Once the member is deleted , database cannot be rollbacked to the previous state
                       and the employee id cannot be further assigned to any new or current member.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cancel</button>
                        <a id="confirmtag" class="btn btn-danger" href="">DELETE</a>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function(){
                $("#maintable").DataTable();

            });
        </script>
    </body>
</html>
