<?php
include('_config.php');

include($inc_path.'_imgupload.php');

$filepath=$admin_path_ckeditor;

$url='';
$file = new imgUploder($_FILES['upload']);

if ($file->file_name != "")
{		
	$filename = explode('.',$file->file_name);
	$file->set("file_name",md5(uniqid(rand())).'.'.end($filename));
	$file->set("file_max",1024*1024*3);
	$file->set("file_dir",$filepath);
	$file->set("overwrite","3");
	$file->set("fstyle","image");
	if ($file->upload() && $file->file_name!="")
	{	
		$file -> createSmailImg(880, 0, 7);	
		$url=$path_ckeditor.$file->file_name;	
		$msg='圖片上傳完成';
	}
	else{
		$msg='圖片上傳失敗!'.$file->user_msg;
	}
}
else{
	$msg='請選擇上傳檔案。';
}
$funcNum = $_GET['CKEditorFuncNum'] ;
echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$msg');</script>";
?>