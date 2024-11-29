<?php

$myid = $_SESSION['user_id'];

//myreleased count
$my_released_query = "SELECT COUNT(*) AS myreleased FROM requests WHERE user_id = $myid AND status = 'RELEASED'";
$my_released_count_stmt = $con->prepare($my_released_query);
$my_released_count_stmt->execute();
$my_released_result = $my_released_count_stmt->get_result();
$row_myreleased = $my_released_result->fetch_assoc();
$my_released = $row_myreleased['myreleased'];
$my_released_count_stmt->close();

//mypending count
$my_pending_query = "SELECT COUNT(*) AS mypending FROM requests WHERE user_id = $myid AND status = 'PENDING'";
$my_pending_count_stmt = $con->prepare($my_pending_query);
$my_pending_count_stmt->execute();
$my_pending_result = $my_pending_count_stmt->get_result();
$row_mypending = $my_pending_result->fetch_assoc();
$my_pending = $row_mypending['mypending'];
$my_pending_count_stmt->close();

//all pending count
$all_pending_query = "SELECT COUNT(*) AS allpending FROM requests WHERE status = 'PENDING'";
$all_pending_count_stmt = $con->prepare($all_pending_query);
$all_pending_count_stmt->execute();
$all_pending_result = $all_pending_count_stmt->get_result();
$row_allpending = $all_pending_result->fetch_assoc();
$all_pending = $row_allpending['allpending'];
$all_pending_count_stmt->close();

//all released count
$all_released_query = "SELECT COUNT(*) AS allreleased FROM requests WHERE status = 'RELEASED'";
$all_released_count_stmt = $con->prepare($all_released_query);
$all_released_count_stmt->execute();
$all_released_result = $all_released_count_stmt->get_result();
$row_allreleased = $all_released_result->fetch_assoc();
$all_released = $row_allreleased['allreleased'];
$all_released_count_stmt->close();

//all voters count
$all_voters_query = "SELECT COUNT(*) AS voters FROM users WHERE voter = 'YES' AND role != 'admin'";
$all_voters_count_stmt = $con->prepare($all_voters_query);
$all_voters_count_stmt->execute();
$all_voters_result = $all_voters_count_stmt->get_result();
$row_allvoters = $all_voters_result->fetch_assoc();
$all_voters = $row_allvoters['voters'];
$all_voters_count_stmt->close();

//all non voters count
$all_voters_query = "SELECT COUNT(*) AS voters FROM users WHERE voter = 'NO' AND role != 'admin'";
$all_voters_count_stmt = $con->prepare($all_voters_query);
$all_voters_count_stmt->execute();
$all_voters_result = $all_voters_count_stmt->get_result();
$row_allvoters = $all_voters_result->fetch_assoc();
$all_non = $row_allvoters['voters'];
$all_voters_count_stmt->close();

//all non voters count
$all_voters_query = "SELECT COUNT(*) AS voters FROM users WHERE role = 'user'";
$all_voters_count_stmt = $con->prepare($all_voters_query);
$all_voters_count_stmt->execute();
$all_voters_result = $all_voters_count_stmt->get_result();
$row_allvoters = $all_voters_result->fetch_assoc();
$all_pop = $row_allvoters['voters'];
$all_voters_count_stmt->close();
