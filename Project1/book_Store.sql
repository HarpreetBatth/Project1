CREATE DATABASE project_1;

CREATE TABLE BookInventory (
  Book_Id           INT             PRIMARY KEY   AUTO_INCREMENT,
  Book_Name         VARCHAR(50)     NOT NULL,
  Author            VARCHAR(50)     NOT NULL,
  Price             DECIMAL(15, 2)  NOT NULL,
  quantity          INT             NOT NULL
);

CREATE TABLE BookInventoryOrder (
  BookOrder_Id      INT           PRIMARY KEY   AUTO_INCREMENT,
  First_Name        VARCHAR(50)   NOT NULL,
  Last_Name         VARCHAR(50)   NOT NULL,
  Payment_Option    VARCHAR(50)   NOT NULL,
  Book_Id           INT,
CONSTRAINT FK_Orders FOREIGN KEY (Book_Id)
    REFERENCES BookInventory(Book_Id)
);
  
 
    
  
    
    
    