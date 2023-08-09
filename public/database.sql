-- Create the "user_account" table
CREATE TABLE user_account (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(32) NOT NULL
);

-- Insert the demo user
INSERT INTO user_account (username, password)
VALUES ('delirehberi', MD5('123123'));
