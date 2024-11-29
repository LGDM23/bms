<?php

    include('session.php');

    session_destroy();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo json_encode(['message' => 'Logout Successfully']);
    } else {
        echo json_encode(['error' => 'Invalid request method']);
    }
