<?php
session_start();

if (isset($_SESSION['username'])){

    if(isset($_POST['key'])){

        include '../db.connection.php';

        $key = "%{$_POST['key']}%";

        $sql = "SELECT * FROM users WHERE username LIKE ? OR name LIKE ?";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$key, $key]);

        if($stmt->rowCount()>0){
            $users = $stmt->fetchAll();

            foreach($users as $user) {
                if($user['user_id'] == $_SESSION['user_id']) continue;

            ?>
            <li class="list-group-item">
                    <a href="chat.php?user=<?=$user['username']?>" class="d-flex
                                            justify-content-between
                                            align-items-center p-2">
                    <div class="d-flex align-items-center">
                        <img src="img/1.png" alt="" class="w-10 rounded-circle">
                        <h3 class="fs-xs m-2"><?php echo $user['name'] ?></h3>
                    </div>
                    </a>
                    </li>
            <?php } ?>

      <?php  }else{ ?>
            <div class="alert alert-info" role="alert">
                <i class="fa fa-comments d-block fs-big"></i>
                The user "<?=htmlspecialchars($_POST['key'])?>" is not found.
             </div>
      <?php  }


    }



}else{
    header("Location: ../../index.php");
    exit;
}
?>