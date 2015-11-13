CREATE TABLE IF NOT EXISTS 'operators' (
  'id' int(8) NOT NULL AUTO_INCREMENT,
  'username' varchar(30) NOT NULL,
  'password' varchar(30) NOT NULL,
  PRIMARY KEY ('id')
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS 'patients' (
  'id' int(8) NOT NULL AUTO_INCREMENT,
  'name' varchar(30) NOT NULL,
  'address' varchar(200) NOT NULL,
  'phoneno' varchar(20) NOT NULL,
  'passcode' varchar(30) NOT NULL,
  'email' varchar(100) NOT NULL,
  PRIMARY KEY ('id')
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS 'reports' (
  'id' int(8) NOT NULL AUTO_INCREMENT,
  'patient_id' int(8) NOT NULL,
  PRIMARY KEY ('id'),
  FOREIGN KEY (patient_id) REFERENCES patients(id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS 'tests' (
  'id' int(8) NOT NULL AUTO_INCREMENT,
  'test' varchar(30) NOT NULL,
  'result' varchar(30) NOT NULL,
  'report_id' int(8) NOT NULL,
  PRIMARY KEY ('id'),
  FOREIGN KEY (report_id) REFERENCES reports(id)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;