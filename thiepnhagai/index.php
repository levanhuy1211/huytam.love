<?php 
require_once("a/db.php");
if(isset($_GET['code'])){
  $random=$_GET['code'];
  $sql = "SELECT name, time, random FROM nhagai WHERE random = :random";
    
  // Chuẩn bị câu lệnh SQL
  $stmt = $conn->prepare($sql);
  
  // Bind giá trị của biến $randomValue vào câu lệnh SQL
  $stmt->bindParam(':random', $random);
  
  // Thực thi câu lệnh SQL
  $stmt->execute();
  
  // Lấy kết quả trả về
  $result = $stmt->fetch(PDO::FETCH_ASSOC);
  if($result){
    $name=ucfirst($result['name']);
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
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="page-wrapper">
      <div class="card">
        <div class="card-packaging bg-img-base" style="background-image: url(images/gai_2.png)">
          <div class="card-center">
            <a class="close bg-img-base" href="#" style="background-image: url(https://cdn3.iconfinder.com/data/icons/pyconic-icons-1-2/512/close-circle-512.png)"></a>
          </div>
          <div class="card--first">
            <div class="card-wrapper bg-img-base front" style="background-image: url(images/bia.jpg)">
              <div class="card-name"><?php echo $name;?></div>
              <a class="open" href="#">
                <div class="open-tail"></div>
                <div class="open-main"><span class="open-title">Open</span></div>
              </a>
            </div>
            <div class="card-wrapper bg-img-base back" style="background-image: url(images/gai_1.png)">
              <div class="card-time">
                <span class="card-time-hour"><?php echo $time;?></span>
                <span class="card-time-minute">00</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div><iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d477185.3786586604!2d105.64305825474709!3d20.87161611600715!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e2!4m3!3m2!1d21.1454898!2d105.754235!4m5!1s0x3135e98e9eccf1d9%3A0x54db7cd00942df8f!2zSMOgIE5ndXnDqm4sIFRow6FpIFBoxrDGoW5nLCBIxrBuZyBIw6AsIFRow6FpIELDrG5oLCBWaeG7h3QgTmFt!3m2!1d20.596763799999998!2d106.19125489999999!5e0!3m2!1svi!2s!4v1710167750327!5m2!1svi!2s" width="800" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
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
   
  </script>
</html>
