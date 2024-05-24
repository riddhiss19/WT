<!DOCTYPE html>
<html>
<head>
	<title>Electricity Bill Calculator</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<style>
        body{
            background-color: #EDFFE1;

        }
		.container {
			margin-top: 50px;
		}
        #myVideo {
            position: fixed;
            right: 0;
            bottom: 0;
            min-width: 100%;
            min-height: 100%;
        }
	</style>
</head>
<body>
    <video autoplay muted loop id="myVideo">
         <source src="https://videocdn.cdnpk.net/cdn/content/video/free/2023-01/large_preview/221206_01_Currency_4k_004.mp4?filename=1680697_electricity_Euros_domestic%20finances_3840x2160.mp4" type="video/mp4">
    </video>
	<div class="container">
		<div class="row">
			<div class="col-md-6 offset-md-3">
				<div class="card">
					<div class="card-header">
						<h5 class="card-title text-center">Electricity Bill Calculator</h5>
					</div>
					<div class="card-body">
						<form method="post" action="">
							<div class="form-group">
								<label for="units">Enter number of units:</label>
								<input type="number" name="units" id="units" class="form-control" required>
							</div>
							<div class="d-flex justify-content-center"><button type="submit" name="calculate" class="btn btn-primary">Calculate</button></div>
						</form>
                        <br><br>
						<?php
                        if (isset($_POST['calculate'])) {
                            $units = $_POST['units'];
                            if ($units <= 50) {
                                $bill = $units * 3.50;
                            } elseif ($units > 50 && $units <= 150) {
                                $bill = (50 * 3.50) + (($units - 50) * 4.00);
                            } elseif ($units > 150 && $units <= 250) {
                                $bill = (50 * 3.50) + (100 * 4.00) + (($units - 150) * 5.20);
                            } else {
                                $bill = (50 * 3.50) + (100 * 4.00) + (100 * 5.20) + (($units - 250) * 6.50);
                            }

                            // Display the bill in a neat format
                            echo "<table class='table table-bordered'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Units</th>";
                            echo "<th>Rate</th>";
                            echo "<th>Amount</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            if ($units <= 50) {
                                echo "<tr>";
                                echo "<td>1-50</td>";
                                echo "<td>Rs. 3.50</td>";
                                echo "<td>" . ($units * 3.50) . "</td>";
                                echo "</tr>";
                            } else {
                                echo "<tr>";
                                echo "<td>1-50</td>";
                                echo "<td>Rs. 3.50</td>";
                                echo "<td>Rs. " . (50 * 3.50) . "</td>";
                                echo "</tr>";
                                $units -= 50;
                                if ($units <= 100) {
                                    echo "<tr>";
                                    echo "<td>51-150</td>";
                                    echo "<td>Rs. 4.00</td>";
                                    echo "<td>Rs. " . ($units * 4.00) . "</td>";
                                    echo "</tr>";
                                } else {
                                    echo "<tr>";
                                    echo "<td>51-150</td>";
                                    echo "<td>Rs. 4.00</td>";
                                    echo "<td>Rs. " . (100 * 4.00) . "</td>";
                                    echo "</tr>";
                                    $units -= 100;
                                    if ($units <= 100) {
                                        echo "<tr>";
                                        echo "<td>151-250</td>";
                                        echo "<td>Rs. 5.20</td>";
                                        echo "<td>Rs. " . ($units * 5.20) . "</td>";
                                        echo "</tr>";
                                    } else {
                                        echo "<tr>";
                                        echo "<td>151-250</td>";
                                        echo "<td>Rs. 5.20</td>";
                                        echo "<td>Rs. " . (100 * 5.20) . "</td>";
                                        echo "</tr>";
                                        $units -= 100;
                                        echo "<tr>";
                                        echo "<td>Rest $units</td>";
                                        echo "<td>Rs. 6.50</td>";
                                        echo "<td>Rs. " . ($units * 6.50) . "</td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                            echo "<tr>";
                            echo "<td colspan='2' class='text-right'>Total</td>";
                            echo "<td>Rs. <b>" . $bill . "</b></td>";
                            echo "</tr>";
                            echo "</tbody>";
                            echo "</table>";
                        }
                        ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>