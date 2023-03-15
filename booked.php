<header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h1 class="text-uppercase text-white font-weight-bold">Booked</h1>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
        </header>


<?php include('koneksi.php'); 
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
<div class="container-fluid">
	<div class="col-lg-12">
		<div class="row mt-3">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered">
							<thead>
								<th>#</th>
                                <th>Name</th>
								<th>Category</th>
								<th>Reference</th>
								<th>Check In</th>
								<th>Check Out</th>
								<th>Status</th>
								
							</thead>
							<tbody>
								<?php 
								$i = 1;
								$checked = $conn->query("SELECT * FROM checked where status = 0 order by status desc, id asc");
								while($row=$checked->fetch_assoc()):
								?>
								<tr>
									<td class="text-center"><?php echo $i++ ?></td>
                                    <td class=""><?php echo $row['name'] ?></td>
									<td class="text-center"><?php echo $cat_arr[$row['booked_cid']]['name'] ?></td>
									<td class=""><?php echo $row['ref_no'] ?></td>
									<td class=""><?php echo $row['date_in'] ?></td>
									<td class=""><?php echo $row['date_out'] ?></td>
									<td class="text-center"><span class="badge badge-warning">Booked</span></td>	
																	
								</tr>
							<?php endwhile; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


