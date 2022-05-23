<?php

    
        $conn = new PDO('mysql:host=localhost;dbname=transporte_executivo_db', 'root', 'Adrzinho@13');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "connect succeffuly";
    