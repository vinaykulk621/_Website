-- drop database website;


-- department table
CREATE TABLE `website`.`department`
(
    `department_name` VARCHAR(4)  NOT NULL , 
    `hod` VARCHAR(40) NOT NULL , 
    PRIMARY KEY (`department_name`(4))
)
ENGINE = InnoDB;


-- student table
CREATE TABLE `website`.`student` 
(
    `usn` VARCHAR(10) NOT NULL , 
    `student_email` VARCHAR(40) NOT NULL , 
    `student_first_name` VARCHAR(40) NOT NULL , 
    `student_middle_name` VARCHAR(40) DEFAULT NULL , 
    `student_last_name` VARCHAR(40) NOT NULL , 
    `department_name` VARCHAR(4) NOT NULL , 
    `password` VARCHAR(25) NOT NULL ,
    `dob` DATE NOT NULL,
    `age` int(2) AS (TIMESTAMPDIFF(YEAR, dob, CURDATE())),
    `sem` int(1) NOT NULL,
    PRIMARY KEY (`usn`(10)), 
    FOREIGN KEY (`department_name`) REFERENCES `department`(`department_name`)
    ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = InnoDB;


-- course table
CREATE TABLE `website`.`course`
(
    `course_id` VARCHAR(15) NOT NULL ,
    `course_name` VARCHAR(50) NOT NULL ,
    `department_name` VARCHAR(4) NOT NULL ,
    `credit` INT(2) NOT NULL ,
    `sem` INT(1) NOT NULL ,
    PRIMARY KEY (`course_id`(15)),
    FOREIGN KEY (`department_name`) REFERENCES `department`(`department_name`) 
    ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = InnoDB;


-- facculty table
CREATE TABLE `website`.`facculty` 
(
    `fid` VARCHAR(10) PRIMARY KEY ,
    `facculty_email` VARCHAR(40) NOT NULL , 
    `facculty_name` VARCHAR(40) NOT NULL , 
    `department_name` VARCHAR(4) NOT NULL ,
    FOREIGN key(`department_name`) REFERENCES `department`(`department_name`)
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB ;


-- course handled by teacher table
CREATE TABLE `website`.`course_handled` 
(
    `fid` VARCHAR(10) NOT NULL ,
    `course_id` VARCHAR(15) NOT NULL ,
    PRIMARY KEY(`fid`(10),`course_id`(15)),
    FOREIGN key(`course_id`) REFERENCES `course`(`course_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN key(`fid`) REFERENCES `facculty`(`fid`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB ;


-- enrolled table
CREATE TABLE `website`.`enrolled` 
(
    `usn` VARCHAR(10) NOT NULL ,
    `course_id` VARCHAR(15) NOT NULL ,
    `fid` VARCHAR(10) NOT NULL ,
    PRIMARY KEY(`usn`(10),`course_id`(15)),
    FOREIGN key(`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN key(`course_id`) REFERENCES `course_handled`(`course_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN key(`fid`) REFERENCES `course_handled`(`fid`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB ;


-- result table
CREATE TABLE `website`.`result`
(
    `usn` VARCHAR(10) NOT NULL , 
    `exam_name` VARCHAR(10) NOT NULL , 
    `course_id` VARCHAR(15) NOT NULL , 
    `cie` INT(2) NOT NULL , 
    `see` INT(2) NOT NULL , 
    `total_marks` INT(3) NOT NULL , 
    CHECK (0<=`see`<=50),
    CHECK (0<=`cie`<=50),
    CHECK (0<=`total_marks`<=100),
    PRIMARY KEY (`usn`(10),`exam_name`(10),`course_id`(15)),
    FOREIGN KEY (`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE, 
    FOREIGN KEY (`course_id`) REFERENCES `enrolled`(`course_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB;


-- appication table
CREATE TABLE `website`.`aplication` 
(
    `usn` VARCHAR(10) NOT NULL ,
    `exam_name` VARCHAR(10) NOT NULL ,
    `course_id` VARCHAR(15) NOT NULL ,
    PRIMARY KEY (`usn`(10)),
    FOREIGN key(`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`course_id`) REFERENCES `enrolled`(`course_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB ;





-- inserting values into department table
INSERT INTO `department`(`department_name`, `hod`) VALUES ('CV','H. B. NAGARAJ');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('ETE','N SRINIVASA RAO');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('MCA','Ch. Ram Mohan Reddy');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('MECH','G. GIRIDHARA');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('ISE','P JAYAREKHA');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('EEE','A.N.NAGASHREE');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('EIE','SANTOSH R. DESAI');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('MATH','Veena Jawali');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('ECE','Siddappaji');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('ML','Joshi Manisha S');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('PHY','Murugendrappa M V');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('IEM','B.R.Ramji');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('CH','Y. K. Suneetha');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('CSE','JYOTHI S. NAYAK');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('BT','CHANDRAPRASAD MS');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('AS','Rammohan Y.S');
INSERT INTO `department`(`department_name`, `hod`) VALUES ('AIML','Gowrishankar');




-- inserting into student table
INSERT INTO `student`(`usn`, `student_email`, `student_first_name`, `student_middle_name`, `student_last_name`, `department_name`, `password`, `dob`, `sem`)VALUES
('1BM20CS001','vinay.cs20@bmsce.ac.in','Vinay','','Kulkarni','CSE','12345','2000-12-24',3),
('1BM20CS002','vignesh.cs20@bmsce.ac.in','vignesh','','V','CSE','12345','2003-10-20',3),
('1BM20CS003','vinayak.cs20@bmsce.ac.in','Vinayak','Y','Bajantri','CSE','12345','2002-12-24',3);




-- inserting into course table
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19MA3BSSDM','Statistics and Discrete Mathematics','CSE',4,3);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS3ESMMC','Microprocessors and Microcontrollers','CSE',4,3);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS3PCOOJ','Object Oriented Java Programming','CSE',4,3);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS3PCDST','Data Structures','CSE',3,3);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS3PCCOA','Computer Organization and Architecture','CSE','3','3');
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS3PCLOD','Logic Design','CSE',4,3);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS3PWPW1','Project Work-1','CSE',2,3);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS3NCNC3','Physical Activity (Sports/ Yoga Etc.)','CSE',0,3);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19HS3ICEVS','Environmental Studies','CSE',1,3);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19MA4BSLIA','Linear Algebra','CSE',4,4);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS4PCTFC','Theoretical Foundations of Computations','CSE',4,4);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS4PCDBM','Database Management Systems','CSE',4,4);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS4PCADA','Analysis and Design of Algorithms','CSE',4,4);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS4PCOPS','Operating Systems','CSE',4,4);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS4SRSTI','Seminar Technical / Internship','CSE',1,4);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS4PWPW2','Project Work-2','CSE',2,4);
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES ('19CS4NCNC4','Cultural Activity (Music/Dance etc.)','CSE',0,4);



-- facculty
INSERT INTO `facculty`(`fid`, `facculty_email`, `facculty_name`,`department_name`) VALUES 
('CSE001','bgprasad. ','Dr. B G PRASAD','CSE'),
('CSE002','varaprasad. ','Dr. G.VARAPRASAD','CSE'),
('CSE003','indira. ','Dr. INDIRAMMA M','CSE'),
('CSE004','jyothinayak. ','Dr. JYOTHI S. NAYAK','CSE'),
('CSE005','nagarathna. ','Dr. NAGARATHNA N','CSE'),
('CSE006','prasad. ','Dr. PRASAD G R','CSE'),
('CSE007','jakkali. ','BASAVARAJ JAKKALI','CSE'),
('CSE008','kavithas. ','Dr. KAVITHA SOODA','CSE'),
('CSE009','kayarvizhyn. ','Dr. KAYARVIZHY N','CSE'),
('CSE010','umadevi. ','Dr. UMADEVI V','CSE'),
('CSE011','madhavi. ','MADHAVI R.P.','CSE'),
('CSE012','antararc. ','ANTARA ROY CHOUDHURY','CSE'),
('CSE013','asha. ','Dr. ASHA G R','CSE'),
('CSE014','panimozhi. ','Dr. K. PANIMOZHI','CSE'),
('CSE015','blatha. ','Dr. LATHA N.R.','CSE'),
('CSE016','bmanjunathdr. ','Dr. Manjunath D R','CSE'),
('CSE017','nandhiniv. ','Dr. NANDHINI VINEETH','CSE'),
('CSE018','nselva. ','Dr. SELVA KUMAR S','CSE'),
('CSE019','namratham. ','NAMRATHA M','CSE'),
('CSE020','rekhags. ','REKHA G S','CSE'),
('CSE021','nsonikasharma. ','Sonika Shar,a D','CSE'),
('CSE022','vikranth. ','VIKRANTH B.M','CSE');




-- course_handled
INSERT INTO `course_handled`(`fid`, `course_id`) VALUES 
('CSE001','19HS3ICEVS'),
('CSE002','19CS3NCNC3'),
('CSE003','19CS3PWPW1'),
('CSE004','19HS3ICEVS'),
('CSE005','19CS3NCNC3'),
('CSE006','19CS3PWPW1'),
('CSE007','19CS3PCLOD'),
('CSE008','19CS3PCLOD'),
('CSE009','19MA3BSSDM'),
('CSE010','19CS4NCNC4'),
('CSE011','19CS3PCCOA'),
('CSE012','19CS3PCCOA'),
('CSE013','19CS3PCCOA'),
('CSE014','19CS3PCDST'),
('CSE015','19CS3ESMMC'),
('CSE016','19CS3PCDST'),
('CSE017','19CS3NCNC3'),
('CSE018','19CS3PCDST'),
('CSE019','19CS3PCOOJ'), 
('CSE020','19CS3ESMMC'),
('CSE021','19MA3BSSDM'),
('CSE022','19CS4NCNC4');



-- inserting into enrolled table
-- 3rd sem
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS001','19MA3BSSDM','CSE021');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS002','19MA3BSSDM','CSE021');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS003','19MA3BSSDM','CSE021');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS001','19CS3ESMMC','CSE015');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS002','19CS3ESMMC','CSE015');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS003','19CS3ESMMC','CSE015');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS001','19CS3PCOOJ','CSE019');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS002','19CS3PCOOJ','CSE019');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS003','19CS3PCOOJ','CSE019');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS001','19CS3PCDST','CSE014');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS002','19CS3PCDST','CSE016');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS003','19CS3PCDST','CSE018');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS001','19CS3PCCOA','CSE011');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS002','19CS3PCCOA','CSE012');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS003','19CS3PCCOA','CSE013');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS001','19CS3PCLOD','CSE007');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS002','19CS3PCLOD','CSE007');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS003','19CS3PCLOD','CSE008');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS001','19CS3PWPW1','CSE003');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS002','19CS3PWPW1','CSE003');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS003','19CS3PWPW1','CSE003');
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`) VALUES ('1BM20CS001','19CS3NCNC3','CSE017');




-- result
-- exam_name
    -- regular
    -- reregister
    -- fastrack
    -- makeup
INSERT INTO `result`(`usn`, `exam_name`, `course_id`, `cie`, `see`, `total_marks`) VALUES 
('1BM20CS001','regular','19MA3BSSDM',45,32,77),
('1BM20CS002','regular','19MA3BSSDM',45,32,77),
('1BM20CS003','regular','19MA3BSSDM',45,32,77),
('1BM20CS001','regular','19CS3ESMMC',45,32,77),
('1BM20CS002','regular','19CS3ESMMC',45,32,77),
('1BM20CS003','regular','19CS3ESMMC',45,32,77),
('1BM20CS001','regular','19CS3PCOOJ',45,32,77),
('1BM20CS002','regular','19CS3PCOOJ',45,32,77),
('1BM20CS003','regular','19CS3PCOOJ',45,32,77),
('1BM20CS001','regular','19CS3PCDST',45,32,77),
('1BM20CS002','regular','19CS3PCDST',45,32,77),
('1BM20CS003','regular','19CS3PCDST',45,32,77);



-- aplication
