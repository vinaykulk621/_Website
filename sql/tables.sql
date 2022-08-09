-- branch table
CREATE TABLE `website`.`branch`
(
    `branch_name` VARCHAR(4)  NOT NULL , 
    `hod` VARCHAR(40) NOT NULL , 
    PRIMARY KEY (`branch_name`(4)), 
    UNIQUE `hod` (`hod`(40))
)
ENGINE = InnoDB;


-- student table
CREATE TABLE `website`.`student` 
(
    `usn` VARCHAR(10) NOT NULL , 
    `student_name` VARCHAR(40) NOT NULL , 
    `student_email` VARCHAR(40) NOT NULL , 
    `branch_name` VARCHAR(4) NOT NULL , 
    `password` VARCHAR(25) NOT NULL , 
    PRIMARY KEY (`usn`(10)), 
    UNIQUE `student_email` (`student_email`(40)), 
    UNIQUE `branch_name` (`branch_name`(4)),
    FOREIGN KEY (`branch_name`) REFERENCES `branch`(`branch_name`)
    ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = InnoDB;


-- course table
CREATE TABLE `website`.`course`
(
    `branch_name` VARCHAR(4) NOT NULL ,
    `course_id` VARCHAR(15) NOT NULL ,
    `course_name` VARCHAR(50) NOT NULL ,
    `credit` INT(2) NOT NULL ,
    `semester` INT(1) NOT NULL ,
    PRIMARY KEY (`course_id`(15)),
    UNIQUE `course_name` (`course_name`(50)),
    FOREIGN KEY (`branch_name`) REFERENCES `branch`(`branch_name`) 
    ON DELETE CASCADE ON UPDATE CASCADE
)
ENGINE = InnoDB;


-- enrolled table
CREATE TABLE `website`.`enrolled` 
(
    `usn` VARCHAR(10) NOT NULL ,
    `course_id` VARCHAR(15) NOT NULL ,
    `course_name` VARCHAR(50) NOT NULL ,
    FOREIGN key(`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN key(`course_id`) REFERENCES `course`(`course_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN key(`course_name`) REFERENCES `course`(`course_name`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB ;


-- result table
CREATE TABLE `website`.`result`
(
    `usn` VARCHAR(10) NOT NULL , 
    `course_id` VARCHAR(15) NOT NULL , 
    `cie` INT(2) NOT NULL , 
    `see` INT(2) NOT NULL , 
    `total_marks` INT(3) NOT NULL , 
    `grade` CHAR(1) NOT NULL , 
    PRIMARY KEY (`usn`(10)),
    FOREIGN KEY (`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE, 
    FOREIGN KEY (`course_id`) REFERENCES `course`(`course_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB;


-- appication table
CREATE TABLE `website`.`aplication` 
(
    `usn` VARCHAR(10) NOT NULL ,
    `type` VARCHAR(5) NOT NULL ,
    `course_id` VARCHAR(15) NOT NULL ,
    PRIMARY KEY (`type`(5)),
    FOREIGN key(`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB ;



-- inserting values into branch table
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('CV','H. B. NAGARAJ');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('ETE','N SRINIVASA RAO');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('MCA','Ch. Ram Mohan Reddy');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('MECH','G. GIRIDHARA');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('ISE','P JAYAREKHA');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('EEE','A.N.NAGASHREE');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('EIE','SANTOSH R. DESAI');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('MATH','Veena Jawali');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('ECE','Siddappaji');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('ML','Joshi Manisha S');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('PHY','Murugendrappa M V');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('IEM','B.R.Ramji');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('CH','Y. K. Suneetha');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('CSE','JYOTHI S. NAYAK');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('BT','CHANDRAPRASAD MS');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('AS','Rammohan Y.S');
INSERT INTO `branch`(`branch_name`, `hod`) VALUES ('AIML','Gowrishankar');



-- inserting into student table
INSERT INTO `student`(`usn`, `student_name`, `student_email`, `branch_name`, `password`) VALUES ('1BM18CS001','Vinay','vinay.cs18@bmsce.ac.in','CSE','12345');
INSERT INTO `student`(`usn`, `student_name`, `student_email`, `branch_name`, `password`) VALUES ('1BM18CS002','Vignesh','vignesh.cs18@bmsce.ac.in','CSE','12345');
INSERT INTO `student`(`usn`, `student_name`, `student_email`, `branch_name`, `password`) VALUES ('1BM18CS003','Vinayak','vinayak.cs18@bmsce.ac.in','CSE','12345');


-- inserting into course table
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19MA3BSSDM','Statistics and Discrete Mathematics','4','3');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS3ESMMC','Microprocessors and Microcontrollers','4','3');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS3PCOOJ','Object Oriented Java Programming','4','3');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS3PCDST','Data Structures','3','3');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS3PCCOA','Computer Organization and Architecture','3','3');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS3PCLOD','Logic Design','4','3');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS3PWPW1','Project Work-1','2','3');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS3NCNC3','Physical Activity (Sports/ Yoga Etc.)','0','3');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19HS3ICEVS','Environmental Studies','1','3');

INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19MA4BSLIA','Linear Algebra','4','4');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS4PCTFC','Theoretical Foundations of Computations','4','4');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS4PCDBM','Database Management Systems','4','4');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS4PCADA','Analysis and Design of Algorithms','4','4');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS4PCOPS','Operating Systems','4','4');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS4SRSTI','Seminar Technical / Internship','1','4');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS4PWPW2','Project Work-2','2','4');
INSERT INTO `course`(`branch_name`, `course_id`, `course_name`, `credit`, `semester`) VALUES ('CSE','19CS4NCNC4','Cultural Activity (Music/Dance etc.)','0','4');


-- inserting into enrolled table
-- 3rd sem
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS001','19MA3BSSDM','Statistics and Discrete Mathematics');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS002','19MA3BSSDM','Statistics and Discrete Mathematics');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS003','19MA3BSSDM','Statistics and Discrete Mathematics');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS001','19CS3ESMMC','Microprocessors and Microcontrollers');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS002','19CS3ESMMC','Microprocessors and Microcontrollers');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS003','19CS3ESMMC','Microprocessors and Microcontrollers');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS001','19CS3PCOOJ','Object Oriented Java Programming');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS002','19CS3PCOOJ','Object Oriented Java Programming');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS003','19CS3PCOOJ','Object Oriented Java Programming');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS001','19CS3PCDST','Data Structures');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS002','19CS3PCDST','Data Structures');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS003','19CS3PCDST','Data Structures');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS001','19CS3PCCOA','Computer Organization and Architecture');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS002','19CS3PCCOA','Computer Organization and Architecture');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS003','19CS3PCCOA','Computer Organization and Architecture');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS001','19CS3PCLOD','Logic Design');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS002','19CS3PCLOD','Logic Design');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS003','19CS3PCLOD','Logic Design');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS001','19CS3PWPW1','Project Work-1');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS002','19CS3PWPW1','Project Work-1');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS003','19CS3PWPW1','Project Work-1');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS001','19CS3NCNC3','Physical Activity (Sports/ Yoga Etc.)');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS002','19CS3NCNC3','Physical Activity (Sports/ Yoga Etc.)');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS003','19CS3NCNC3','Physical Activity (Sports/ Yoga Etc.)');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS001','19HS3ICEVS','Environmental Studies');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS002','19HS3ICEVS','Environmental Studies');
INSERT INTO `enrolled`(`usn`, `course_id`, `course_name`) VALUES ('1BM20CS003','19HS3ICEVS','Environmental Studies');