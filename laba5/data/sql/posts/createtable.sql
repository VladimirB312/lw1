CREATE TABLE post
(
	`post_id` BINARY(16) DEFAULT (UUID_TO_BIN(UUID())) NOT NULL PRIMARY KEY,
	`title` VARCHAR(255) NOT NULL,
	`subtitle` VARCHAR(255) NOT NULL,
	`content` TEXT NOT NULL,
	`author` VARCHAR(255) NOT NULL,
	`author_url` VARCHAR(255) NOT NULL,
	`publish_date` TIMESTAMP,
	`image_url` VARCHAR(255) NOT NULL,
	`featured` TINYINT(1) DEFAULT 0
) ENGINE = InnoDB
CHARACTER SET = utf8mb4
COLLATE utf8mb4_unicode_ci
;