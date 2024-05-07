
-- Tạo bảng Customers 
CREATE TABLE Customers (
    customer_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(50),
    last_name VARCHAR(50),
    email VARCHAR(100),
    phone VARCHAR(20)
);


-- Tạo bảng OrderDetails 
CREATE TABLE OrderDetails (
    order_detail_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    quantity INT,
    subtotal DECIMAL(10, 2),
    FOREIGN KEY (order_id) REFERENCES Orders (order_id),
    FOREIGN KEY (product_id) REFERENCES Products (product_id)
);


-- Tạo bảng Orders 
CREATE TABLE Orders (
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    customer_id INT,
    user_id INT,
    order_date DATE,
    total_amount DECIMAL(10, 2),
   product_name VARCHAR(255),
   quantity INT,
   price DECIMAL(10, 2),
   product_id INT AUTO_INCREMENT PRIMARY KEY,
    description TEXT,  
    FOREIGN KEY (customer_id) REFERENCES Customers (customer_id),
    FOREIGN KEY (user_id) REFERENCES Users (user_id)
);


-- Tạo bảng Products 
CREATE TABLE Products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255),
    description TEXT,
    price DECIMAL(10, 2),
    stock_quantity INT
);


-- Tạo bảng Roles 
CREATE TABLE Roles (
    role_id INT AUTO_INCREMENT PRIMARY KEY,
    role_name VARCHAR(50) UNIQUE NOT NULL
);


-- Tạo bảng Users (quản lý tài khoản người dùng)
CREATE TABLE Users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    full_name VARCHAR(100),
    email VARCHAR(100),
    role_id INT,
    FOREIGN KEY (role_id) REFERENCES Roles (role_id)
);
