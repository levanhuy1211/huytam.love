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
        <input type="text" class="form-control" id="name" placeholder="Nhập tên người được mời">
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
      </div>
      <button type="submit" class="btn btn-primary">Tạo thiệp</button>
    </form>
    <?php 
        var_dump($_POST);
    
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
        <tr>
          <td>John</td>
          <td>2024-03-07 12:00</td>
          <td>123</td>
        </tr>
        <!-- Các hàng của bảng sẽ được thêm vào đây bằng JavaScript hoặc server-side scripting -->
      </tbody>
    </table>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php }else{
    header("Location: auth.php");
}
?>