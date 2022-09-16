<?php 
    require "data_fungsi.php";
    
    $role = checkData($_POST["username"], $_POST["password"], $user);

    function checkData($username, $password, $array){
        foreach ($array as $record) {
            if ($username == $record["username"] && $password == $record["password"]) {
                return $record["role"];
            }
        }
        header("location: login.php?error");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tabel</title>
    
</head>
<body>
    <h1>Data siswa (<?= $role?>)</h1>
    <?php if($role == "siswa") :?>
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
            </tr>
            <?php foreach($user as $i  => $record) :?>
                <tr>
                    <td><?= $i+1?></td>
                    <td>
                        <img src="image/<?= $record['image']?>.jpg" width="200px">
                    </td>
                    <td><?= $record["nama"]?></td>
                </tr>
            <?php endforeach?>
        </table>
    <?php endif?>
    <?php if($role == "admin") :?>
        <table border="1" cellspacing="0" cellpadding="20">
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
            <?php foreach($user as $i => $record) :?>
                <tr>
                    <td><?= $i+1?></td>
                    <td>
                        <img src="image/<?= $record['image']?>.jpeg" width="200px">
                    </td>
                    <td><?= $record["nama"]?></td>
                    <td>
                        <a href="detail.php?username=<?= $record["username"]?>
                        &password=<?= $record["password"]?>
                        &nama=<?=$record["nama"]?>
                        &alamat=<?=$record["alamat"]?>
                        &tlp=<?=$record["tlp"]?>
                        &image=<?=$record["image"]?>"><button type="submit" name="submit">detail</button></a>
                    </td>
                </tr>
            <?php endforeach?>
        </table>
    <?php endif?>
    <br>
    <a href="login.php"><button>back</button></a>
</body>
</html>