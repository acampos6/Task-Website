CREATE TABLE taskTable (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    task_Name VARCHAR(200) NOT NULL,
    completedBy DATE,
    checkBox BOOLEAN,
    bullets BOOLEAN,
    description VARCHAR(1000)
    );

INSERT INTO taskTable ( username, task_Name, completedBy, checkBox, bullets, description)
       VALUES ('test','Complete Task Table', '2021-12-31','1','0', 
               'I need to finish this before next week!');