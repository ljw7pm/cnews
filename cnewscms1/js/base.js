// JavaScript Document
/**
*���ܣ�ȡ�ý��㣬�ı�DIV��ʽ
*������value������ʶ
**/
function getFocus(value)
{
	switch(value)
	{
		case 1:
			document.getElementById('user_name').className='info';//�ı��û���DIV��ʽ
		    break;
		case 2:
			document.getElementById('user_pass').className='info';//�ı��û�����DIV��ʽ
			break;
		case 3:
			document.getElementById('code').className='info';//�ı���֤��DIV��ʽ
			break;
	}
}

/**
*���ܣ��л���֤����ʾ
*������Math.random
**/
function create_code()
{
    document.getElementById('code').src = 'function/create_code.php?'+Math.random()*10000;
}

/**
*���ܣ�����û���
*������value
*���أ�true or false
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
*���ܣ�����û�����
*������value
*���أ�true or false
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
*���ܣ������֤��
*������value
*���أ�true or false
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
*���ܣ�������ĸ����Ƿ���ȷ
*���أ�true or false
**/
function checkForm()
{
	if(!checkUserName(document.user_login.user_name.value))
	{
		alert('�û�������Ϊ�գ�');
		document.user_login.user_name.focus();
		return false;
	}
	if(!checkPassword(document.user_login.user_pass.value))
	{
		alert('���벻��Ϊ�գ�');
		document.user_login.user_pass.focus();
		return false;
	}
	if(!checkcode(document.user_login.check_code.value))
	{
		alert('��֤�벻��Ϊ�գ�');
		document.user_login.check_code.focus();
		return false;
	}
}