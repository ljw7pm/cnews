<?php
session_start();
//������֤��ͼƬ
header("Content-type: image/png");
// ȫ����
$str = "1,2,3,4,5,6,7,8,9,a,b,c,d,f,g";      //Ҫ��ʾ���ַ������Լ�������ɾ
$list = explode(",", $str);
$cmax = count($list) - 1;
$verifyCode = '';
for ( $i=0; $i < 5; $i++ ){
      $randnum = mt_rand(0, $cmax);
      $verifyCode .= $list[$randnum];           //ȡ���ַ�����ϳ�Ϊ����Ҫ����֤���ַ�
}
$_SESSION['code'] = $verifyCode;        //���ַ�����SESSION��
 
$im = imagecreate(58,28);    //����ͼƬ
$black = imagecolorallocate($im, 0,0,0);     //��������������Ϊ���õ���ɫ
$white = imagecolorallocate($im, 255,255,255);
$gray = imagecolorallocate($im, 200,200,200);
$red = imagecolorallocate($im, 255, 0, 0);
imagefill($im,0,0,$white);     //��ͼƬ�����ɫ
 
//����֤�����ͼƬ
imagestring($im, 5, 10, 8, $verifyCode, $black);    //����֤��д�뵽ͼƬ��
 
for($i=0;$i<50;$i++)  //�����������
{
     imagesetpixel($im, rand()p , rand()0 , $black);    //�����״������
     imagesetpixel($im, rand()p , rand()0 , $red);
     imagesetpixel($im, rand()p , rand()0 , $gray);
     //imagearc($im, rand()p, rand()p, 20, 20, 75, 170, $black);    //���뻡��״������
     //imageline($im, rand()p, rand()p, rand()p, rand()p, $red);    //��������״������
}
imagepng($im);
imagedestroy($im);
?>

