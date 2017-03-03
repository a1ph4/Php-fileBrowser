<html>
<head>
<script>
function getfile(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "filemag.php?q=" +str, true);
        xmlhttp.send();
    }
}
getfile("uploads");
function file(event){
	 var str = event.target.name;
	 if(str == ""){
		str = 'uploads';
	 }
	 getfile(str);
}
/*function logout(){
	window.location="login.php";
}*/
</script>
<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>
	<div class="container-fluid">
		<h1> Welcome <?php echo $name ?></h1>
		<p><span id="txtHint"></span></p>
	<!--	<button class="btn btn-danger" onclick="logout();" >Logout</button> -->
	</div>
</body>
</html>