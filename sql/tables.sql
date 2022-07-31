-- student table
CREATE TABLE `website`.`student` 
(
    `usn` VARCHAR(10) NOT NULL ,
    `student_email` VARCHAR(30) NOT NULL ,
    `student_name` VARCHAR(30) NOT NULL ,
    `branch_name` VARCHAR(5) NOT NULL ,
    PRIMARY KEY (`usn`(10)),
    UNIQUE `email` (`student_email`(30))
) 
ENGINE = InnoDB 
COMMENT = 'table -- >student information';


-- parent/gaurdian table
CREATE TABLE `website`.`parent` 
(
    `usn` VARCHAR(10) NOT NULL ,
    `parent_email` VARCHAR(30) NOT NULL ,
    `parent_name` VARCHAR(30) NOT NULL ,
    `phone_no` int(10) NOT NULL ,
    PRIMARY KEY (`usn`(10)),
    FOREIGN key(`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE;
    UNIQUE `email` (`parent_email`(30))
) 
ENGINE = InnoDB 
COMMENT = 'table -- >parent information';


-- branch table
CREATE TABLE `website`.`barnch`
(
    `barnch_id` VARCHAR(5) NOT NULL ,
    `branch_name` VARCHAR(5) NOT NULL ,
    `hod` VARCHAR(30) NOT NULL ,
    PRIMARY KEY (`barnch_id`(5))
)
ENGINE = InnoDB
COMMENT = 'table -- >branch information';


--Adding foreign key referrence to student table
ALTER TABLE `student` 
ADD CONSTRAINT `belongs to`
FOREIGN KEY (`branch_name`) REFERENCES `barnch`(`branch_name`)
ON DELETE CASCADE ON UPDATE CASCADE;


-- course table
CREATE TABLE `website`.`course`
(
    `usn` VARCHAR(10) NOT NULL ,
    `course_id` VARCHAR(15) NOT NULL ,
    `branch_id` VARCHAR(5) NOT NULL ,
    `course_name` VARCHAR(50) NOT NULL ,
    `credit` INT(2) NOT NULL ,
    PRIMARY KEY (`usn`(10), `course_id`(15), `branch_id`(5)),
    FOREIGN KEY (`branch_id`) REFERENCES `barnch`(`barnch_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB
COMMENT = 'table -- >course information';


-- result table
CREATE TABLE `website`.`result`
(
    `usn` VARCHAR(10) NOT NULL , 
    `branch_id` VARCHAR(5) NOT NULL , 
    `course_id` VARCHAR(15) NOT NULL , 
    `course_name` VARCHAR(50) NOT NULL , 
    `cie` INT(2) NOT NULL , 
    `see` INT(2) NOT NULL , 
    `total` INT(3) NOT NULL , 
    `grade` CHAR(1) NOT NULL , 
    PRIMARY KEY (`usn`(10), `branch_id`(5)),
    FOREIGN KEY (`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE, 
    FOREIGN KEY (`branch_id`) REFERENCES `barnch`(`barnch_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    -- FOREIGN KEY (`course_name`) REFERENCES `course`(`course_name`) 
    -- ON DELETE CASCADE ON UPDATE CASCADE 
) 
ENGINE = InnoDB 
COMMENT = 'table --> results table';


-- appication table
CREATE TABLE `website`.`aplication` 
(
    `usn` VARCHAR(10) NOT NULL ,
    `student_name` VARCHAR(30) NOT NULL ,
    `type` VARCHAR(5) NOT NULL ,
    `course_name` VARCHAR(50) NOT NULL ,
    `course_id` VARCHAR(15) NOT NULL ,
    `credit` INT(2) NOT NULL ,
    PRIMARY KEY (`usn`(10),`student_name`(30),`type`(5)),
    FOREIGN key(`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB 
COMMENT = 'table -- >application table';