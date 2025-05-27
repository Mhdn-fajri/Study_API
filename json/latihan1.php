<?php

// $mahasiswa = [
//     [
//         "nama" => "Muhammad Nurul Fajri",
//         "nim" => "2217020054",
//         "email" => "muhammadnurulfajri1602@gmail.com"
//     ],
//     [
//         "nama" => "Rahmad Awal Putra",
//         "nim" => "2217020030",
//         "email" => "rahmadawalputra@gmail.com"
//     ],
//     [
//         "nama" => "Amanda Manopo",
//         "nim" => "1921993040",
//         "email" => "amandamanopo12@gmail.com"
//     ]
// ];

$dbh = new PDO('mysql:host=localhost; dbname=IAP', 'root', 
''); 
$db = $dbh->prepare('SELECT * FROM mahasiswa'); 
$db->execute(); 
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;
?>
