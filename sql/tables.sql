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
    `usn` VARCHAR(10) NOT NULL ,
    `course_id` VARCHAR(15) NOT NULL ,
    `branch_name` VARCHAR(4) NOT NULL ,
    `course_name` VARCHAR(50) NOT NULL ,
    `credit` INT(2) NOT NULL ,
    PRIMARY KEY (`course_id`(15)),
    FOREIGN KEY (`branch_name`) REFERENCES `branch`(`branch_name`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`usn`) REFERENCES `student`(`usn`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) 
ENGINE = InnoDB;


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
    ON DELETE CASCADE ON UPDATE CASCADE,
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