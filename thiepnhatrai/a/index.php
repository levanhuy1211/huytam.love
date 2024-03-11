<?php
@session_start();
if(isset($_SESSION['login']) && $_SESSION['login'] == "login"){
require_once("db.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Form và Table</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Biểu mẫu (Form)</h2>
    <form method="post">
      <div class="form-group">
        <label for="name">Tên:</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên người được mời">
      </div>
      <div class="form-group">
        <label for="time">Thời gian:</label>
        <div class="form-check">
          <input type="radio" class="form-check-input" name="time" id="time1" value="10">
          <label class="form-check-label" for="time1">10:00</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" name="time" id="time2" value="16" checked>
          <label class="form-check-label" for="time2">16:00</label>
        </div>
        <div class="form-check">
          <input type="radio" class="form-check-input" name="time" id="time3" value="17" checked>
          <label class="form-check-label" for="time3">17:00</label>
        </div>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Tạo thiệp</button>
    </form>
    <?php 
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            $time= $_POST['time'];
            $characters = array_merge(range('a', 'z'), range(1, 9));

            // Tạo chuỗi ngẫu nhiên từ mảng
            $random = '';
            for ($i = 0; $i < 20; $i++) {
                $random .= $characters[array_rand($characters)];
            }
            $sql = "INSERT INTO nhatrai (name, time, random) VALUES (:name, :time, :random)";
    
            // Chuẩn bị câu lệnh SQL
            $stmt = $conn->prepare($sql);
            
            // Bind các giá trị dữ liệu vào câu lệnh SQL
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':time', $time);
            $stmt->bindParam(':random', $random);
            
            // Thực thi câu lệnh SQL
            $stmt->execute();
        }
        // Chuẩn bị câu lệnh SQL SELECT
        $sql = "SELECT   name, time, random FROM nhatrai ORDER BY ID DESC";
    
        // Thực thi câu lệnh SQL
        $stmt = $conn->query($sql);    
    ?>
    <hr>

    <h2>Bảng (Table)</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Tên</th>
          <th>Thời gian</th>
          <th>Link</th>
        </tr>
      </thead>
      <tbody>
    <?php 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      $link="https://huytam.love/thiepnhatrai/?code=".$row['random'];
      ?>
        <tr>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['time']?> giờ</td>
            <td>
              <a href="<?php echo $link ?>" target="_blank" ><?php echo $link ?></a> 
              <button class="btn btn-success" onclick='copyToClipboard("<?php echo $link;?>", this)'>Copy link</button>
            </td>
        </tr>
    <?php }?>
        <!-- Các hàng của bảng sẽ được thêm vào đây bằng JavaScript hoặc server-side scripting -->
      </tbody>
    </table>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function copyToClipboard(text, button) {
      var tempInput = document.createElement("input");
      tempInput.value = text;
      document.body.appendChild(tempInput);
      tempInput.select();
      document.execCommand("copy");
      document.body.removeChild(tempInput);
      button.classList.remove("btn-success");
      button.textContent = "Đã copy";
    }
  </script>
</body>
</html>

<?php }else{
    header("Location: auth.php");
}
?>