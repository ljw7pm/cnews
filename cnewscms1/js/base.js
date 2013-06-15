// JavaScript Document
/**
*功能：取得焦点，改变DIV样式
*参数：value输入框标识
**/
function getFocus(value)
{
	switch(value)
	{
		case 1:
			document.getElementById('user_name').className='info';//改变用户名DIV样式
		    break;
		case 2:
			document.getElementById('user_pass').className='info';//改变用户密码DIV样式
			break;
		case 3:
			document.getElementById('code').className='info';//改变验证码DIV样式
			break;
	}
}

/**
*功能：切换验证码显示
*参数：Math.random
**/
function create_code()
{
    document.getElementById('code').src = 'function/create_code.php?'+Math.random()*10000;
}

/**
*功能：检查用户名
*参数：value
*返回：true or false
**/
function checkUserName(value)
{
	if(value=="")
	{
		return false;
	}
	return true;
}

/**
*功能：检查用户密码
*参数：value
*返回：true or false
**/
function checkPassword(value)
{
	if(value=="")
	{
		return false;
	}
	return true;
}
/**
*功能：检查验证码
*参数：value
*返回：true or false
**/
function checkcode(value)
{
	if(value=="")
	{
		return false;
	}
	return true;
}
/**
*功能：检验表单的各项是否正确
*返回：true or false
**/
function checkForm()
{
	if(!checkUserName(document.user_login.user_name.value))
	{
		alert('用户名不能为空！');
		document.user_login.user_name.focus();
		return false;
	}
	if(!checkPassword(document.user_login.user_pass.value))
	{
		alert('密码不能为空！');
		document.user_login.user_pass.focus();
		return false;
	}
	if(!checkcode(document.user_login.check_code.value))
	{
		alert('验证码不能为空！');
		document.user_login.check_code.focus();
		return false;
	}
}