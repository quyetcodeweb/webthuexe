<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/1147679ae7.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styletheodoithoigian.css">
    <link rel="icon" type="image/png" href="image/logocar.png">
    <title>Theo dõi thời gian</title>
</head>
<body>
	<header>
		<div class="logo">
			<a href="trangchu.php">
				<img src="image/logocar.png" height="100%" width="100%">
			</a>
		</div>
		<ul class="menu">
			<li><a class="doi-mau" href="trangchu.php#cac-loai-xe-cho-thue">TRANG CHỦ</a></li>
			<li>
				<a class="doi-mau" >DỊCH VỤ</a>
				<ul class="sub-menu">
					<div class="cat-sub-menu">
						<div class="item-list-submenu">
							<h3><a class="doi-mau" href="xemay_honda.php">HONDA</a></h3>
							<ul>
								<li><a class="doi-mau" href="xemay_honda.php#airblade">Airblade</a></li>
								<li><a class="doi-mau" href="xemay_honda.php#future">Future</a></li>
								<li><a class="doi-mau" href="xemay_honda.php#vario">Vario</a></li>
								<li><a class="doi-mau" href="xemay_honda.php#wave">Wavealpha</a></li>
								<li><a class="doi-mau" href="xemay_honda.php#winnerx">Winner</a></li>
								<li><a class="doi-mau" href="xemay_honda.php#vision">Vision</a></li>
							</ul>
						</div>
						<div class="item-list-submenu">
							<h3><a class="doi-mau" href="xemay_yamaha.php">YAMAHA</a></h3>
							<ul>
								<li><a class="doi-mau" href="xemay_yamaha.php#exciter">Exciter</a></li>
								<li><a class="doi-mau" href="xemay_yamaha.php#jupiter">Jupiter</a></li>
								<li><a class="doi-mau" href="xemay_yamaha.php#sirius">Sirius</a></li>

							</ul>
						</div>
						<div class="item-list-submenu">
							<h3><a class="doi-mau" href="xemay_suzuki.php">SUZUKI</a></h3>
							<ul>
								<li><a class="doi-mau" href="xemay_suzuki.php#smash">Smash</a></li>
								<li><a class="doi-mau" href="xemay_suzuki.php#skydrive">Skydrive</a></li>
								<li><a class="doi-mau" href="xemay_suzuki.php#raider150">Raider-150</a></li>
								<li><a class="doi-mau" href="xemay_suzuki.php#address">Address</a></li>
								<li><a class="doi-mau" href="xemay_suzuki.php#satria">Satria</a></li>
								<li><a class="doi-mau" href="xemay_suzuki.php#vstrom">V-Strom</a></li>
								<li><a class="doi-mau" href="xemay_suzuki.php#gsx">GSX-R150</a></li>
							</ul>
						</div>
						<div class="item-list-submenu">
							<h3><a class="doi-mau">XE HƠI</a></h3>
							<ul>
								<li><a class="doi-mau" href="xehoi_toyota.php">Toyota</a></li>
								<li><a class="doi-mau" href="xehoi_honda.php">Honda</a></li>
								<li><a class="doi-mau" href="xehoi_ford.php">Ford</a></li>
							</ul>
						</div>
						<div class="item-list-submenu">
							<h3><a class="doi-mau" href="xedulich.php">XE DU LỊCH</a></h3>
						</div>
					</div>
				</ul>
			</li>
			<li><a class="doi-mau" href="gioithieu.php">GIỚI THIỆU</a></li>
			<li><a class="doi-mau" href="trangchu.php#footerr">LIÊN HỆ</a></li>
			<li><a class="doi-mau" href="huongdan.php">HƯỚNG DẪN</a></li>
			<li><a class="doi-mau" href="thongtin.php">THÔNG TIN</a></li>
		</ul>
		<ul class="others">
			<li>
				<form method="post" action="search.php" class="search_row">
					<input placeholder="Tìm kiếm" name="noidung" type= "text"> 
					<button class="fas fa-search" type="submit" name="btn"></button>
				</form>
				<?php
					$conn = new mysqli('localhost', 'root', '', 'tai_khoan');
					if ($conn->connect_error) {
						die("Kết nối thất bại: " . $conn->connect_error);
					}
					if(isset($_POST['btn'])) {
						$noidung = $_POST['noidung'];
						$stmt = $conn->prepare("SELECT * FROM ttxe WHERE TenXe LIKE ?");
						$searchTerm = "%$noidung%"	;
						$stmt->bind_param("s", $searchTerm);
						$stmt->execute();
						$result = $stmt->get_result();

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()) {
								echo '<div class="cartegory-right-content-item">';
								echo '<img src="' . $row["TenFile"] . '" alt="">';
								echo '<h1>' . $row["TenXe"] . '</h1>';
								echo '<div class="item-footer">';
								echo '<span>' . ($row["GiaThue"]) . '</span>';
								echo '<a href="thanhtoan.php?id=' . $row["STT"] . '&type=xe &price=' . $row["GiaThue"] . '">Thuê ngay!</a>';
								echo '</div>';
								echo '</div>';
							}
						} else {
							echo "Không có sản phẩm nào.";
						}
						$stmt->close();
					}
					$conn->close();
				?>
			</li>
			<?php if(isset($_SESSION['username'])) { 
				$username = $_SESSION['username'];
				$customer_name = $_SESSION['customer_name'];?>
				<li>
					<a class="fa fa-user doi-mau user-icon"></a>
					<div class="show-account">
					<div class="image-container">
						<img src="image/account.png" width="150px" height="150px" style="border-radius: 50%; overflow:hidden;">
					</div>
						<?php echo "<span class='hello-message'>Xin chào, $customer_name </span>"; ?>
						
						<div class="auth__form__buttons">
							<a class="btn btn--large" href="logout.php">Đăng xuất</a>
						</div>
					</div>
				</li>
			<?php } else { ?>
				<li><a class="fa fa-user doi-mau user-icon" href="login.php"></a></li>
			<?php } ?>
			<li><a class="fa fa-key doi-mau" href="theodoi.php"></a></li>
			<li>
				<div class="shopping-window">
					<!-- Nội dung cửa sổ shopping -->
					<i class="close-icon fa fa-compress doi-mau"></i>
					<h3 style="font-size: 25px; margin:10px; color:red; border-bottom: #bcb8b8;"></h3>
					<h1 style="margin-top: 20px; margin-left: 10px;"></h1>
				</div>
				<a class="fa fa-shopping-bag doi-mau" id="shopping-icon" href="#"></a>
			</li>
		</ul>
	</header>
	<section class="countdown col">
		<div class="countdown-row">	
			<div class="cd_form">
				<div class="time_tt">
					<span>&#x23F0; Thời gian còn lại</span>
				</div>
				<?php
				// Kết nối tới cơ sở dữ liệu
				$conn = new mysqli('localhost', 'root', '', 'thong_tin');

				// Kiểm tra kết nối
				if ($conn->connect_error) {
					die("Kết nối thất bại: " . $conn->connect_error);
				}

				// Truy vấn lấy dữ liệu từ bảng ttxe với điều kiện nối với tthoadon qua Maxe
				$sql = "SELECT ttxe.Maxe, ttxe.TenXe, ttxe.TenFile, tthoadon.starttime, tthoadon.endtime
						FROM ttxe 
						INNER JOIN tthoadon ON ttxe.Maxe = tthoadon.maxe
						WHERE tthoadon.makh = 1";

				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
					$count = 0; // Bộ đếm để tạo ID duy nhất cho mỗi xe
					echo '<script>const countdowns = {};</script>';
					// Hiển thị dữ liệu
					while ($row = $result->fetch_assoc()) {
						// Lấy thời gian bắt đầu và kết thúc từ cơ sở dữ liệu
						$start_time = strtotime($row['starttime']);
						$end_time = strtotime($row['endtime']);

						// Tính toán khoảng cách thời gian
						$time_diff = $end_time - $start_time;
						$days = floor($time_diff / (60 * 60 * 24));
						$hours = floor(($time_diff % (60 * 60 * 24)) / (60 * 60));
						$minutes = floor(($time_diff % (60 * 60)) / 60);
						$seconds = $time_diff % 60;
						
						$uniqueId = "countdown_" . $count;

						echo '<div class="time_veh">';
						echo '<div class="veh_name">
								<h1>' . $row["TenXe"] . '</h1>
							  </div>';
						echo '<div class="veh_file">
								<img src="' . $row["TenFile"] . '" alt="" style="width:500px;heigth:500px;">
							  </div>';
						echo '<div class="time middle">
								  <span>
									  <div id="' . $uniqueId . '_d">' . $days . '</div>
									  Ngày
								  </span>
								  <span>
									  <div id="' . $uniqueId . '_h">' . $hours . '</div>
									  Giờ
								  </span>
								  <span>
									  <div id="' . $uniqueId . '_m">' . $minutes . '</div>
									  Phút
								  </span>
								  <span>
									  <div id="' . $uniqueId . '_s">' . $seconds . '</div>
									  Giây
								  </span>
							  </div>';
						
						echo '</div>';
						
						// Truyền dữ liệu thời gian đến JS
						echo "<script>countdowns['$uniqueId'] = {days: $days, hours: $hours, minutes: $minutes, seconds: $seconds};</script>";
						$count++;
					}
				} else {
					echo "Không có sản phẩm nào.";
				}
				$conn->close();
				?>
			</div>
		</div>
	</section>
	<script>
		for (const [key, countdown] of Object.entries(countdowns)) {
			const now = new Date().getTime();
			const countdownDate =
				now +
				countdown.days * 24 * 60 * 60 * 1000 +
				countdown.hours * 60 * 60 * 1000 +
				countdown.minutes * 60 * 1000 +
				countdown.seconds * 1000;

			function updateCountdown(uniqueId) {
				const currentTime = new Date().getTime();
				const distance = countdownDate - currentTime;

				const days = Math.floor(distance / (1000 * 60 * 60 * 24));
				const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
				const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
				const seconds = Math.floor((distance % (1000 * 60)) / 1000);

				document.getElementById(`${uniqueId}_d`).innerHTML = days;
				document.getElementById(`${uniqueId}_h`).innerHTML = hours < 10 ? "0" + hours : hours;
				document.getElementById(`${uniqueId}_m`).innerHTML = minutes < 10 ? "0" + minutes : minutes;
				document.getElementById(`${uniqueId}_s`).innerHTML = seconds < 10 ? "0" + seconds : seconds;

				if (distance < 0) {
					clearInterval(interval);
					document.getElementById(`${uniqueId}_d`).innerHTML = "0";
					document.getElementById(`${uniqueId}_h`).innerHTML = "00";
					document.getElementById(`${uniqueId}_m`).innerHTML = "00";
					document.getElementById(`${uniqueId}_s`).innerHTML = "00";
					alert("Thời gian đã hết cho xe " + uniqueId);
				}
			}

			const interval = setInterval(() => updateCountdown(key), 1000);
		}
	</script>
	<section class="seperate-degree">
		<div class="infor">
			<div class="infor-fl">THEO DÕI CHÚNG TÔI TRÊN</div>
			<ul class="infor-fl-vog">
				<li class="VOG2_4">
					<a href="https://www.facebook.com/thang.lequoc.1253236" class="link" title="" target="_blank" rel="noopener noreferrer">
						<img class="img" src="https://down-vn.img.susercontent.com/file/2277b37437aa470fd1c71127c6ff8eb5">
						<span class="tt">Facebook</span>
					</a>
				</li>
				<li class="VOG2_4">
					<a href="" class="link" title="" target="_blank" rel="noopener noreferrer">
						<img class="img" src="https://down-vn.img.susercontent.com/file/5973ebbc642ceee80a504a81203bfb91">
						<span class="tt">Instagram</span>
					</a>
				</li>	
				<li class="VOG2_4">
					<a href="" class="link" title="" target="_blank" rel="noopener noreferrer">
						<img class="img" src="https://down-vn.img.susercontent.com/file/f4f86f1119712b553992a75493065d9a">
						<span class="tt">LinkedIn</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="infor">
			<div class="infor-fl">TẢI ỨNG DỤNG Q&TCAR NGAY THÔI</div>
			<div class="QRcode">
				<a href="" target="_blank" rel="noopener noreferrer">
					<img src="https://down-vn.img.susercontent.com/file/a5e589e8e118e937dc660f224b9a1472" alt="download_qr_code" class="QRcode-img">
				</a>
				<div class="store">
					<a href="" target="_blank" rel="noopener noreferrer" class="store-app">
						<img src="https://down-vn.img.susercontent.com/file/ad01628e90ddf248076685f73497c163" alt="app">
					</a>
					<a href="" target="_blank" rel="noopener noreferrer" class="store-app">
						<img src="https://down-vn.img.susercontent.com/file/ae7dced05f7243d0f3171f786e123def" alt="app">
					</a>
					<a href="" target="_blank" rel="noopener noreferrer" class="store-app">
						<img src="https://down-vn.img.susercontent.com/file/35352374f39bdd03b25e7b83542b2cb0" alt="app">
					</a>
				</div>
			</div>
		</div>
	</section>
	<section class="seperate-degree">
		<div class="001">@ 2024 Q&TCAR. Tất cả các quyền được bảo lưu.</div>
	</section>
</body>
