DROP DATABASE IF EXISTS PetShop;
CREATE DATABASE PetShop;
USE PetShop;

-- # Role
CREATE TABLE Role
(
    role_id      INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    description  VARCHAR(30)
);

-- # Address
CREATE TABLE Address
(
    address_id   INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    street       INT                            NOT NULL,
    postal_code  VARCHAR(10)                    NOT NULL,
    city         VARCHAR(50)                    NOT NULL,
    number       VARCHAR(10),
    province     VARCHAR(20)                    NOT NULL
);

-- # User
CREATE TABLE `User`
(
    user_id          INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    last_name        VARCHAR(50)                   NOT NULL,
    first_name       VARCHAR(50),
    email            VARCHAR(100)                  NOT NULL,
    password         VARCHAR(255)                  NOT NULL,
    date_of_birth    DATE,
    phone_number     VARCHAR(50)                   NOT NULL,
    image_path       VARCHAR(255),
    role_id          INT
);

-- # UserAddress
CREATE TABLE UserAddress
(
    user_id     INT,
    address_id  INT
);

-- # Product
CREATE TABLE Product
(
    product_id          INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    product_name        VARCHAR(255)                  NOT NULL,
    description         TEXT,
    short_description   VARCHAR(255),
    quantity            INT                           NOT NULL,
    price               VARCHAR(7)                    NOT NULL
);

-- # Order
CREATE TABLE `Order`
(
    order_id       INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    quantity       INT                           NOT NULL,
    price          VARCHAR(10)                   NOT NULL,
    creation_date  DATE                          NOT NULL,
    status         VARCHAR(50)                   NOT NULL,
    user_id        INT
);

-- # ProductOrder
CREATE TABLE ProductOrder
(
    order_id   INT,
    product_id INT
);

-- # Modifying User to reference Role
ALTER TABLE `User`
    ADD CONSTRAINT fk_user_role
        FOREIGN KEY (role_id) REFERENCES Role (role_id);

-- # Modifying UserAddress to reference User and Address
ALTER TABLE UserAddress
    ADD CONSTRAINT fk_user_address
        FOREIGN KEY (user_id) REFERENCES User (user_id),
    ADD CONSTRAINT fk_address_user
        FOREIGN KEY (address_id) REFERENCES Address (address_id);

-- # Modifying ProductOrder to reference Order and Product
ALTER TABLE ProductOrder
    ADD CONSTRAINT fk_product_order
        FOREIGN KEY (order_id) REFERENCES `Order` (order_id),
    ADD CONSTRAINT fk_order_product
        FOREIGN KEY (product_id) REFERENCES Product (product_id);

-- Insert roles
INSERT INTO Role (description) VALUES ('User'), ('Admin');

-- Default User and Default Admin
INSERT INTO `User` (last_name, first_name, email, password, date_of_birth, phone_number, image_path, role_id) 
VALUES 
('Doe', 'John', 'john.doe@example.com', 'contraseña_hasheada', '1990-01-01', '1234567890', '', 1),
('Smith', 'Jane', 'jane.smith@example.com', 'contraseña_hasheada', '1985-05-05', '0987654321', '', 2);