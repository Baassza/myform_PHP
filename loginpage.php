<!DOCTYPE html>
<html lang="en">
<?php include "islogout.php"; islogout();?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<head>
    <meta charset="UTF-8">
    <title>เข้าสู่ระบบ</title>
</head>
<body>
<section class="min-vh-100 bg-dark d-flex justify-content-center align-items-center">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h3 class="h3" style="text-align: center">เข้าสู่ระบบ</h3>
            <br/>
            <form>
                <div class="form-group">
                    <label for="username">ชื่อผู้ใช้</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">รหัสผ่าน</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <br/>
                <div class="d-flex justify-content-center align-items-center">
                    <button type="button" class="btn btn-primary" onclick="login()">เข้าสู่ระบบ</button>
                </div>
            </form>
        </div>
    </div>
</section>
</body>
<script>
    function login() {
        var username = document.getElementById("username")
        var username_text=username.value
        var password = document.getElementById("password")
        var password_text =password.value

        var myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/x-www-form-urlencoded");
        myHeaders.append("Cookie", "PHPSESSID=orpfffhkuba0kc536fh2t6ckfl");

        var urlencoded = new URLSearchParams();
        urlencoded.append("username",username_text);
        urlencoded.append("password", password_text);

        var requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: urlencoded,
        };
        fetch("login.php", requestOptions)
            .then(value => {
                if(value.status!==200){
                    Swal.fire({
                        icon: 'error',
                        title: 'เกิดข้อผิดพลาด',
                        text: 'ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง',
                        timer: 3000
                    })
                }
                else {
                    window.location="index.php"
                }
            })

    }
</script>
</html>