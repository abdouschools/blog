CREATE TABLE post (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT?
    name VARCHAR(255) NOT NULL,
    slug VARCHAR(255) NOT NULL,
    content TEXT(65000) NOT NULL,
    created_at DATETIME NOT NULL?
    PRIMARY KEY (id)
)
CREATE TABLE category(
    id INT UNSIGNED AUTO_INCREMENT ,
    name VARCHAR(255) NOT NULL,
     slug VARCHAR(255) NOT NULL,
     PRIMARY KEY (id)

)
CREATE TABLE post-category(
    post_id INT UNSIGNED ,
    category_id INT UNSIGNED,
    CONSTRAINT fk_post
    FOREIGN KEY (post_id)
    REFERENCES post(id)
    ON DELETE CASCADE
    ON UPDATE RESTRICT 
    category_id INT UNSIGNED,
        CONSTRAINT fk_category
        FOREIGN KEY (category_id)
        REFERENCES category(id)
        ON DELETE CASCADE
        ON UPDATE RESTRICT

)
CREATE TABLE user (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
    PRIMARY KEY(id)
) 