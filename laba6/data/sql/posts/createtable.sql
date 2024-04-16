CREATE TABLE post (
	`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`post_id` VARCHAR(36) NOT NULL,
	`title` VARCHAR(255) NOT NULL,
	`subtitle` VARCHAR(255) NOT NULL,
	`content` TEXT NOT NULL,
	`author_name` VARCHAR(255) NOT NULL,
	`author_photo_url` VARCHAR(255) NOT NULL,
	`author_photo_alt` VARCHAR(255) NOT NULL,
	`publish_date` TIMESTAMP NOT NULL,
	`image_url` VARCHAR(255) NOT NULL,
	`image_alt` VARCHAR(255) NOT NULL,
	`sticker` VARCHAR(255) NOT NULL,
	`featured` TINYINT(1) NOT NULL,
	`recent` TINYINT(1) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE utf8mb4_unicode_ci;