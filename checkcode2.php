<?php
   for($i=0;$i<4;$i++){
   
    $checkCode.=dechex(rand(1,15));
   }

   //echo $checkCode;
   //�����ɵ��ַ��浽session
   //session_start();
 
   //$_SESSION['checkcode']=$checkCode;
    //ʹ��imagestring���仭����
   //��������
   $im=imagecreatetruecolor(110,30);
   $red=imagecolorallocate($im,255,0,0);
   $fontcolor1=imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255));

   //������ظ�����
   for($i=0;$i<20;$i++){
   
        imageline($im,rand(0,110),rand(0,30),rand(0,110),rand(0,30),  imagecolorallocate($im,rand(0,255),rand(0,255),rand(0,255)));
   }
 
   imagestring($im,rand(1,5),rand(0,80),rand(0,14),$checkCode, $red);

   header("content-type:image/png");
   imagepng($im);

   imagedestroy($im);   
   
?>
