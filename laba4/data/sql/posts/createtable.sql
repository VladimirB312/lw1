CREATE TABLE post
(
	`post_id` VARCHAR(36) DEFAULT (UUID()) NOT NULL PRIMARY KEY,
	`title` VARCHAR(255) NOT NULL,
	`subtitle` VARCHAR(255) NOT NULL,
	`content` TEXT NOT NULL,
	`author` VARCHAR(255) NOT NULL,
	`author_url` VARCHAR(255) NOT NULL,
	`author_alt` VARCHAR(255) NOT NULL, 
	`publish_date` TIMESTAMP NOT NULL,
	`image_url` VARCHAR(255) NOT NULL,
	`image_alt` VARCHAR(255) NOT NULL,
	`sticker` VARCHAR(255),
	`featured` TINYINT(1) DEFAULT 0 NOT NULL
) ENGINE = InnoDB
CHARACTER SET = utf8mb4
COLLATE utf8mb4_unicode_ci
;