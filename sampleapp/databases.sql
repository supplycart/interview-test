CREATE DATABASE supplycart;

-- \connect supplycart;

CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(100) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL,
    pw VARCHAR(100) NOT NULL
);

CREATE TABLE products (
    id SERIAL PRIMARY KEY,
    product_name VARCHAR(100) NOT NULL,
    product_description VARCHAR(100) NOT NULL,
    price DECIMAL(18,2) NOT NULL
);

INSERT INTO products (product_name,product_description,price) VALUES ('Chair', 'A wooden chair', 5);
INSERT INTO products (product_name,product_description,price) VALUES ('Table', 'A wooden table', 10);
INSERT INTO products (product_name,product_description,price) VALUES ('Ladder', 'A metal ladder', 7);


CREATE TABLE orders (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL,
    total_cost DECIMAL(18,2) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE orderitems (
    id SERIAL PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    cost DECIMAL(18,2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE
);



