CREATE TABLE settings (
  key_field TEXT NOT NULL UNIQUE,
  key_name TEXT NOT NULL UNIQUE,
  key_value TEXT NOT NULL
);