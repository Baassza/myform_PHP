<!DOCTYPE html>
<html lang="en">
<?php include "islogin.php"; islogin();?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<style>
    .btn-success{
        margin-left: 10px;
        margin-top: 10px;
        margin-bottom: 15px;
    }
    .imgshow {
        display: block;
        max-width:300px;
        max-height:95px;
        width: auto;
        height: auto;
    }


</style>
<head>
    <meta charset="UTF-8">
    <title>ระบบ myform</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">Myform</a>
    <form class="form-inline">
        <button  type="button" onclick="logout()" class="btn btn-dark">ออกจากระบบ</button>
    </form>
</nav>
<a class="btn btn-success" href="add.php">เพิ่มข้อมูล</a>
<table class="table">
    <thead class="thead-dark">
    <tr>
        <th scope="col">ลำดับที่</th>
        <th scope="col">รูป</th>
        <th scope="col">ชื่อ</th>
        <th scope="col">สกุล</th>
        <th scope="col">เพศ</th>
        <th scope="col">วันเกิด</th>
        <th scope="col">ระดับการศึกษา</th>
        <th scope="col">ที่อยู่</th>
        <th scope="col">แก้ไข</th>
        <th scope="col">ลบ</th>
    </tr>
    </thead>
    <tbody id="content">
    
    </tbody>
</table>

</body>
<script>
    window.onload=function () {
        var myHeaders = new Headers();
        myHeaders.append("Cookie", "PHPSESSID=aj3iv4rikhh2e67aq2kjn1bk38");

        var requestOptions = {
            method: 'GET',
            headers: myHeaders,
            redirect: 'follow'
        };

        fetch("getdata.php", requestOptions)
            .then(response => response.text())
            .then(result => JSON.parse(result)).then(value => {
                var tabeldata=document.getElementById("content")
                var textHTML=""
                var i =1
            value.forEach(element => {
                textHTML+='<tr>'
                textHTML+='<th scope="row">'+(i).toString()+"</th>"
                textHTML+='<td>'+'<img class="imgshow" src="upload/'+element.img+'"/></td>'
                textHTML+='<td>'+element.name+'</td>'
                textHTML+='<td>'+element.sername+'</td>'
                textHTML+='<td>'+element.gender+'</td>'
                textHTML+='<td>'+element.birthday+'</td>'
                textHTML+='<td>'+element.edu+'</td>'
                textHTML+='<td>'+element.home+'</td>'
                textHTML+='<td><a class="btn btn-warning text-white" href="edit.php?ID='+element.ID+'">แก้ไขข้อมูล</a>'+'</td>'
                textHTML+='<td><a class="btn btn-danger" onclick="deletedata('+element.ID+')">ลบข้อมูล</a>'+'</td>'
                textHTML+='</tr>'
                i++
            });
            tabeldata.innerHTML=textHTML
        })
    }
    function logout() {
        var myHeaders = new Headers();
myHeaders.append("Cookie", "PHPSESSID=9rskjni62jqb6v2bnv3tkp962b");

var formdata = new FormData();
formdata.append("logout", "logoutlogout");

var requestOptions = {
  method: 'POST',
  headers: myHeaders,
  body: formdata,
  redirect: 'follow'
};

fetch("logout.php", requestOptions)
  .then(response => response.text())
  .then(result => console.log(result))
	window.location="loginpage.php"
    }
function deletedata(ID) {
    Swal.fire({
        title: 'คุณต้องการลบข้อมูลนี้หรือไม่',
        icon:"warning",
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'ใช่',
        denyButtonText: 'ไม่',
    }).then((result) => {
        if (result.isConfirmed) {
            var myHeaders = new Headers();
            myHeaders.append("Cookie", "PHPSESSID=aj3iv4rikhh2e67aq2kjn1bk38");

            var formdata = new FormData();
            formdata.append("ID", ID);

            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: formdata,
                redirect: 'follow'
            };

            fetch("delete.php", requestOptions)
                .then(value => {
                    if(value.status!==200){
                        Swal.fire({
                            icon: 'error',
                            title: 'เกิดข้อผิดพลาด',
                            text: 'กรุณาติดต่อผู้ดูแลระบบ',
                            timer: 3000
                        })
                    }
                    else {
                        Swal.fire({
                            title: "การลบข้อมูล",
                            text: "การลบข้อมูลเสร็จสิ้น",
                            icon: "success",
                            timer:3000
                        }).then(function () {
                            window.location="index.php"
                        })
                    }
                })


        }
    })
}
</script>
</html>