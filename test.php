<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
EDITOR === HARSHIL RATHOD

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
    
    </head>
    <body>
        <?php
        require_once './connection.php';
        $sql = "select * from empmaster; ";
        $result = $conn->query($sql);
        ?>


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
                </tr>
            </thead>
            <tbody>
                <?php
                try {
                    if ($result != NULL)
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>        
                                <tr>

                                    <?php
                                    foreach ($row as $entry) {
                                        ?>    
                                        <td><?php echo $entry ?></td>
                                    <?php } ?>


                                </tr>
                                <?php
                            }
                        }
                } catch (Exception $ex) {
                    
                }
                //$conn->close();
                ?>

            </tbody>
        </table>
<script>
            $(document).ready(function(){
                $("#maintable").DataTable();

            });
        </script>
    </body>
</html>
