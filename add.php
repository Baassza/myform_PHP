<!DOCTYPE html>
<html lang="en">
<?php include "islogin.php"; islogin();?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<head>
    <meta charset="UTF-8">
    <title>เพิ่มข้อมูล</title>
</head>
<style>
    .avatar{
        border-radius: 50%;
        width: 200px;
        height: 200px;
        margin-bottom: 20px;
        margin-left: 65px;
    }

</style>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Myform</a>
</nav>
<section class="d-flex justify-content-center min-vh-100 align-items-center">
    <form id="myform">
        <img src="upload/bg.png" class="avatar" id="avatar"/>
        <div class="d-flex justify-content-center">
            <input type="file" id="upload" accept="image/*" name="img" onchange="loadFile(event)" hidden/>
            <label for="upload" class="btn btn-dark">เลือกภาพ</label>
        </div>
        <div class="form-group">
            <label for="name">ชื่อ</label>
            <input type="text" class="form-control" id="name" name="name" autocomplete="off">
        </div>
        <div class="form-group">
            <label for="sername">สกุล</label>
            <input type="text" class="form-control" id="sername" name="sername" autocomplete="off" >
        </div>
        <div class="form-group">
            <label for="sex">เพศ</label>
            <div class="form-inline">
                <select class="custom-select" id="sexsel" name="sexsel" required onchange="disablesexform()">
                    <option>ไม่ระบุ</option>
                    <option>ชาย</option>
                    <option>หญิง</option>
                    <option>อื่นๆ</option>
                </select>
                <p>&nbsp;</p>
                <input type="text" class="form-control"  disabled="true" id="sex" name="sex" autocomplete="off">
            </div>
        </div>
        <div class="form-group">
            <label for="birthday">วันเกิด</label>
            <input type="text"  id="birthday" name="birthday" autocomplete="off"/>
        </div>
        <div class="form-group">
            <div class="form-inline">
                <label for="edu">การศึกษา &nbsp;</label>
                <select class="custom-select" id="edu"  name="edu">
                    <option>ไม่ระบุ</option>
					<option>ต่ำกว่าชั้นประถมศึกษา</option>
					<option>ชั้นประถมศึกษา</option>
                    <option>ชั้นมัธยมศึกษาตอนต้น</option>
                    <option>ชั้นมัธยมศึกษาปลายหรือเทียบเท่า</option>
                    <option>อนุปริญญาตรีหรือเทียบเท่า</option>
                    <option>ปริญญาตรี</option>
                    <option>สูงกว่าปริญญาตรี</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="home">ที่อยู่</label>
            <textarea class="form-control" rows="5" id="home" name="home" autocomplete="off" ></textarea>
        </div>
        <div class="d-flex justify-content-center">
            <button type="button" class="btn btn-primary" onclick="senddata()">เพิ่มข้อมูล</button>
        </div>

    </form>
</section>

</body>
<script>
    var field = document.getElementById('birthday');
    var picker = new Pikaday({
        field: document.getElementById('birthday'),
        onSelect: function() {
            var day=picker._d.getDate().toString()
            var mouth=(picker._d.getMonth()+1).toString()
            var year =picker._d.getFullYear().toString()
            if(parseInt(day)<10){
                day='0'+day
            }
            if(parseInt(mouth)<10){
                mouth='0'+mouth
            }
            field.value = day+'/'+mouth+'/'+year
        }
    });
    field.parentNode.insertBefore(picker.el, field.nextSibling)
    function disablesexform() {
        var sexvalue=document.getElementById("sexsel").value
        var sextext=document.getElementById("sex")
        if(sexvalue==="อื่นๆ"){
            sextext.removeAttribute('disabled')
        }
        else{
            sextext.setAttribute("disabled", "true")
        }
    }

     function loadFile(event){
        var reader = new FileReader()
        reader.onload = function(){
            var output = document.getElementById('avatar')
            output.src = reader.result
        }
        reader.readAsDataURL(event.target.files[0])
    }
    function senddata() {
        if(vaild()===true){
            var image =document.getElementById('upload')
            var imagename=document.getElementById('upload').files.name
            var name =document.getElementById('name').value
            var sername =document.getElementById('sername').value
            var sexsel =document.getElementById('sexsel').value
            var sex =document.getElementById('sex').value
            var birthday =document.getElementById('birthday').value
            var edu =document.getElementById('edu').value
            var home =document.getElementById('home').value
            var formdata = new FormData();
            formdata.append("img",image.files[0],imagename);
            formdata.append("name", name);
            formdata.append("sername", sername);
            formdata.append("sexsel", sexsel);
            formdata.append("sex", sex);
            formdata.append("birthday", birthday);
            formdata.append("edu", edu);
            formdata.append("home", home);
            var requestOptions = {
                method: 'POST',
                body: formdata,
                redirect: 'follow'
            };

            fetch("upload.php", requestOptions)
                .then(value => {
                    if(value.status===200){
                            Swal.fire({
                                title: "การบันทึกข้อมูล",
                                text: "การบันทึกข้อมูลเสร็จสิ้น",
                                icon: "success",
                                timer:3000
                            }).then(function () {
                                window.location="add.php"
                            })
                        }

                    else{
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'กรุณาติดต่อผู้ดูแลระบบ',
                            timer: 3000
                        })
                    }
                })

        }
        else{
            Swal.fire({
                icon: 'error',
                title: 'เกิดข้อผิดพลาด',
                text: 'กรุณากรอกข้อมูลให้ครบถ้วน',
                timer: 3000
            })
        }

    }
    function vaild() {
       var image = document.getElementById('upload').files
        var nametext=document.getElementById("name")
        var sernametext=document.getElementById("sername")
        var sexvalue=document.getElementById("sexsel")
        var sextext=document.getElementById("sex")
        var birthday=document.getElementById("birthday")
        var home =document.getElementById('home')
        if(image.length<=0){
            return false
        }
        if(nametext.value==''){
            return false
        }
        if(sernametext.value==''){
            return false
        }
        if(sexvalue==="อื่นๆ"){
            if(sextext.value==''){
                return false
            }
        }
        if(birthday.value==''){
            return false
        }
        if(home.value==''){
            return false
        }
        return true

    }
</script>
</html>