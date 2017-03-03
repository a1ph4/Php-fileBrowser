<?php
$q=$_REQUEST['q'];
$pth =$q; 
$epath = explode("\\",$q);
$epatha = $pth;
if(end($epath) == ".."){
	array_splice($epath,count($epath)-2,2);
	$epatha = implode("\\",$epath);
}
echo "<h1>Index Of \\".$epatha."</h1>
		<ul class='list-group'>";
function GenFileSys($pth){ 
$basedir="D:\\Xampp\\htdocs\\PapyroFix\\";
$dir = $basedir.$pth;
$e ="<br>";
$pths = explode('\\',$pth);
$pths[0]='';
$pths = implode('\\',$pths);
$file_ext = "";
	if(is_dir($dir)){
		if($dh = opendir($dir)){
			while(false !== ($file = readdir($dh))){
				if(is_dir($file)){
					$filePath = $pth."\\".$file;
					$file_ext[1] =""; 
				}else{
					$filePath ="..\\".$pth."\\".$file;
					$file_ext = explode('.',$file);
				}
				$hide = array('php','html');
				$pathar = explode("\\",$filePath);
				if( end($pathar) !== '.' and !in_array($file_ext[1], $hide)) {
					
					if(is_dir($file)){
					if(end($pathar) == '..'){
						$file = "Parent Directory";
						array_splice($pathar,count($pathar)-2,2);
						$filePath = implode("\\",$pathar);
					}
					echo "<li class='list-group-item'><b>fileName: </b> <a href='#' name='".$filePath."' onclick='file(event);'>".$file."</a></li>";
					
				}else{
					echo "<li class='list-group-item'><b>fileName: </b>".$file." <a target='_blank' href='".$filePath."'>Download</a></li>";	
				}
				}
			}
			echo "</ul>";
			closedir($dh);
		}
	}
}
GenFileSys($pth);
?>