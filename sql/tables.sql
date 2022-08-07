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
    PRIMARY KEY (`usn`(5)),
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



-- pending

-- inserting into student table
INSERT INTO `student`(`usn`, `student_name`, `student_email`, `branch_name`, `password`) VALUES ('1BM18CS001','ADARSH','adarsh.cs18@bmsce.ac.in','CSE','19Nndc*!!knsc');