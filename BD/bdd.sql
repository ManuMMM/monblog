/* Testé sous MySQL 5.x */

drop table if exists T_COMMENT;
drop table if exists T_POST;

create table T_POST (
  BIL_ID integer primary key auto_increment,
  BIL_DATE datetime not null,
  BIL_TITLE varchar(100) not null,
  BIL_CONTENT varchar(400) not null
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

create table T_COMMENT (
  COM_ID integer primary key auto_increment,
  COM_DATE datetime not null,
  COM_AUTHOR varchar(100) not null,
  COM_CONTENT varchar(200) not null,
  BIL_ID integer not null,
  constraint fk_com_bil foreign key(BIL_ID) references T_POST(BIL_ID)
) ENGINE=INNODB CHARACTER SET utf8 COLLATE utf8_general_ci;

insert into T_POST(BIL_DATE, BIL_TITLE, BIL_CONTENT) values
(NOW(), 'Premier post', 'Bonjour monde ! Ceci est le premier post sur mon blog.');
insert into T_POST(BIL_DATE, BIL_TITLE, BIL_CONTENT) values
(NOW(), 'Au travail', 'Il faut enrichir ce blog dès maintenant.');

insert into T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, BIL_ID) values
(NOW(), 'A. Nonyme', 'Bravo pour ce début', 1);
insert into T_COMMENT(COM_DATE, COM_AUTHOR, COM_CONTENT, BIL_ID) values
(NOW(), 'Moi', 'Merci ! Je vais continuer sur ma lancée', 1);