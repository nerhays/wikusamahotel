<!DOCTYPE html>
<html>
<head>
    <title>Wikusama Hotel</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
    <script type="text/javascript" src="assets/js/jquery.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
</head>
<body>

    <?php
    session_start();
    include 'koneksi.php';
    $cat = $koneksi->query("SELECT * FROM room_categories");
    $cat_arr = array();
    while($row = $cat->fetch_assoc()){
	$cat_arr[$row['id']] = $row;
    }
    $room = $koneksi->query("SELECT * FROM rooms");
    $room_arr = array();
    while($row = $room->fetch_assoc()){
	$room_arr[$row['id']] = $row;
    }
    ?>

    <div class="container">

        <div class="col-md-10 col-md-offset-1">
            <?php
            $id = isset($_GET['id']) ? $_GET['id'] : '';
            $check = mysqli_query($koneksi,"select * from checked where id='$id'");
            $calc_days = abs(strtotime('date_out') - strtotime('date_in')) ; 
            $calc_days =floor($calc_days / (60*60*24)  );
            $t=mysqli_fetch_array($check)
                ?>
                <center><h2>Wikusama Hotel</h2></center>
                <h3></h3>
                <br/>
                <br/>
                <table class="table">
                    <tr>
                        <th width="20%">Reference Nomor</th>
                        <th>:</th>
                        <td><?php echo $t['ref_no']; ?></td>
                    </tr>
                    <tr>
                        <th width="20%">Room</th>
                        <th>:</th>
                        <td><?php echo $room_arr[$t['booked_cid']]['room']; ?></td>
                    </tr>
                    <tr>
                        <th width="20%">Room Category</th>
                        <th>:</th>
                        <td><?php echo $cat_arr[$t['booked_cid']]['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>:</th>
                        <td><?php echo $t['name'] ?></td>
                    </tr>
                    <tr>
                        <th>Contact</th>
                        <th>:</th>
                        <td><?php echo $t['contact_no']; ?></td>
                    </tr>
                    <tr>
                        <th>Check-in Date/Time</th>
                        <th>:</th>
                        <td><?php echo date("M d, Y h:i A",strtotime($t['date_in'])); ?></td>
                    </tr>
                    <tr>
                        <th>Check-out Date/Time</th>
                        <th>:</th>
                        <td><?php echo date("M d, Y h:i A",strtotime($t['date_out'])); ?></td>
                    </tr>
                    <tr>
                        <th>Days</th>
                        <th>:</th>
                        <td><?php echo $t[$calc_days]; ?></td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <th>:</th>
                        <td><?php echo '$'.number_format($t['price'] * $calc_days ,2); ?></td>
                    </tr>

                    
                    <?php
                
                ?>
            </div>
        </div>
		<script type="text/javascript">
        window.print();
    </script>
    </body>
    </html>
