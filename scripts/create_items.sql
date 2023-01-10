CREATE TABLE items (
  id INTEGER PRIMARY KEY AUTOINCREMENT UNIQUE,
  name TEXT NOT NULL UNIQUE,
  description TEXT DEFAULT NULL,
  price INTEGER DEFAULT 0,
  qty INTEGER DEFAULT 1,
  brand_id INTEGER DEFAULT 0,
  category_id INTEGER DEFAULT 0 NOT NULL,
  batch INTEGER DEFAULT 0 NOT NULL,
  tag INTEGER DEFAULT 0 NOT NULL,
  added TEXT datetime current_timestamp,
  updated TEXT datetime current_timestamp
);