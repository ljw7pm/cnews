-- 日期: 2012 年 09 月 12 日 

-- 
-- 数据库: `newscms`
-- 

-- --------------------------------------------------------

create database newscms;
use newscms

-- 表的结构 `admin`
-- 
drop table if exists admin;
create table if not exists admin(
id int(10) not null auto_increment,
admin_name varchar(20) not null,
admin_pass varchar(100) not null,
admin_group tinyint(1) not null,
add_date varchar(50) default null,
last_ip varchar(30) default null,
primary key (id)
)ENGINE=MyISAM AUTO_INCREMENT=2 CHARSET=GBK;



insert into admin(id,admin_name,admin_pass,admin_group,add_date,last_ip)
 values(1,'admin','21232f297a57a5a743894a0e4a801fc3',1,'2012-09-12','127.0.0.1');

DROP TABLE IF EXISTS config;
CREATE TABLE config (
  `name` varchar(100) NOT NULL default '',
  `value` mediumtext NOT NULL,
  PRIMARY KEY  (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;


DROP TABLE IF EXISTS articletype;


DROP TABLE IF EXISTS catalog;


DROP TABLE IF EXISTS article;
CREATE TABLE article(
 id int(10) unsigned NOT NULL AUTO_INCREMENT,
 title varchar(100) NOT NULL,
 source varchar(100) NOT NULL,
 pic varchar(200) NOT NULL,
 body mediumtext NOT NULL,
 filename varchar(255) NOT NULL,
 pubdate int(10) unsigned NOT NULL DEFAULT '0',
 hits int(10) unsigned NOT NULL DEFAULT '0',
 visible enum('0','1') NOT NULL DEFAULT '1',
 PRIMARY KEY (id),
 KEY visible (visible),
 KEY hits (hits)
)ENGINE=MyISAM DEFAULT CHARSET=gbk;

insert into article(id,title,source,pic,body,filename,pubdate,hits) 
values (1,'name','sise','http://www.sise.com.cn/other/1.jpg','01255','1','2013','1');
insert into article(id,title,source,pic,body,filename,pubdate,hits) 
values (2,'host','sise','http://www.sise.com.cn/other/1.jpg','01255','1','2013','1');

DROP TABLE IF EXISTS articledata;
DROP TABLE IF EXISTS product;
CREATE TABLE product(
 id int(10) unsigned NOT NULL AUTO_INCREMENT,
 productname varchar(100) NOT NULL ,
 picurl varchar(255) NOT NULL, 
 PRIMARY KEY (id)
)ENGINE=MyISAM DEFAULT CHARSET=gbk;



DROP TABLE IF EXISTS links;
CREATE TABLE links(
 id int(10) NOT NULL AUTO_INCREMENT,
 name varchar(100) NOT NULL DEFAULT '',
 logo varchar(200) NOT NULL DEFAULT '',
 url varchar(200) NOT NULL DEFAULT '',
 desc tinytext NOT NULL,
 orderid tinyint(3) unsigned NOT NULL DEFAULT '0',
 UNIQUE KEY id (id),
 KEY orderid (orderid)
)ENGINE=MyISAM DEFAULT CHARSET=gbk;



DROP TABLE IF EXISTS advertise;
CREATE TABLE advertise(
 id int(10) unsigned NOT NULL AUTO_INCREMENT,
 varname varchar(50) NOT NULL DEFAULT '',
 title varchar(255) NOT NULL DEFAULT '',
 style enum('code','text','image','flash') NOT NULL DEFAULT 'code',
 starttime int(10) unsigned NOT NULL DEFAULT '0',
 endtime int(10) unsigned NOT NULL DEFAULT '0',
 code mediumtext NOT NULL,
 status enum('0','1') NOT NULL DEFAULT '0',
 PRIMARY KEY (id),
 KEY varname (varname),
 KEY status (status)
)ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

 INSERT INTO config VALUES('webname','CMS1');
 INSERT INTO config VALUES('seotitle','CMS');
 INSERT INTO config VALUES('keyswords','12s');
 INSERT INTO config VALUES('description','gffj');
 INSERT INTO config VALUES('icp','gjl');
 INSERT INTO config VALUES('setupURL','http://localhost/cms');
 INSERT INTO config VALUES('jsURL','http://localhost/js');
 INSERT INTO config VALUES('cssURL','http://localhost/css');
 INSERT INTO config VALUES('plugins','http://localhost/plugins');
 INSERT INTO config VALUES('dataformat','Y:m:d H:i:s');

insert into admin(id,admin_name,admin_pass,admin_group,add_date,last_ip)
 values(2,'ljw','21232f297a57a5a743894a0e4a801fc3',1,'2012-09-12','127.0.0.1');
insert into admin(id,admin_name,admin_pass,admin_group,add_date,last_ip)
 values(3,'admin','21232f297a57a5a743894a0e4a801fc3',1,'2012-09-12','127.0.0.1');
insert into admin(id,admin_name,admin_pass,admin_group,add_date,last_ip)
 values(4,'admin','21232f297a57a5a743894a0e4a801fc3',1,'2012-09-12','127.0.0.1');
insert into admin(id,admin_name,admin_pass,admin_group,add_date,last_ip)
 values(5,'admin88','21232f297a57a5a743894a0e4a801fc3',1,'2012-09-12','127.0.0.1');
insert into admin(id,admin_name,admin_pass,admin_group,add_date,last_ip)
 values(6,'adminqw','21232f297a57a5a743894a0e4a801fc3',1,'2012-09-12','127.0.0.1');









