CREATE TABLE md_apartamento_translation (id INT, titulo VARCHAR(200) NOT NULL, copete TEXT, descripcion TEXT NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE md_apartamento (id INT AUTO_INCREMENT, md_locacion_id INT NOT NULL, activo TINYINT(1) DEFAULT '0', tipo ENUM('comission', 'fullservice') NOT NULL, md_user_id INT, md_currency_id INT DEFAULT 1 NOT NULL, precio_alta FLOAT(18, 2) NOT NULL, precio_media FLOAT(18, 2) NOT NULL, precio_baja FLOAT(18, 2) NOT NULL, cantidad_personas INT DEFAULT 2 NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_locacion_id_idx (md_locacion_id), INDEX md_user_id_idx (md_user_id), INDEX md_currency_id_idx (md_currency_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_apartamento_search (id INT, md_locacion_id INT NOT NULL, precio_alta FLOAT(18, 2) NOT NULL, precio_baja FLOAT(18, 2) NOT NULL, cantidad_personas INT NOT NULL, tipo_propiedad ENUM('apartment', 'house', 'bedNbreakfast', 'cabin', 'villa', 'castle', 'dorm', 'treehouse', 'boat', 'automobile', 'igloo'), metraje INT, cuartos INT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_apartamento_md_comodidad (md_apartamento_id INT, md_comodidad_id INT, PRIMARY KEY(md_apartamento_id, md_comodidad_id)) ENGINE = INNODB;
CREATE TABLE md_blocked_users (md_user_id INT, reason VARCHAR(128), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(md_user_id)) ENGINE = INNODB;
CREATE TABLE md_comodidad_translation (id INT, nombre VARCHAR(100) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE md_comodidad (id INT AUTO_INCREMENT, imagen VARCHAR(100) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_content (id INT AUTO_INCREMENT, md_user_id INT NOT NULL, object_class VARCHAR(128) NOT NULL, object_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_user_id_idx (md_user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_content_relation (md_content_id_first INT, md_content_id_second INT, object_class_name VARCHAR(128) NOT NULL, profile_name VARCHAR(128), PRIMARY KEY(md_content_id_first, md_content_id_second)) ENGINE = INNODB;
CREATE TABLE md_currency_translation (id INT, name VARCHAR(255) NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE md_currency (id INT AUTO_INCREMENT, code VARCHAR(16) UNIQUE, symbol VARCHAR(100) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_currency_convertion (currency_from INT, currency_to INT, ratio DOUBLE(18, 8) NOT NULL, PRIMARY KEY(currency_from, currency_to)) ENGINE = INNODB;
CREATE TABLE md_detalle (id INT AUTO_INCREMENT, md_apartamento_id INT, tipo_propiedad ENUM('apartment', 'house', 'bedNbreakfast', 'cabin', 'villa', 'castle', 'dorm', 'treehouse', 'boat', 'automobile', 'igloo'), cuartos INT, banios INT, costo_extra FLOAT(18, 2) DEFAULT 0, minimo_dias INT DEFAULT 1, barrio VARCHAR(100), metraje VARCHAR(100), PRIMARY KEY(id, md_apartamento_id)) ENGINE = INNODB;
CREATE TABLE md_disponibilidad (id INT AUTO_INCREMENT, md_apartamento_id INT NOT NULL, fecha_desde DATETIME NOT NULL, fecha_hasta DATETIME NOT NULL, INDEX md_apartamento_id_idx (md_apartamento_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_generic_payment (id INT AUTO_INCREMENT, object_class VARCHAR(128) NOT NULL, object_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_generic_payment_abitab (id INT AUTO_INCREMENT, note VARCHAR(128), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_generic_payment_giro_bancario (id INT AUTO_INCREMENT, note VARCHAR(128), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_generic_payment_other (id INT AUTO_INCREMENT, note VARCHAR(128) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_generic_payment_paypal (id INT AUTO_INCREMENT, token VARCHAR(128), payerid VARCHAR(128), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_generic_payment_western (id INT AUTO_INCREMENT, note VARCHAR(128), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_generic_sale (id INT AUTO_INCREMENT, md_user_id INT NOT NULL, price FLOAT(6, 2) NOT NULL, status INT DEFAULT '0' NOT NULL, md_payment_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_user_id_idx (md_user_id), INDEX md_payment_id_idx (md_payment_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_generic_sale_item (id INT AUTO_INCREMENT, object_id INT NOT NULL, object_class VARCHAR(128) NOT NULL, md_generic_sale_id INT NOT NULL, INDEX md_generic_sale_id_idx (md_generic_sale_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_google_map (id INT AUTO_INCREMENT, object_class_name VARCHAR(128) NOT NULL, object_id INT NOT NULL, latitude DECIMAL(18, 4) DEFAULT 0 NOT NULL, longitude DECIMAL(18, 4) DEFAULT 0 NOT NULL, UNIQUE INDEX object_identifier_index_idx (object_class_name, object_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_locacion_translation (id INT, nombre VARCHAR(100) NOT NULL, descripcion TEXT NOT NULL, lang CHAR(2), PRIMARY KEY(id, lang)) ENGINE = INNODB;
CREATE TABLE md_locacion (id INT AUTO_INCREMENT, country VARCHAR(2) NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_locacion_temporada (id INT AUTO_INCREMENT, md_locacion_id INT NOT NULL, date_from DATE NOT NULL, date_to DATE NOT NULL, tipo ENUM('A', 'M') DEFAULT 'A' NOT NULL, INDEX md_locacion_id_idx (md_locacion_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media (id INT AUTO_INCREMENT, object_class_name VARCHAR(128) NOT NULL, object_id INT NOT NULL, UNIQUE INDEX md_media_index_idx (object_class_name, object_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_album (id INT AUTO_INCREMENT, md_media_id INT, title VARCHAR(64) NOT NULL, description VARCHAR(255), type ENUM('Image', 'Video', 'File', 'Mixed') DEFAULT 'Mixed', deleteallowed bool NOT NULL, md_media_content_id INT, counter_content BIGINT DEFAULT 0, UNIQUE INDEX md_media_album_title_index_idx (md_media_id, title), INDEX md_media_content_id_idx (md_media_content_id), INDEX md_media_id_idx (md_media_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_album_content (md_media_album_id INT, md_media_content_id INT, object_class_name VARCHAR(128) NOT NULL, priority BIGINT NOT NULL, INDEX md_media_album_content_index_idx (priority ASC), PRIMARY KEY(md_media_album_id, md_media_content_id)) ENGINE = INNODB;
CREATE TABLE md_media_content (id INT AUTO_INCREMENT, object_class_name VARCHAR(128) NOT NULL, object_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, UNIQUE INDEX md_media_content_index_idx (object_class_name, object_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_file (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, filename VARCHAR(64) NOT NULL, filetype VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_image (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, filename VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_issuu_video (id INT AUTO_INCREMENT, documentid TEXT NOT NULL, embed_code text NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_video (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, filename VARCHAR(64) NOT NULL, duration VARCHAR(64) NOT NULL, type VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), avatar VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_vimeo_video (id INT AUTO_INCREMENT, vimeo_url VARCHAR(64) NOT NULL, title VARCHAR(255) NOT NULL, src VARCHAR(255) NOT NULL, duration VARCHAR(64) NOT NULL, description TEXT, avatar VARCHAR(255), avatar_width TINYINT, avatar_height TINYINT, author_name VARCHAR(255), author_url VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_media_youtube_video (id INT AUTO_INCREMENT, name VARCHAR(64) NOT NULL, src VARCHAR(255) NOT NULL, code VARCHAR(64) NOT NULL, duration VARCHAR(64) NOT NULL, description VARCHAR(255), path VARCHAR(255), avatar VARCHAR(255), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_ocupacion (id INT AUTO_INCREMENT, md_apartamento_id INT NOT NULL, fecha DATETIME NOT NULL, INDEX md_apartamento_id_idx (md_apartamento_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_passport (id INT AUTO_INCREMENT, md_user_id INT NOT NULL, username VARCHAR(128) NOT NULL, password VARCHAR(128) NOT NULL, account_active TINYINT DEFAULT '0' NOT NULL, account_blocked TINYINT DEFAULT '0' NOT NULL, last_login DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_user_id_idx (md_user_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_passport_remember_key (id INT AUTO_INCREMENT, md_passport_id INT, remember_key VARCHAR(32), ip_address VARCHAR(50), created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_passport_id_idx (md_passport_id), PRIMARY KEY(id, ip_address)) ENGINE = INNODB;
CREATE TABLE md_reserva (id INT AUTO_INCREMENT, md_user_id INT NOT NULL, md_apartamento_id INT NOT NULL, fecha_desde DATE NOT NULL, fecha_hasta DATE NOT NULL, cantidad_personas INT NOT NULL, md_currency_id INT NOT NULL, total DOUBLE(18, 2) NOT NULL, status ENUM('pending', 'confirm', 'efective', 'cancel') DEFAULT 'pending' NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX md_user_id_idx (md_user_id), INDEX md_apartamento_id_idx (md_apartamento_id), INDEX md_currency_id_idx (md_currency_id), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_user (id INT AUTO_INCREMENT, email VARCHAR(128) NOT NULL UNIQUE, super_admin TINYINT DEFAULT '0' NOT NULL, culture VARCHAR(2), deleted_at DATETIME, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_user_profile (id INT AUTO_INCREMENT, name VARCHAR(128), last_name VARCHAR(128), city VARCHAR(128), country_code VARCHAR(2) DEFAULT 'UY', PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE md_user_search (id BIGINT AUTO_INCREMENT, md_user_id INT NOT NULL, email VARCHAR(128), username VARCHAR(128), name VARCHAR(128), last_name VARCHAR(128), country_code VARCHAR(2), avatar_src TEXT, active TINYINT(1) DEFAULT '0', blocked TINYINT(1) DEFAULT '0', admin TINYINT(1) DEFAULT '0', show_email TINYINT(1) DEFAULT '0', created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX username_index_idx (username), INDEX email_index_idx (email), INDEX last_name_index_idx (last_name), INDEX name_index_idx (name), INDEX md_user_id_idx (md_user_id), PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE md_apartamento_translation ADD CONSTRAINT md_apartamento_translation_id_md_apartamento_id FOREIGN KEY (id) REFERENCES md_apartamento(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE md_apartamento ADD CONSTRAINT md_apartamento_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id) ON DELETE CASCADE;
ALTER TABLE md_apartamento ADD CONSTRAINT md_apartamento_md_locacion_id_md_locacion_id FOREIGN KEY (md_locacion_id) REFERENCES md_locacion(id) ON DELETE CASCADE;
ALTER TABLE md_apartamento ADD CONSTRAINT md_apartamento_md_currency_id_md_currency_id FOREIGN KEY (md_currency_id) REFERENCES md_currency(id) ON DELETE CASCADE;
ALTER TABLE md_apartamento_md_comodidad ADD CONSTRAINT md_apartamento_md_comodidad_md_comodidad_id_md_comodidad_id FOREIGN KEY (md_comodidad_id) REFERENCES md_comodidad(id) ON DELETE CASCADE;
ALTER TABLE md_apartamento_md_comodidad ADD CONSTRAINT md_apartamento_md_comodidad_md_apartamento_id_md_apartamento_id FOREIGN KEY (md_apartamento_id) REFERENCES md_apartamento(id) ON DELETE CASCADE;
ALTER TABLE md_comodidad_translation ADD CONSTRAINT md_comodidad_translation_id_md_comodidad_id FOREIGN KEY (id) REFERENCES md_comodidad(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE md_content ADD CONSTRAINT md_content_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id) ON DELETE CASCADE;
ALTER TABLE md_content_relation ADD CONSTRAINT md_content_relation_md_content_id_second_md_content_id FOREIGN KEY (md_content_id_second) REFERENCES md_content(id);
ALTER TABLE md_content_relation ADD CONSTRAINT md_content_relation_md_content_id_first_md_content_id FOREIGN KEY (md_content_id_first) REFERENCES md_content(id);
ALTER TABLE md_currency_translation ADD CONSTRAINT md_currency_translation_id_md_currency_id FOREIGN KEY (id) REFERENCES md_currency(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE md_currency_convertion ADD CONSTRAINT md_currency_convertion_currency_to_md_currency_id FOREIGN KEY (currency_to) REFERENCES md_currency(id);
ALTER TABLE md_currency_convertion ADD CONSTRAINT md_currency_convertion_currency_from_md_currency_id FOREIGN KEY (currency_from) REFERENCES md_currency(id);
ALTER TABLE md_detalle ADD CONSTRAINT md_detalle_md_apartamento_id_md_apartamento_id FOREIGN KEY (md_apartamento_id) REFERENCES md_apartamento(id) ON DELETE CASCADE;
ALTER TABLE md_disponibilidad ADD CONSTRAINT md_disponibilidad_md_apartamento_id_md_apartamento_id FOREIGN KEY (md_apartamento_id) REFERENCES md_apartamento(id) ON DELETE CASCADE;
ALTER TABLE md_generic_sale ADD CONSTRAINT md_generic_sale_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id) ON DELETE CASCADE;
ALTER TABLE md_generic_sale ADD CONSTRAINT md_generic_sale_md_payment_id_md_generic_payment_id FOREIGN KEY (md_payment_id) REFERENCES md_generic_payment(id) ON DELETE CASCADE;
ALTER TABLE md_generic_sale_item ADD CONSTRAINT md_generic_sale_item_md_generic_sale_id_md_generic_sale_id FOREIGN KEY (md_generic_sale_id) REFERENCES md_generic_sale(id) ON DELETE CASCADE;
ALTER TABLE md_locacion_translation ADD CONSTRAINT md_locacion_translation_id_md_locacion_id FOREIGN KEY (id) REFERENCES md_locacion(id) ON UPDATE CASCADE ON DELETE CASCADE;
ALTER TABLE md_locacion_temporada ADD CONSTRAINT md_locacion_temporada_md_locacion_id_md_locacion_id FOREIGN KEY (md_locacion_id) REFERENCES md_locacion(id) ON DELETE CASCADE;
ALTER TABLE md_media_album ADD CONSTRAINT md_media_album_md_media_id_md_media_id FOREIGN KEY (md_media_id) REFERENCES md_media(id);
ALTER TABLE md_media_album ADD CONSTRAINT md_media_album_md_media_content_id_md_media_content_id FOREIGN KEY (md_media_content_id) REFERENCES md_media_content(id);
ALTER TABLE md_media_album_content ADD CONSTRAINT md_media_album_content_md_media_content_id_md_media_content_id FOREIGN KEY (md_media_content_id) REFERENCES md_media_content(id);
ALTER TABLE md_media_album_content ADD CONSTRAINT md_media_album_content_md_media_album_id_md_media_album_id FOREIGN KEY (md_media_album_id) REFERENCES md_media_album(id);
ALTER TABLE md_ocupacion ADD CONSTRAINT md_ocupacion_md_apartamento_id_md_apartamento_id FOREIGN KEY (md_apartamento_id) REFERENCES md_apartamento(id) ON DELETE CASCADE;
ALTER TABLE md_passport ADD CONSTRAINT md_passport_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id);
ALTER TABLE md_passport_remember_key ADD CONSTRAINT md_passport_remember_key_md_passport_id_md_passport_id FOREIGN KEY (md_passport_id) REFERENCES md_passport(id) ON DELETE CASCADE;
ALTER TABLE md_reserva ADD CONSTRAINT md_reserva_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id) ON DELETE CASCADE;
ALTER TABLE md_reserva ADD CONSTRAINT md_reserva_md_currency_id_md_currency_id FOREIGN KEY (md_currency_id) REFERENCES md_currency(id) ON DELETE CASCADE;
ALTER TABLE md_reserva ADD CONSTRAINT md_reserva_md_apartamento_id_md_apartamento_id FOREIGN KEY (md_apartamento_id) REFERENCES md_apartamento(id) ON DELETE CASCADE;
ALTER TABLE md_user_search ADD CONSTRAINT md_user_search_md_user_id_md_user_id FOREIGN KEY (md_user_id) REFERENCES md_user(id) ON DELETE CASCADE;
