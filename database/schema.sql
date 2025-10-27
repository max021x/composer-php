CREATE Table IF NOT EXISTS users (
    id INTERSECT PRIMARY KEY AUTOINCREMENT , 
    name TEXT NOT NULL , 
    email TEXT UNIQUE NOT NULL , 
    password TEXT NOT NULL , 
    roll TEXT NOT NULL DEFAULT 'users' , 
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP 
) ; 


CREATE TABLE IF NOT EXISTS posts (
    id INTEGER PRIMARY KEY AUTOINCREMENT , 
    title TEXT NOT NULL , 
    content TEXT NOT NULL , 
    views INTEGER DEFAULT 0,
    user_id INTEGER NOT NULL ,  
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP 
    Foreign Key (user_id) REFERENCES users (id)
) ; 


CREATE TABLE IF NOT EXISTS comments (
    id INTEGER PRIMARY KEY AUTOINCREMENT , 
    content TEXT NOT NULL , 
    user_id INTEGER NOT NULL , 
    post_id INTEGER NOT NULL , 
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP , 
    Foreign Key (user_id) REFERENCES users (id)
    Foreign Key (post_id) REFERENCES posts (id)

); 

