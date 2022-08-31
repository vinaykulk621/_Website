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
    `password` CHAR(60) NOT NULL ,
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
    `password` CHAR(60) NOT NULL ,
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
    `sem` int(1) NOT NULL,
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
    `total_marks` INT(3) AS (`cie`+`see`),
    `sem` int(1) NOT NULL,
    CHECK (`see` BETWEEN 0 AND 50),
    CHECK (`cie` BETWEEN 0 AND 50),
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
    PRIMARY KEY (`usn`(10),`course_id`(15),`exam_name`(10)),
    FOREIGN key(`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`course_id`) REFERENCES `enrolled`(`course_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB ;





-- inserting values into department table
INSERT INTO `department`(`department_name`, `hod`) VALUES 
('CV','H. B. NAGARAJ'),
('ETE','N SRINIVASA RAO'),
('MCA','Ch. Ram Mohan Reddy'),
('MECH','G. GIRIDHARA'),
('ISE','P JAYAREKHA'),
('EEE','A.N.NAGASHREE'),
('EIE','SANTOSH R. DESAI'),
('MATH','Veena Jawali'),
('ECE','Siddappaji'),
('ML','Joshi Manisha S'),
('PHY','Murugendrappa M V'),
('IEM','B.R.Ramji'),
('CH','Y. K. Suneetha'),
('CSE','JYOTHI S. NAYAK'),
('BT','CHANDRAPRASAD MS'),
('AS','Rammohan Y.S'),
('AIML','Gowrishankar');




-- inserting into student table
INSERT INTO `student`(`usn`, `student_email`, `student_first_name`, `student_middle_name`, `student_last_name`, `department_name`, `password`, `dob`, `sem`)VALUES
('1BM20CS001','vinay.cs20@bmsce.ac.in','Vinay','','Kulkarni','CSE','$2y$10$c.zlbTRXJ.8l2os2n.T3Qub26GNJnVfoqANcsRBWI5y2OaQurxfVS','2000-12-24',3),
('1BM20CS002','vignesh.cs20@bmsce.ac.in','vignesh','','V','CSE','$2y$10$c.zlbTRXJ.8l2os2n.T3Qub26GNJnVfoqANcsRBWI5y2OaQurxfVS','2003-10-20',3),
('1BM20CS003','vinayak.cs20@bmsce.ac.in','Vinayak','Y','Bajantri','CSE','$2y$10$c.zlbTRXJ.8l2os2n.T3Qub26GNJnVfoqANcsRBWI5y2OaQurxfVS','2002-12-24',3),
('1BM20CS004','anish.cs20@bmsce.ac.in','Anish','Y','Khatriya','CSE','$2y$10$c.zlbTRXJ.8l2os2n.T3Qub26GNJnVfoqANcsRBWI5y2OaQurxfVS','2001-08-24',3);




-- inserting into course table
INSERT INTO `course`(`course_id`, `course_name`, `department_name`, `credit`, `sem`) VALUES
-- 3rd sem
('19MA3BSSDM','Statistics and Discrete Mathematics','CSE',4,3),
('19CS3ESMMC','Microprocessors and Microcontrollers','CSE',4,3),
('19CS3PCOOJ','Object Oriented Java Programming','CSE',4,3),
('19CS3PCDST','Data Structures','CSE',3,3),
('19CS3PCCOA','Computer Organization and Architecture','CSE',3,3),
('19CS3PCLOD','Logic Design','CSE',4,3),
('19CS3PWPW1','Project Work-1','CSE',2,3),
('19CS3NCNC3','Physical Activity (Sports/ Yoga Etc.)','CSE',0,3),
('19HS3ICEVS','Environmental Studies','CSE',1,3),

-- 4th sem
('19MA4BSLIA','Linear Algebra','CSE',4,4),
('19CS4PCTFC','Theoretical Foundations of Computations','CSE',4,4),
('19CS4PCDBM','Database Management Systems','CSE',4,4),
('19CS4PCADA','Analysis and Design of Algorithms','CSE',4,4),
('19CS4PCOPS','Operating Systems','CSE',4,4),
('19CS4SRSTI','Seminar Technical / Internship','CSE',1,4),
('19CS4PWPW2','Project Work-2','CSE',2,4),
('19CS4NCNC4','Cultural Activity (Music/Dance etc.)','CSE',0,4);



-- facculty
INSERT INTO `facculty`(`fid`, `facculty_email`, `facculty_name`,`department_name`,`password`) VALUES 
('CSE001','bgprasad.cse@bmsce.ac.in','Dr. B G PRASAD','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE002','varaprasad.cse@bmsce.ac.in','Dr. G.VARAPRASAD','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE003','indira.cse@bmsce.ac.in','Dr. INDIRAMMA M','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE004','jyothinayak.cse@bmsce.ac.in','Dr. JYOTHI S. NAYAK','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE005','nagarathna.cse@bmsce.ac.in','Dr. NAGARATHNA N','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE006','prasad.cse@bmsce.ac.in','Dr. PRASAD G R','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE007','jakkali.cse@bmsce.ac.in','BASAVARAJ JAKKALI','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE008','kavithas.cse@bmsce.ac.in','Dr. KAVITHA SOODA','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE009','kayarvizhyn.cse@bmsce.ac.in','Dr. KAYARVIZHY N','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE010','umadevi.cse@bmsce.ac.in','Dr. UMADEVI V','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE011','madhavi.cse@bmsce.ac.in','MADHAVI R.P.','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE012','antararc.cse@bmsce.ac.in','ANTARA ROY CHOUDHURY','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE013','asha.cse@bmsce.ac.in','Dr. ASHA G R','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE014','panimozhi.cse@bmsce.ac.in','Dr. K. PANIMOZHI','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE015','blatha.cse@bmsce.ac.in','Dr. LATHA N.R.','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE016','bmanjunathdr.cse@bmsce.ac.in','Dr. Manjunath D R','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE017','nandhiniv.cse@bmsce.ac.in','Dr. NANDHINI VINEETH','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE018','nselva.cse@bmsce.ac.in','Dr. SELVA KUMAR S','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE019','namratham.cse@bmsce.ac.in','NAMRATHA M','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE020','rekhags.cse@bmsce.ac.in','REKHA G S','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE021','nsonikasharma.cse@bmsce.ac.in','Sonika Shar,a D','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('CSE022','vikranth.cse@bmsce.ac.in','VIKRANTH B.M','CSE','$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C'),
('COE001', 'coe@bmsce.ac.in', 'Dr. Rajesh', 'AIML', '$2y$10$FnSYzucdGKY0r5kSyQ2Kde33qeZoZbqh8g1sep2o2Mr/EaThsgO7C');



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
('CSE022','19CS4NCNC4'),
('CSE001','19MA4BSLIA'),
('CSE002','19CS4PCTFC'),
('CSE003','19CS4PCDBM'),
('CSE004','19CS4PCADA'),
('CSE005','19CS4PCOPS'),
('CSE006','19CS4SRSTI'),
('CSE007','19CS4PWPW2'),
('CSE008','19CS4NCNC4');



-- inserting into enrolled table
INSERT INTO `enrolled`(`usn`, `course_id`, `fid`, `sem`) VALUES
-- 3rd sem
('1BM20CS001','19MA3BSSDM','CSE021',3),
('1BM20CS001','19CS3ESMMC','CSE015',3),
('1BM20CS001','19CS3PCOOJ','CSE019',3),
('1BM20CS001','19CS3PWPW1','CSE003',3),
('1BM20CS001','19CS3PCDST','CSE014',3),
('1BM20CS001','19CS3PCCOA','CSE011',3),
('1BM20CS001','19CS3PCLOD','CSE007',3),

('1BM20CS002','19MA3BSSDM','CSE021',3),
('1BM20CS002','19CS3ESMMC','CSE015',3),
('1BM20CS002','19CS3PCOOJ','CSE019',3),
('1BM20CS002','19CS3PWPW1','CSE003',3),
('1BM20CS002','19CS3PCDST','CSE016',3),
('1BM20CS002','19CS3PCCOA','CSE012',3),
('1BM20CS002','19CS3PCLOD','CSE007',3),

('1BM20CS003','19MA3BSSDM','CSE021',3),
('1BM20CS003','19CS3ESMMC','CSE015',3),
('1BM20CS003','19CS3PCOOJ','CSE019',3),
('1BM20CS003','19CS3PWPW1','CSE003',3),
('1BM20CS003','19CS3PCDST','CSE018',3),
('1BM20CS003','19CS3PCCOA','CSE013',3),
('1BM20CS003','19CS3PCLOD','CSE008',3),


('1BM20CS004','19MA3BSSDM','CSE021',3),
('1BM20CS004','19CS3ESMMC','CSE015',3),
('1BM20CS004','19CS3PCOOJ','CSE019',3),
('1BM20CS004','19CS3PWPW1','CSE003',3),
('1BM20CS004','19CS3PCDST','CSE018',3),
('1BM20CS004','19CS3PCCOA','CSE013',3),
('1BM20CS004','19CS3PCLOD','CSE008',3),



-- 4th sem
('1BM20CS001','19MA4BSLIA','CSE001',4),
('1BM20CS001','19CS4PCTFC','CSE002',4),
('1BM20CS001','19CS4PCDBM','CSE003',4),
('1BM20CS001','19CS4PCADA','CSE004',4),
('1BM20CS001','19CS4PCOPS','CSE005',4),
('1BM20CS001','19CS4SRSTI','CSE006',4),
('1BM20CS001','19CS4PWPW2','CSE007',4),
('1BM20CS001','19CS4NCNC4','CSE008',4),



('1BM20CS002','19MA4BSLIA','CSE001',4),
('1BM20CS002','19CS4PCTFC','CSE002',4),
('1BM20CS002','19CS4PCDBM','CSE003',4),
('1BM20CS002','19CS4PCADA','CSE004',4),
('1BM20CS002','19CS4PCOPS','CSE005',4),
('1BM20CS002','19CS4SRSTI','CSE006',4),
('1BM20CS002','19CS4PWPW2','CSE007',4),
('1BM20CS002','19CS4NCNC4','CSE008',4),

('1BM20CS003','19MA4BSLIA','CSE001',4),
('1BM20CS003','19CS4PCTFC','CSE002',4),
('1BM20CS003','19CS4PCDBM','CSE003',4),
('1BM20CS003','19CS4PCADA','CSE004',4),
('1BM20CS003','19CS4PCOPS','CSE005',4),
('1BM20CS003','19CS4SRSTI','CSE006',4),
('1BM20CS003','19CS4PWPW2','CSE007',4),
('1BM20CS003','19CS4NCNC4','CSE008',4),


('1BM20CS004','19MA4BSLIA','CSE001',4),
('1BM20CS004','19CS4PCTFC','CSE002',4),
('1BM20CS004','19CS4PCDBM','CSE003',4),
('1BM20CS004','19CS4PCADA','CSE004',4),
('1BM20CS004','19CS4PCOPS','CSE005',4),
('1BM20CS004','19CS4SRSTI','CSE006',4),
('1BM20CS004','19CS4PWPW2','CSE007',4),
('1BM20CS004','19CS4NCNC4','CSE008',4);

-- result
-- exam_name
    -- regular
    -- reregister
    -- fastrack
    -- makeup

INSERT INTO `result`(`usn`, `exam_name`, `course_id`, `cie`, `see`, `sem`)
VALUES 
-- 3rd sem
('1BM20CS001','regular','19MA3BSSDM',45,32,3),
('1BM20CS001','regular','19CS3ESMMC',45,32,3),
('1BM20CS001','regular','19CS3PCOOJ',45,32,3),
('1BM20CS001','regular','19CS3PWPW1',45,32,3),
('1BM20CS001','regular','19CS3PCDST',45,32,3),
('1BM20CS001','regular','19CS3PCCOA',45,32,3),
('1BM20CS001','regular','19CS3PCLOD',45,32,3),

('1BM20CS002','regular','19MA3BSSDM',45,32,3),
('1BM20CS002','regular','19CS3ESMMC',45,32,3),
('1BM20CS002','regular','19CS3PCOOJ',45,32,3),
('1BM20CS002','regular','19CS3PWPW1',45,32,3),
('1BM20CS002','regular','19CS3PCCOA',45,32,3),
('1BM20CS002','regular','19CS3PCDST',45,32,3),
('1BM20CS002','regular','19CS3PCLOD',45,32,3),

('1BM20CS003','regular','19MA3BSSDM',45,32,3),
('1BM20CS003','regular','19CS3ESMMC',45,32,3),
('1BM20CS003','regular','19CS3PCOOJ',45,32,3),
('1BM20CS003','regular','19CS3PWPW1',45,32,3),
('1BM20CS003','regular','19CS3PCDST',45,32,3),
('1BM20CS003','regular','19CS3PCCOA',45,32,3),
('1BM20CS003','regular','19CS3PCLOD',45,32,3),

('1BM20CS004','regular','19MA3BSSDM',25,12,3),
('1BM20CS004','regular','19CS3ESMMC',12,22,3),
('1BM20CS004','regular','19CS3PCOOJ',32,12,3),
('1BM20CS004','regular','19CS3PWPW1',36,12,3),
('1BM20CS004','regular','19CS3PCDST',20,20,3),
('1BM20CS004','regular','19CS3PCCOA',26,05,3),
('1BM20CS004','regular','19CS3PCLOD',32,12,3),

-- 4th sem
('1BM20CS001','regular','19MA4BSLIA',45,32,4),
('1BM20CS001','regular','19CS4PCTFC',45,32,4),
('1BM20CS001','regular','19CS4PCDBM',45,32,4),
('1BM20CS001','regular','19CS4PCADA',45,32,4),
('1BM20CS001','regular','19CS4PCOPS',45,32,4),
('1BM20CS001','regular','19CS4SRSTI',45,32,4),
('1BM20CS001','regular','19CS4PWPW2',45,32,4),
('1BM20CS001','regular','19CS4NCNC4',45,32,4),


('1BM20CS002','regular','19MA4BSLIA',45,32,4),
('1BM20CS002','regular','19CS4PCTFC',45,32,4),
('1BM20CS002','regular','19CS4PCDBM',45,32,4),
('1BM20CS002','regular','19CS4PCADA',45,32,4),
('1BM20CS002','regular','19CS4PCOPS',45,32,4),
('1BM20CS002','regular','19CS4SRSTI',45,32,4),
('1BM20CS002','regular','19CS4PWPW2',45,32,4),
('1BM20CS002','regular','19CS4NCNC4',45,32,4),

('1BM20CS003','regular','19MA4BSLIA',45,32,4),
('1BM20CS003','regular','19CS4PCTFC',45,32,4),
('1BM20CS003','regular','19CS4PCDBM',45,32,4),
('1BM20CS003','regular','19CS4PCADA',45,32,4),
('1BM20CS003','regular','19CS4PCOPS',45,32,4),
('1BM20CS003','regular','19CS4SRSTI',45,32,4),
('1BM20CS003','regular','19CS4PWPW2',45,32,4),
('1BM20CS003','regular','19CS4NCNC4',45,32,4),

('1BM20CS004','regular','19MA4BSLIA',15,12,4),
('1BM20CS004','regular','19CS4PCTFC',45,32,4),
('1BM20CS004','regular','19CS4PCDBM',15,32,4),
('1BM20CS004','regular','19CS4PCADA',45,12,4),
('1BM20CS004','regular','19CS4PCOPS',15,32,4),
('1BM20CS004','regular','19CS4SRSTI',45,32,4),
('1BM20CS004','regular','19CS4PWPW2',15,12,4),
('1BM20CS004','regular','19CS4NCNC4',45,32,4);


-- -- aplication
