CREATE DATABASE ecv_exam;

USE ecv_exam;

CREATE TABLE login (
  id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(255) NOT NULL UNIQUE,
  password VARCHAR(100) NOT NULL
);

INSERT INTO `login` (`email`, `password`)
VALUES 
  ('zfnioze@gmail.com', 'zekflnoezf'),
  ('maximebg@mail.fr', '12345');

CREATE TABLE product (
  id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  image VARCHAR(255) NOT NULL,
  name VARCHAR(100) NOT NULL,
  description VARCHAR(256) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  INDEX(id)
);

INSERT INTO product (image, name, description, price)
VALUES 
  ('https://jardinage.lemonde.fr/images/dossiers/2017-11/chihuahua-113418.jpg', 'Chiwawa', 'Chien de petite taille avec une personnalité vive et alerte.', 2000.00),
  ('https://resize.prod.docfr.doc-media.fr/s/1200/ext/eac4ff34/content/2022/7/4/mini-chien-40-petites-boules-de-poils-a-croquer-187ab7e7363e7283.jpeg', 'Boule de Poil', 'Chien avec une fourrure abondante et douce, nécessitant un entretien régulier.', 1000.00);


CREATE TABLE `order` (
  id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
  user_id INTEGER NOT NULL,
  product_id INTEGER NOT NULL,
  image VARCHAR(255) NOT NULL,
  name VARCHAR(100) NOT NULL,
  quantity INTEGER NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES login(id),
  FOREIGN KEY (product_id) REFERENCES product(id)
);
