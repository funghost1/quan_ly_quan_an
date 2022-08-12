<!DOCTYPE html>
<html lang="en">
<?php
    include_once 'ketnoi.php';
    session_start();
    // kiểm tra số lượng giỏ hàng
   
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Responsive Food Website Design Tutorial</title>
    <link rel="stylesheet" href="../css/quancao.css">
    <link rel="stylesheet" href="../css/icon.css">
    <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" /> -->
    

    <!-- font awesome cdn link  -->
    <!-- những icon  -->
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/style.css">
    
    
   
</head>
<body>

    <section class="" id="datban">

        <h3 class="sub-heading"> order now </h3>
        <h1 class="heading"> free and fast </h1>

        <div class="form">
    
            <div class="row">
                <?php
                    
                    $sqlbanan = "SELECT * FROM `ban_an`";
                    $query = mysqli_query($conn,$sqlbanan);
                    while($row= mysqli_fetch_array($query)){
                ?>
                <div class="col-sm-6 col-lg-3 ">

                    <?php 
                        if($row['trang_thai'] == 1){
                    ?>
                            <form action="datban_giaodien.php?id=<?php echo $row['id_ban'];?>" method="POST">
                                <div class="input">  
                                    <input type="hidden" name="soban" value="<?php echo $row['id_ban']; ?>"> 
                                    <button name="datban" class="btn btn- primary" >Bàn số <?php echo $row['id_ban']; ?></button>
                                </div>
                            </form>
                    <?php }else{ ?>
                            <form action="">
                                <div class="input">   
                                    <button class="btn btn- primary" disabled>Bàn số <?php echo $row['id_ban']; ?></button>
                                </div>
                            </form>
                        <?php } ?>
                    
                </div>
                <?php } ?>
                
            </div>
        </div>
    
        

        

        

    </section>
</body>