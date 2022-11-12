CREATE TABLE `portpos-payment`.`customer`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` CHAR(100) NOT NULL,
    `email` CHAR(100) NOT NULL,
    `phone` CHAR(20) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`)
);

CREATE TABLE `portpos-payment`.`customer_address`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `customer_id` INT NOT NULL,
    `address_id` INT NOT NULL,
    `is_active` TINYINT(1) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    INDEX(`customer_id`),
    INDEX(`address_id`)
);

CREATE TABLE `portpos-payment`.`address`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `street` CHAR(100) NOT NULL,
    `city` CHAR(100) NOT NULL,
    `state` CHAR(100) NOT NULL,
    `zipcode` CHAR(100) NOT NULL,
    `country` CHAR(100) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`)
);

CREATE TABLE `portpos-payment`.`product`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `name` CHAR(255) NOT NULL,
    `details` VARCHAR(2000) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`)
);

CREATE TABLE `portpos-payment`.`order`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `customer_id` INT NOT NULL,
    `product_id` INT NOT NULL,
    `amount` INT NOT NULL,
    `paryment_url` CHAR(255) NOT NULL,
    `status` CHAR(20) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    INDEX(`customer_id`),
    INDEX(`product_id`)
);

CREATE TABLE `portpos-payment`.`order_status`(
    `id` INT NOT NULL AUTO_INCREMENT,
    `order_id` INT NOT NULL,
    `status` CHAR(20) NOT NULL,
    `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `updated_at` DATETIME ON UPDATE CURRENT_TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY(`id`),
    INDEX(`order_id`)
);

ALTER TABLE `customer_address` ADD FOREIGN KEY (`customer_id`) REFERENCES `customer`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `customer_address` ADD FOREIGN KEY (`address_id`) REFERENCES `address`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `order` ADD FOREIGN KEY (`customer_id`) REFERENCES `customer`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `order` ADD FOREIGN KEY (`product_id`) REFERENCES `product`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE `order_status` ADD FOREIGN KEY (`order_id`) REFERENCES `order`(`id`) ON DELETE CASCADE ON UPDATE CASCADE;