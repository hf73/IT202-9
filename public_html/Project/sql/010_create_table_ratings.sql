CREATE TABLE IF NOT EXISTS Ratings(

    id int AUTO_INCREMENT PRIMARY KEY,
    product_id int,
    user_id int,
    ratings int not null,
    comment text,
    created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,

    

    FOREIGN KEY (product_id) REFERENCES Products(id),
    FOREIGN KEY (user_id) REFERENCES Users(id),

    CHECK (ratings BETWEEN 1  AND 5)
)