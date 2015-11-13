CREATE TABLE IF NOT EXISTS operators (
  id int(8) NOT NULL AUTO_INCREMENT,
  username varchar(30) NOT NULL,
  password varchar(30) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS patients (
  id int(8) NOT NULL AUTO_INCREMENT,
  name varchar(30) NOT NULL,
  address varchar(200) NOT NULL,
  phoneno varchar(20) NOT NULL,
  passcode varchar(30) NOT NULL,
  email varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS reports (
  id int(8) NOT NULL AUTO_INCREMENT,
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

insert into operators (username,password) values('demo','demo');
insert into patients (name,address,phoneno,passcode,email) values('Patient1','House No.1 London, UK','+4487654321','abcdef1','edward1@me.com');
insert into patients (name,address,phoneno,passcode,email) values('Patient2','House No.2 London, UK','+4487654322','abcdef2','edward2@me.com');
insert into patients (name,address,phoneno,passcode,email) values('Patient3','House No.3 London, UK','+4487654323','abcdef3','edward3@me.com');
insert into patients (name,address,phoneno,passcode,email) values('Patient4','House No.4 London, UK','+4487654324','abcdef4','edward4@me.com');
insert into patients (name,address,phoneno,passcode,email) values('Patient5','House No.5 London, UK','+4487654325','abcdef5','edward5@me.com');
insert into patients (name,address,phoneno,passcode,email) values('Patient6','House No.6 London, UK','+4487654326','abcdef6','edward6@me.com');
insert into patients (name,address,phoneno,passcode,email) values('Patient7','House No.7 London, UK','+4487654327','abcdef7','edward7@me.com');