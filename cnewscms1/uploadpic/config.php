<?php
//!!! Important !!!
// Charset:UTF-8
define('SITE_NAME','360免费图片上传系统');
define('SITE_ADV','支持png gif jpg swf rar等文件上传');
define('SITE_DIR','http://upload.360mf.cn/'); // with '/' at the end.
define('UPLOAD_DIR','up/'); // with '/' at the end. ! Make it can be read and write!
define('MAX_SIZE','1024000'); // bytes

$valid_suffix = array('.png','.gif','.jpg','.swf','.txt','.exe','.rar','.zip','.doc','.pdf','.wav','.jar');//

$message = array(
'message' => '上传你的图片',
'submit' => '上传',
'terms' => '使用条款',
'upload_histroy' => '本站说明',
'error1' => '文件大小超过限制',
'error2' => '文件大小超过限制',
'error3' => '只有部分文件被上传',
'error4' => '你没有上传文件！',
'error_valid' => '不支持你的文件后缀名',
'error_uploaded' => '上传失败',
'error_nofile' => '本站提供免费图片上传空间
<li>单个文件大小限制：1MB</li>
<li>支持上传的类型有：jpg,gif,png,bmp,swf,txt,exe,rar,zip,doc,pdf,wav,jar</li>
<li>如有足够的条件本人会考虑增加上传的类型!(3月18号增加txt,exe,rar,zip,doc,pdf,wav,jar类型)</li>
<li>上传的文件保存时间为1年!支持外链！</li>',
'info' => '<strong>'.SITE_NAME.'</strong> 是一个免费的图片上传网站，我们支持上传以PNG/JPG/GIF/swf/结尾的图片文件。你能上传5张图片在一个分钟之内。但是你不能上传任何违反法律的图片,否则我们将会进行删除处理。上传的文件保存时间为一年。你必须阅读我们的<a href="#terms">使用条款</a>之后方可上传你的图片。',
'terms_list' => '以下文件可能不会被上传: 
<ul>
<li>违法的文件，包括但不限于，18岁以下人不适宜观看的或其他暗示的。 
</li><li>图片是损坏的或不是图片文件。
</li><li>图片包括色情内容。
</li><li>图片属于版权人未经授权的。
</li><li>骚扰其他人的图片。
</li><li>通过不正常途径获取的图片。
</li><li>推广产品或服务，通过直接广告为目的的商业利润，没有首先实现的许可。这主要包括，但不仅限于，滥发电邮和横幅广告。</li>
</ul>',
);
define('IMAGEUPON_VERSION','0.1');
define('IMAGEUPON_LANGUAGE','Chinese');
define('IMAGEUPON_LICENSE','Put your license id here if had');//Only for I count the ImageUpon users.
?>