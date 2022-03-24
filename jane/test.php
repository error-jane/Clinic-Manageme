<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <title>Document</title> 
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@4.3.1/dist/css/bootstrap.min.css" >
</head>
<body>
 
 
<div class="container">
 <br>
<form id="myform1" name="form1" method="post" action="" class="needs-validation2" enctype="multipart/form-data" novalidate>
<div class="form-group row">
    <legend class="col-form-label col-sm-3 pt-0 text-right">ไฟล์อัพโหลด</legend>
    <div class="col col-5">   
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="customFile" id="customFile"  required  >
          <label class="custom-file-label" for="customFile">Choose file</label>          
          <input type="text" id="_customFile" class="form-control d-none" value="" required>
            <div class="invalid-feedback">
            กรุณาเลือกไฟล์
            </div>                   
        </div>                         
    </div>
</div>
<div class="form-group row">
    <div class="col-sm-3 offset-sm-3 text-right pt-3">
         <button type="submit" name="btn_submit" id="btn_submit" value="1" class="btn btn-primary btn-block">ส่งข้อมูล</button>
    </div>
</div> 
</form> 
   
 </div>
   
         
<script src="https://unpkg.com/jquery@3.3.1/dist/jquery.min.js"></script>
<script src="https://unpkg.com/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
<script type="text/javascript">
$(function(){
     
    $("#customFile").on("change",function(){
        var _fileName;
        var _maxFileSize = 2000000; // ไม่เกิน 2 MB
        var _allowFileType = ["application/pdf","image/jpeg"]; // กำหนดชนิดไฟลที่อนุญาต
        // กำหนดข้อความ อ้างอิงค่าจาก key index ของตัวแปร _statusFileCode
        var _waringTextValue = ["กรุณาเลือกไฟล์","ขนาดไฟล์ไม่เกิน 2 MB","อนุญาตเฉพาะไฟล์ PDF และ JPG"];
         
        if(window.FileReader && window.Blob) {
            // All the File APIs are supported.
            var files = $(this)[0].files;
            var _fileNameArr = [];
            var _statusFile = true;
            var _statusFileCode = 0;
             
            for (var i = 0; i < files.length; i++) {
                _fileNameArr.push(files[i].name);
                if(files[i].size > _maxFileSize){
                    _statusFile = false;
                    _statusFileCode = 1;
                }
                if($.inArray(files[i].type, _allowFileType) === -1 ){
                    _statusFile = false;
                    _statusFileCode = 2;
                }               
            }       
            _fileName =     _fileNameArr.join(","); 
            if(_fileName==""){
                _statusFile = false;
            }
            // ส่วนของเงื่อนไข 
            if(_statusFile==false){ // ไม่ผ่านเงื่อนไข
                $("#_customFile").val("");
                $("#_customFile").next("div.invalid-feedback").text(_waringTextValue[_statusFileCode]);
            }else{ // ผ่านเงื่อนไข
                $("#_customFile").val("ok");
            }
        }else{
            var _filePath = $(this).val();
            var _fileName = _filePath.split("\\");
            _fileName = _fileName.pop();                        
        }   
        $(this).next("label").text(_fileName);  
    });
     
     $("#myform1").on("submit",function(){
         var form = $(this)[0];
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');         
     });
});
</script>
</body>
</html>