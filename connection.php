<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
        $serverurl = "localhost";
        $user = "root";
        $password = "";
        $dbname = "employeedb";

        $conn = new mysqli($serverurl, $user, $password, $dbname);
        if ($conn->connect_error) {
            die("Error message" . $conn->connect_error);
        }
        // echo "successful";
?>
