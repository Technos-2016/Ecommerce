<?php
include 'header.php';
$sqlcontact = mysqli_query($connection, "select * from contact where Status = 'Active'");
$crow = mysqli_fetch_array($sqlcontact);
$fmessage = $crow['FrontMessage'];
$city = $crow['City'];
?>

<div class="tt-breadcrumb">
    <div class="container">
        <ul>
            <li><a href="<?= base_url() ?>">Home</a></li>
            <li>Contact</li>
        </ul>
    </div>
</div>
<div id="tt-pageContent">
    <div class="container-indent nomargin">
        <div class="tt-contact-box">
            <img class="img-mobile" src="<?= base_url() ?>assests/images/custom/contact-img-01.jpg" alt="">
            <div class="container container-fluid-custom-mobile-padding">
                <h1 class="tt-title"><?php echo $fmessage;?></h1>
                <address>
                    ADDRESS &nLeftrightarrow;  <?php echo $city;?>,<br>
                    <?php echo $crow['Province']." , ". $crow['District']." , ". $crow['Country']?><br>
                    EMAIL: &nbsp;<a href="mailto:info@optolensnepal.com" style="color:#fff;">info@optolensnepal.com</a><br/>
                    PHONE:&nbsp;<a href="callto:<?php echo "%2B".$crow['Phone'];?>" style="color:#fff;"><?php echo $crow['Phone'];?></a><br/>
                    VIBER:&nbsp;<a href="viber://chat?number=<?php echo "%2B".$crow['Phone'];?>" style="color:#fff;">Start Chat</a><br/>
                    WHATSAPP:&nbsp;<a href="https://api.whatsapp.com/send?phone=<?php echo $crow['Phone'];?>" target="_new" style="color:#fff;">Send Message</a><br/>
                </address>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>