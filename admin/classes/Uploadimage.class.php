
<?php

class Uploadimage
      {
		var $image;
		var $ext;
		var $i;
		var $code;
		function upload($folder,$banner=false)
		    {
		    $imagecode=time();
		    $newname=$folder."/".$imagecode.strtolower($_FILES['image']['name']);
			$this->code=$imagecode.strtolower($_FILES['image']['name']);
			$this->image=strtolower($newname);
		
			$copied = move_uploaded_file($_FILES['image']['tmp_name'],$newname);
            if (!$copied) 
			   {
				  return false;
			   }
		    else 
			 {
					if(!$banner)
					{
						$this->resize_both($this->image,'../uploadedimages/crop/',80,130);	
						$this->createthumb($this->image,'../uploadedimages/thumb/',212,149);
						$this->createthumb($this->image,'../uploadedimages/big/',1114,360);
						
					}
					return true;
			 }
			}
	     function getExtension()
			  { 
               $i = strrpos($this->image,".");       
               if (!$i) { return ""; }       
               $l = strlen($this->image) - $i;         
               $ext = substr($this->image,$i+1,$l);  
			   
               return $ext; 
               }
 function createthumb($name1,$location,$new_w,$new_h)
	{
	
		$name = $name1;
		$filename = $location.$this->code;
		$ext=explode('.',$this->code);
		if(strtolower($ext[1])=='jpg'||strtolower($ext[1])=='jpeg')
		$src_img=imagecreatefromjpeg($name);
		else if(strtolower($ext[1])=='gif')
		$src_img=imagecreatefromgif($name);
		else if(strtolower($ext[1])=='png')
		$src_img=imagecreatefrompng($name);
		else
		$src_img=imagecreatefromjpeg($name);
		$old_x=imageSX($src_img);
		$old_y=imageSY($src_img);
		$ratio1=$old_x/$new_w;
        $ratio2=$old_y/$new_h;
		if($ratio1>$ratio2) 
		         {
                 $thumb_w=$new_w;
                 $thumb_h=$old_y/$ratio1;
                 }
        else     {
                 $thumb_h=$new_h;
                 $thumb_w=$old_x/$ratio2;
                 }
		$dst_img=ImageCreateTrueColor($thumb_w,$thumb_h);
		imagecopyresampled($dst_img,$src_img,0,0,0,0,$thumb_w,$thumb_h,$old_x,$old_y); 
		imagejpeg($dst_img,$filename);
		imagedestroy($dst_img); 
		imagedestroy($src_img); 
	} 
function removepic($path,$codeimage)
           {
			  
			if(file_exists($path)&&$codeimage!="")
			   {
				   
				unlink($path);
				return true;
			   }
			  else
			   return false;
		   }
function changemode($path)
         {
			chmod($path, 0777); 
		 }
		 
function resize_both($name1,$location,$new_w,$new_h)
    {
	
    $newname = $location.$this->code;
    $thumbh = $new_w;
    $thumbw = $new_h;
    $nh = $thumbh;
    $nw = $thumbw;
    $size = getImageSize($name1);
    $w = $size[0];
    $h = $size[1];
    $ratio = $h / $w;
	$ext=explode('.',$this->code);
	
    $nratio = $thumbh / $thumbw; 
    if($ratio > $nratio)
      {
      $x = intval($w * $nh / $h);
      if ($x < $nw)
       {
        $nh = intval($h * $nw / $w);
       } 
     else
       {
        $nw = $x;
       }
     }
   else
     {
      $x = intval($h * $nw / $w);
      if ($x < $nh)
       {
       $nw = intval($w * $nh / $h);
       } 
       else
        {
         $nh = $x;
        }
      } 
       if($ext[1]=='jpg'||$ext[1]=='jpeg')
        {    
        $resimage = imagecreatefromjpeg($name1); 
	    }
	   else if($ext[1]=='gif')
	     {
		 $resimage = imagecreatefromgif($name1); 
	    }
	  else if($ext[1]=='png')
	     {
			$resimage = imagecreatefrompng($name1); 
           
		 }
		    $newimage = imagecreatetruecolor($nw, $nh);  // use alternate function if not installed
            imageCopyResampled($newimage,$resimage,0,0,0,0,$nw, $nh, $w, $h);  
            $viewimage = imagecreatetruecolor($thumbw, $thumbh);
            imagecopy($viewimage, $newimage, 0, 0, 0, 0, $nw, $nh);
            imageJpeg($viewimage, $newname, 85);  
}  
		   
	 }

?>