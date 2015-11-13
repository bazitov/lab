CREATE TABLE IF NOT EXISTS operators (
  id int(8) NOT NULL AUTO_INCREMENT,
  username varchar(30) NOT NULL,
  password varchar(100) NOT NULL,
  status varchar(10) DEFAULT 'pending',
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS patients (
  id int(8) NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  address varchar(200) NOT NULL,
  phoneno varchar(20) NOT NULL,
  passcode varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  status varchar(10) DEFAULT 'pending',
  passused int DEFAULT 0,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS reports (
  id int(8) NOT NULL AUTO_INCREMENT,
  reportname varchar(100) NOT NULL,
  patient_id int(8) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (patient_id) REFERENCES patients(id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS tests (
  id int(8) NOT NULL AUTO_INCREMENT,
  test varchar(30) NOT NULL,
  result varchar(30) NOT NULL,
  report_id int(8) NOT NULL,
  PRIMARY KEY (id),
  FOREIGN KEY (report_id) REFERENCES reports(id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

insert into operators (username,password,status) values('demo',MD5('demo'),'ok');

insert into patients (name,address,phoneno,passcode,email,status) values('Usman Ahmad','House No.1 London, UK','+4487654321',MD5('abcdef1'),'edward1@me.com','ok');
insert into patients (name,address,phoneno,passcode,email,status) values('Zurara Yaqoob','House No.2 London, UK','+4487654322',MD5('abcdef2'),'edward2@me.com','ok');
insert into patients (name,address,phoneno,passcode,email,status) values('Umar Iqbal','House No.3 London, UK','+4487654323',MD5('abcdef3'),'edward3@me.com','ok');
insert into patients (name,address,phoneno,passcode,email,status) values('Mohsin Khan','House No.4 London, UK','+4487654324',MD5('abcdef4'),'edward4@me.com','ok');
insert into patients (name,address,phoneno,passcode,email,status) values('Ahsan','House No.5 London, UK','+4487654325',MD5('abcdef5'),'edward5@me.com','ok');
insert into patients (name,address,phoneno,passcode,email,status) values('Arslan','House No.6 London, UK','+4487654326',MD5('abcdef6'),'edward6@me.com','ok');
insert into patients (name,address,phoneno,passcode,email,status) values('Farhan','House No.7 London, UK','+4487654327',MD5('abcdef7'),'edward7@me.com','ok');
insert into reports (reportname,patient_id) values('Report of ABC','4');
insert into reports (reportname,patient_id) values('Report of XYZ','1');