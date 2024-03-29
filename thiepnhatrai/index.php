<?php 
require_once("a/db.php");
if(isset($_GET['code'])){
  $random=$_GET['code'];
  $sql = "SELECT * FROM nhatrai WHERE random = :random";
    
  // Chuẩn bị câu lệnh SQL
  $stmt = $conn->prepare($sql);
  
  // Bind giá trị của biến $randomValue vào câu lệnh SQL
  $stmt->bindParam(':random', $random);
  
  // Thực thi câu lệnh SQL
  $stmt->execute();
  
  // Lấy kết quả trả về
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result){
    $name=ucwords($result['name']);
    $time=$result['time'];
  }else{
    $name="Thiệp chưa được tạo";
    $time="Rỗng";
  }
}else{
  $name="Thiệp chưa được tạo";
  $time="Rỗng";
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page-wrapper">
      <div class="card">
        <div class="card-packaging bg-img-base" style="background-image: url(images/Trai_2.webp)">
          <div class="card-center">
            <a class="close bg-img-base" href="#" style="background-image: url(https://cdn3.iconfinder.com/data/icons/pyconic-icons-1-2/512/close-circle-512.png)"></a>
          </div>
          <div class="card--first">
            <div class="card-wrapper bg-img-base front" style="background-image: url(images/bia.webp)">
              <div class="card-name"><?php echo $name;?></div>
              <a class="open" href="#">
                <div class="open-tail"></div>
                <div class="open-main"><span class="open-title">Mở Thiệp</span></div>
              </a>
            </div>
            <div class="card-wrapper bg-img-base back" style="background-image: url(images/Trai_1.webp)">
              <div class="card-in-name">
                <span><?php echo $name;?></span>
              </div>
              <div class="card-time">
                <span class="card-time-hour"><?php echo $time;?></span>
                <span class="card-time-minute">00</span>
              </div>
            </div>
          </div>
          
        </div>
        
      </div>
      <div class="link-wedding"></div>
    </div>
</body>
<script>
document.addEventListener('DOMContentLoaded', function() {
  document.getElementsByClassName('open')[0].addEventListener('click', function () {
    document.getElementsByClassName('card-packaging')[0].classList.add('is-open')
  })

  document.getElementsByClassName('close')[0].addEventListener('click', function () {
    document.getElementsByClassName('card-packaging')[0].classList.remove('is-open')
  })
});
document.addEventListener('DOMContentLoaded', function () {
    const openButton = document.querySelector('.open-main');
    const linkWeddingDiv = document.querySelector('.link-wedding');
    let isLinkAdded = false; // Biến để kiểm tra xem liên kết đã được thêm vào hay chưa

    openButton.addEventListener('click', function () {
        if (!isLinkAdded) { // Kiểm tra xem liên kết đã được thêm vào chưa
            const link = document.createElement('a');
            link.textContent = 'Hãy ấn vào đây để xem thêm thông tin';
            link.href = 'https://huytam.love';

            linkWeddingDiv.appendChild(link);
            isLinkAdded = true; // Đặt cờ là true để biết rằng liên kết đã được thêm vào
        }
    });
});


</script>
</html>
