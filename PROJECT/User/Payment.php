<?php 
include("SessionValidation.php");
include("../Assets/Connection/Connection.php");
$uId=$_SESSION['uid'];
//Premium 
if(isset($_GET['action0']))
{
    if(isset($_POST["btnpay"]))
    {
        $selSub="select max(sub_id) as id from tbl_subscription where user_id=".$_SESSION['uid'];
        $SubData=$con->query($selSub);
        if($Subdata=$SubData->fetch_assoc())
        {
            //Package Days
            $packageId=$_GET['action0'];
            $package="select package_days from tbl_package where package_id='".$packageId."'";
            $resultP=$con->query($package);
            $days=$resultP->fetch_assoc();
            //Expire date update
            $up ="update tbl_subscription set sub_status='1',sub_exp=DATE_ADD(curdate(),INTERVAL ".$days['package_days']." DAY ) where sub_id=".$Subdata['id'];
            if($con->query($up))
            {
                header('location: Success.php');
            }
        }
    }
}
//Premium Renew
else if(isset($_GET['reNew']))
{
    $subId=$_GET['reNew'];
    $subSel="select * from tbl_subscription s inner join tbl_package p on p.package_id=s.package_id where sub_id='". $subId."'";
    $SUBdata=$con->query($subSel);
    $SUBDATA=$SUBdata->fetch_assoc();
    if(isset($_POST["btnpay"]))
    {
        $reNew="update tbl_subscription set sub_status='1',sub_exp=DATE_ADD(curdate(),INTERVAL ".$SUBDATA['package_days']." DAY ) where sub_id='".$subId."'";
        $con->query($reNew);
        header('location: Success.php');
    }
}
//Buy
else if(isset($_GET['action']))
{
    if(isset($_POST["btnpay"]))
    {
        $selbooking="select max(booking_id) as id from tbl_booking where user_id=".$_SESSION['uid'];
        $bookingdata=$con->query($selbooking);
        if($bdata=$bookingdata->fetch_assoc())
        {
            $up ="update tbl_booking set booking_status='1' where booking_id=".$bdata['id'];
            //Data for inserting into wallet
            $slctbooking="select * from tbl_booking where booking_id=".$bdata['id'];
            $resultbooking=$con->query($slctbooking);
            $databooking=$resultbooking->fetch_assoc();
            
            $selectWallet="select * from tbl_books where book_id=".$databooking['book_id'];
            $resultWallet=$con->query($selectWallet);
            $dataWallet=$resultWallet->fetch_assoc();
            // Inserting into wallet
            $bookSell = $dataWallet['book_sell'];
            $authorId = $dataWallet['book_author'];
            $amt = $bookSell - ($bookSell * 0.3);
            $insWallet = "insert into tbl_wallet(wallet_date, wallet_credited, author_id) values (curdate(),$amt, $authorId)";
            if($con->query($up) && $con->query($insWallet))
            {
                header('location: Success.php');
            }
        }
    }
}
//Rent
else if(isset($_GET['action2']))
{
    if(isset($_POST["btnpay"]))
    {
        $selbooking="select max(rent_id) as id from tbl_rent where user_id=".$_SESSION['uid'];
        $bookingdata=$con->query($selbooking);
        if($bdata=$bookingdata->fetch_assoc())
        {
            //Collecting data
            $QueryForBData="select * from tbl_rent where rent_id=".$bdata['id'];
            $QueryforBdataRsult=$con->query($QueryForBData);
            $BookidForwallet=$QueryforBdataRsult->fetch_assoc();
            //Data for inserting into wallet
            $selectWallet="select * from tbl_books where book_id=".$BookidForwallet['book_id'];
            $resultWallet=$con->query($selectWallet);
            $dataWallet=$resultWallet->fetch_assoc();
            // Inserting into wallet
            $bookSell = $dataWallet['book_rent'];
            $authorId = $dataWallet['book_author'];
            $amt = $bookSell - ($bookSell * 0.3);
            //Insert query for wallets
            $insWallet = "insert into tbl_wallet(wallet_date, wallet_credited, author_id) values (curdate(),$amt,$authorId)";
            //Update rent status
            $up ="update tbl_rent set rent_status='1',rent_exp=DATE_ADD(curdate(),INTERVAL 30 DAY )where rent_id=".$bdata['id'];
            if($con->query($up) && $con->query($insWallet))
            {
                header('location: Success.php');
            }
        }
    }
}
//Rent Renew
else if(isset($_GET['reRent']))
{
    if(isset($_POST["btnpay"]))
    {
        $selbooking="select * from tbl_rent r inner join tbl_books b on b.book_id=r.book_id inner join tbl_author a on a.author_id=b.book_author where rent_status=3 and user_id=".$_SESSION['uid']." and rent_id=".$_GET['reRent'];
        $bookingdata=$con->query($selbooking);
        if($bdata=$bookingdata->fetch_assoc())
        {
            // Inserting into wallet
            $bookSell = $bdata['book_rent'];
            $authorId = $bdata['book_author'];
            $amt = $bookSell - ($bookSell * 0.3);
            //Insert query for wallets
            $insWallet = "insert into tbl_wallet(wallet_date, wallet_credited, author_id) values (curdate(),$amt,$authorId)";
            //Update rent status
            $up ="update tbl_rent set rent_status='1',rent_exp=DATE_ADD(curdate(),INTERVAL 30 DAY )where rent_id=".$bdata['rent_id']." and user_id=".$_SESSION['uid'];
            if($con->query($up))
            {
                header('location: Success.php');
            }
        }
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <title>Payment</title>
        <link rel="stylesheet" href="./style.css">
        <style>
            @import url('https://fonts.googleapis.com/css?family=Baloo+Bhaijaan|Ubuntu');
            
            *{
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Ubuntu', sans-serif;
            }

            body{
                background: #2196F3;
                margin: 0 10px;
            }

            .payment{
                background: #f8f8f8;
                max-width: 360px;
                margin: 80px auto;
                height: auto;
                padding: 35px;
                padding-top: 70px;
                border-radius: 5px;
                position: relative;
            }

            .payment h2{
                text-align: center;
                letter-spacing: 2px;
                margin-bottom: 40px;
                color: #0d3c61;
            }

            .form .label{
                display: block;
                color: #555555;
                margin-bottom: 6px;
            }

            .input{
                padding: 13px 0px 13px 25px;
                width: 100%;
                text-align: center;
                border: 2px solid #dddddd;
                border-radius: 5px;
                letter-spacing: 1px;
                word-spacing: 3px;
                outline: none;
                font-size: 16px;
                color: #555555;
            }

            .card-grp{
                display: flex;
                justify-content: space-between;
            }

            .card-item{
                width: 48%;
            }

            .space{
                margin-bottom: 20px;
            }

            .icon-relative{
                position: relative;
            }

            .icon-relative .fas,
            .icon-relative .far{
                position: absolute;
                bottom: 12px;
                left: 15px;
                font-size: 20px;
                color: #555555;
            }

            .btn{
                margin-top: 40px;
            }


            .payment-logo{
                position: absolute;
                top: -50px;
                left: 50%;
                transform: translateX(-50%);
                width: 100px;
                height: 100px;
                background: #f8f8f8;
                border-radius: 50%;
                box-shadow: 0 0 5px rgba(0,0,0,0.2);
                text-align: center;
                line-height: 85px;
            }

            .payment-logo:before{
                content: "";
                position: absolute;
                top: 5px;
                left: 5px;
                width: 90px;
                height: 90px;
                background: #2196F3;
                border-radius: 50%;
            }

            .payment-logo p{
                position: relative;
                color: #f8f8f8;
                font-family: 'Baloo Bhaijaan', cursive;
                font-size: 58px;
            }

            input[type=submit] {
                background-color: #2196F3;
                border: none;
                color: #f8f8f8;
                font-size: 16px;
                padding: 12px;
                text-align: center;
                border-radius: 5px;
                cursor: pointer;
                width: 100%;
            }

            @media screen and (max-width: 420px){
                .card-grp{
                    flex-direction: column;
                }
                .card-item{
                    width: 100%;
                    margin-bottom: 20px;
                }
                .btn{
                    margin-top: 20px;
                }
            }
        </style>
    </head>
    <body>
        <!-- partial:index.partial.html -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css">

        <div class="wrapper">
            <div class="payment">
                <div class="payment-logo">
                    <p>p</p>
                </div>
                <h2>Payment Gateway</h2>
                <div class="form">
                    <form method="post">
                        <div class="card space icon-relative">
                            <label class="label">Card holder:</label>
                            <input type="text" class="input" placeholder="Card Holder">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="card space icon-relative">
                            <label class="label">Card number:</label>
                            <input type="text" class="input" data-mask="0000 0000 0000 0000" placeholder="Card Number">
                            <i class="far fa-credit-card"></i>
                        </div>
                        <div class="card-grp space">
                            <div class="card-item icon-relative">
                                <label class="label">Expiry date:</label>
                                <input type="text" name="expiry-data" class="input" data-mask="00 / 00" placeholder="00 / 00">
                                <i class="far fa-calendar-alt"></i>
                            </div>
                            <div class="card-item icon-relative">
                                <label class="label">CVV:</label>
                                <input type="text" class="input" data-mask="000" placeholder="000">
                                <i class="fas fa-lock"></i>
                            </div>
                        </div>
                        <div class="btn">
                            <input type="submit" name="btnpay" id="btnpay" value="Pay">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- partial -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js'></script><script  src="./script.js"></script>

    </body>
</html>