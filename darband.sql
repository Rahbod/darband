/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50719
Source Host           : localhost:3306
Source Database       : darband

Target Server Type    : MYSQL
Target Server Version : 50719
File Encoding         : 65001

Date: 2018-12-17 21:22:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for ym_admins
-- ----------------------------
DROP TABLE IF EXISTS `ym_admins`;
CREATE TABLE `ym_admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'پست الکترونیک',
  `role_id` int(11) unsigned NOT NULL COMMENT 'نقش',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`) USING BTREE,
  CONSTRAINT `ym_admins_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `ym_admin_roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ym_admins
-- ----------------------------
INSERT INTO `ym_admins` VALUES ('1', 'rahbod', '$2a$12$ZIHkxgnyTJlaDdBrxoU.hO6HWjG4hCo5oMzhaut1Hxy5NcGHYy7Uu', 'gharagozlu.masoud@gmial.com', '1');
INSERT INTO `ym_admins` VALUES ('2', 'admin', '$2a$12$ws5oVKGMS0LONQfyOD4tvO2gzG.FfA8yRU14ZEHv/xR9rQmSIL1vq', 'info@darband.com', '2');

-- ----------------------------
-- Table structure for ym_admin_roles
-- ----------------------------
DROP TABLE IF EXISTS `ym_admin_roles`;
CREATE TABLE `ym_admin_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL COMMENT 'عنوان نقش',
  `role` varchar(255) NOT NULL COMMENT 'نقش',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ym_admin_roles
-- ----------------------------
INSERT INTO `ym_admin_roles` VALUES ('1', 'Super Admin', 'superAdmin');
INSERT INTO `ym_admin_roles` VALUES ('2', 'مدیریت', 'admin');

-- ----------------------------
-- Table structure for ym_admin_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `ym_admin_role_permissions`;
CREATE TABLE `ym_admin_role_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `role_id` int(10) unsigned DEFAULT NULL COMMENT 'نقش',
  `module_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ماژول',
  `controller_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'کنترلر',
  `actions` text CHARACTER SET utf8 COMMENT 'اکشن ها',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `ym_admin_role_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `ym_admin_roles` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=1098 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ym_admin_role_permissions
-- ----------------------------
INSERT INTO `ym_admin_role_permissions` VALUES ('1081', '2', 'base', 'TagsController', 'index,create,update,admin,delete,list');
INSERT INTO `ym_admin_role_permissions` VALUES ('1082', '2', 'admins', 'AdminsDashboardController', 'index');
INSERT INTO `ym_admin_role_permissions` VALUES ('1083', '2', 'admins', 'AdminsManageController', 'index,views,create,update,admin,sessions,removeSession,delete,changePassword');
INSERT INTO `ym_admin_role_permissions` VALUES ('1084', '2', 'admins', 'AdminsRolesController', 'create,update,admin,delete');
INSERT INTO `ym_admin_role_permissions` VALUES ('1085', '2', 'pages', 'PagesManageController', 'index,create,update,admin,delete');
INSERT INTO `ym_admin_role_permissions` VALUES ('1086', '2', 'pages', 'PagesCategoriesController', 'index,view,create,update,admin,delete');
INSERT INTO `ym_admin_role_permissions` VALUES ('1087', '2', 'setting', 'SettingManageController', 'changeSetting,socialLinks,menu');
INSERT INTO `ym_admin_role_permissions` VALUES ('1088', '2', 'users', 'UsersManageController', 'index,view,create,update,admin,delete,userTransactions,transactions,dealerships,createDealership,updateDealership,upload,deleteUpload,dealershipRequests,dealershipRequest,deleteDealershipRequest');
INSERT INTO `ym_admin_role_permissions` VALUES ('1089', '2', 'users', 'UsersRolesController', 'create,update,admin,delete');
INSERT INTO `ym_admin_role_permissions` VALUES ('1090', '2', 'contact', 'ContactDepartmentController', 'index,create,update,admin,delete,deleteSelected');
INSERT INTO `ym_admin_role_permissions` VALUES ('1091', '2', 'contact', 'ContactMessagesController', 'index,create,update,admin,delete,deleteSelected,view');
INSERT INTO `ym_admin_role_permissions` VALUES ('1092', '2', 'contact', 'ContactReceiversController', 'index,create,update,admin,delete');
INSERT INTO `ym_admin_role_permissions` VALUES ('1093', '2', 'contact', 'ContactRepliesController', 'index,create,update,admin,delete,deleteSelected');
INSERT INTO `ym_admin_role_permissions` VALUES ('1094', '2', 'map', 'MapManageController', 'create,update');
INSERT INTO `ym_admin_role_permissions` VALUES ('1095', '2', 'products', 'ProductsCategoriesController', 'create,update,admin,delete');
INSERT INTO `ym_admin_role_permissions` VALUES ('1096', '2', 'products', 'ProductsManageController', 'create,update,admin,more,delete,upload,deleteUpload,uploadFull,deleteUploadFull');
INSERT INTO `ym_admin_role_permissions` VALUES ('1097', '2', 'slideshow', 'SlideshowManageController', 'create,update,admin,delete,upload,deleteUpload');

-- ----------------------------
-- Table structure for ym_contact_department
-- ----------------------------
DROP TABLE IF EXISTS `ym_contact_department`;
CREATE TABLE `ym_contact_department` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci NOT NULL COMMENT 'عنوان',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ym_contact_department
-- ----------------------------
INSERT INTO `ym_contact_department` VALUES ('5', 'management');

-- ----------------------------
-- Table structure for ym_contact_messages
-- ----------------------------
DROP TABLE IF EXISTS `ym_contact_messages`;
CREATE TABLE `ym_contact_messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام و نام خانوادگی',
  `email` varchar(255) NOT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `body` varchar(1000) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `department_id` int(10) unsigned DEFAULT NULL,
  `seen` tinyint(1) unsigned DEFAULT '0',
  `reply` tinyint(1) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `ym_contact_messages_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `ym_contact_department` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ym_contact_messages
-- ----------------------------
INSERT INTO `ym_contact_messages` VALUES ('1', 'Yusef Mobasheri', 'yus@d.d', '09358389265', null, 'Hi,\r\nyour website is perfect!!!\r\nThank you very much.', '1545068354', '5', '0', '0');

-- ----------------------------
-- Table structure for ym_contact_receivers
-- ----------------------------
DROP TABLE IF EXISTS `ym_contact_receivers`;
CREATE TABLE `ym_contact_receivers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL,
  `email` varchar(128) COLLATE utf8_persian_ci DEFAULT NULL,
  `department_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `ym_contact_receivers_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `ym_contact_department` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ym_contact_receivers
-- ----------------------------
INSERT INTO `ym_contact_receivers` VALUES ('2', 'تست', 'info@darband.com', '5');

-- ----------------------------
-- Table structure for ym_counter_save
-- ----------------------------
DROP TABLE IF EXISTS `ym_counter_save`;
CREATE TABLE `ym_counter_save` (
  `save_name` varchar(10) NOT NULL,
  `save_value` int(10) unsigned NOT NULL,
  PRIMARY KEY (`save_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ym_counter_save
-- ----------------------------
INSERT INTO `ym_counter_save` VALUES ('day_time', '2458470');
INSERT INTO `ym_counter_save` VALUES ('counter', '2');
INSERT INTO `ym_counter_save` VALUES ('yesterday', '0');
INSERT INTO `ym_counter_save` VALUES ('max_count', '1');
INSERT INTO `ym_counter_save` VALUES ('max_time', '1544776200');

-- ----------------------------
-- Table structure for ym_counter_users
-- ----------------------------
DROP TABLE IF EXISTS `ym_counter_users`;
CREATE TABLE `ym_counter_users` (
  `user_ip` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `user_time` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_ip`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ym_counter_users
-- ----------------------------
INSERT INTO `ym_counter_users` VALUES ('837ec5754f503cfaaee0929fd48974e7', '1545069114');

-- ----------------------------
-- Table structure for ym_google_maps
-- ----------------------------
DROP TABLE IF EXISTS `ym_google_maps`;
CREATE TABLE `ym_google_maps` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `map_lat` varchar(30) NOT NULL DEFAULT '34.6327505',
  `map_lng` varchar(30) NOT NULL DEFAULT '50.8644157',
  `map_zoom` varchar(5) NOT NULL DEFAULT '10',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ym_google_maps
-- ----------------------------
INSERT INTO `ym_google_maps` VALUES ('1', '', '34.64061525591295', '50.876765132646824', '15');

-- ----------------------------
-- Table structure for ym_pages
-- ----------------------------
DROP TABLE IF EXISTS `ym_pages`;
CREATE TABLE `ym_pages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT 'عنوان',
  `summary` text COMMENT 'متن',
  `category_id` int(11) unsigned DEFAULT NULL,
  `image` varchar(500) DEFAULT NULL,
  `en_title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ym_pages
-- ----------------------------
INSERT INTO `ym_pages` VALUES ('1', 'About us', '<pre>\r\nSince he opened the restaurant 6 years ago, Darband&#39;s authentic and affordable Persian Cuisine has been getting rave reviews from the media and his customers alike.\r\nJust recently, Daily Telegraph&#39;s food critic, Simon Thomsen decribed Darband&#39;s rice as the best he has ever had.\r\n&quot;There are more than 140 different varieties of rice,&quot; said Mr Thomsen, &quot;and Darband Persian wins the prize for the lightest, fluffiest I&#39;ve ever eaten.&quot; Read more.\r\n&ldquo;I had been thinking of opening a restaurant for a long time,&rdquo; says Darband&#39;s proud owner, Mr Hemmati. He is passionate about Iranian cuisine.\r\n\r\nHe says the secret to his success is &ldquo;great service, highest quality and affordable prices.&rdquo;\r\nHis delicious kebabs are as good as the ones in the authentic restaurants in downtown Tehran.\r\nDarband is a great place to take a group of friends and have an unforgettable dinner dinner or a great weekend lunch!</pre>\r\n', '1', null, null);
INSERT INTO `ym_pages` VALUES ('6', 'Meet the Successful Owner', '<pre>\r\n&ldquo;My best memory of the restaurant is the afternoon of 8 July 2005,&rdquo; says Morteza Hemmati. That&rsquo;s the day he opened Darband Persian Restaurant.\r\n</pre>\r\n', '2', '0hI931544898081.png', null);

-- ----------------------------
-- Table structure for ym_page_categories
-- ----------------------------
DROP TABLE IF EXISTS `ym_page_categories`;
CREATE TABLE `ym_page_categories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL COMMENT 'عنوان',
  `slug` varchar(255) DEFAULT NULL COMMENT 'آدرس',
  `multiple` tinyint(1) unsigned DEFAULT '1' COMMENT 'چند صحفه ای',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ym_page_categories
-- ----------------------------
INSERT INTO `ym_page_categories` VALUES ('1', 'صفحات استاتیک', 'base', '1');
INSERT INTO `ym_page_categories` VALUES ('2', 'صفحه اصلی', 'index', '1');

-- ----------------------------
-- Table structure for ym_products
-- ----------------------------
DROP TABLE IF EXISTS `ym_products`;
CREATE TABLE `ym_products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `description` varchar(127) COLLATE utf8_persian_ci DEFAULT NULL,
  `price` decimal(3,0) DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `image_full` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `date` varchar(20) COLLATE utf8_persian_ci DEFAULT NULL,
  `cat_id` int(10) unsigned DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  `order` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cat_id` (`cat_id`),
  KEY `order` (`order`) USING BTREE,
  CONSTRAINT `ym_products_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `ym_product_categories` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ym_products
-- ----------------------------
INSERT INTO `ym_products` VALUES ('4', 'joojeh', 'Chicken marinated in Lemon Juice', '12', 'fiK9W1545059955.png', 'WNeWi1545059968.png', '1545059189', '1', '0', '1');
INSERT INTO `ym_products` VALUES ('5', 'shishlik', 'Lamb Fillet marinated in Onion and finished with Lemon Juice', '14', 'B66RW1545061055.png', null, '1545061057', '1', '0', '3');
INSERT INTO `ym_products` VALUES ('6', 'Koobideh', 'Lamb Mince marinated in Onion', '12', 'vPKGo1545063003.png', null, '1545063004', '1', '0', '2');
INSERT INTO `ym_products` VALUES ('7', 'BARG', 'Lamb Back Strap marinated in Onion', '14', '1GIFd1545063023.png', null, '1545063026', '1', '0', '4');
INSERT INTO `ym_products` VALUES ('8', 'sultani', 'Combination of Barg and Koobideh', '18', 'vXOO11545063046.png', null, '1545063047', '1', '0', '5');
INSERT INTO `ym_products` VALUES ('9', 'momtaz', 'Combination of Barg and Joojeh', '20', 'kHHr11545063067.png', null, '1545063069', '1', '0', '6');
INSERT INTO `ym_products` VALUES ('10', 'darband special', 'Combination of Barg, Joojeh and Koobideh', '23', 'VkBmf1545063091.png', null, '1545063094', '1', '0', '7');
INSERT INTO `ym_products` VALUES ('11', 'baghali polo', 'Lamb Shank with Broad Bean Rice and Dried Dill', '13', 'AsOYc1545063125.png', null, '1545063128', '1', '0', '8');
INSERT INTO `ym_products` VALUES ('12', 'zereshk polo', 'Chicken with Berberis Rice', '13', 'X5X0U1545063148.png', null, '1545063150', '1', '0', '9');
INSERT INTO `ym_products` VALUES ('13', 'ghorme sabzi', 'Lamb Cooked with Red Kidney Beans, Herbs and Dried Limes', '12', 'UTTUv1545063168.png', null, '1545063170', '1', '0', '10');
INSERT INTO `ym_products` VALUES ('14', 'gheimeh', 'Lamb Cooked with Split Peas, Tomatoes and Dried Limes', '11', '8ONU51545063193.png', null, '1545063194', '1', '0', '11');
INSERT INTO `ym_products` VALUES ('17', 'cabbage salad', 'Cabbage, tomato, Cucumber', '2', 'nsKWP1545065020.jpg', 'W4sFN1545065023.jpg', '1545064958', '2', '0', '12');

-- ----------------------------
-- Table structure for ym_product_categories
-- ----------------------------
DROP TABLE IF EXISTS `ym_product_categories`;
CREATE TABLE `ym_product_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_persian_ci DEFAULT NULL,
  `type` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ym_product_categories
-- ----------------------------
INSERT INTO `ym_product_categories` VALUES ('1', 'main course', '0');
INSERT INTO `ym_product_categories` VALUES ('2', 'appetizer', '0');
INSERT INTO `ym_product_categories` VALUES ('3', 'beverages', '0');

-- ----------------------------
-- Table structure for ym_site_setting
-- ----------------------------
DROP TABLE IF EXISTS `ym_site_setting`;
CREATE TABLE `ym_site_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ym_site_setting
-- ----------------------------
INSERT INTO `ym_site_setting` VALUES ('1', 'site_title', 'عنوان سایت', 'Darband');
INSERT INTO `ym_site_setting` VALUES ('2', 'default_title', 'عنوان پیش فرض صفحات', 'Darband');
INSERT INTO `ym_site_setting` VALUES ('3', 'keywords', 'کلمات کلیدی سایت', '[\"\"]');
INSERT INTO `ym_site_setting` VALUES ('4', 'site_description', 'شرح وبسایت', '');
INSERT INTO `ym_site_setting` VALUES ('5', 'social_links', 'شبکه های اجتماعی', '{\"whatsapp\":\"http:\\/\\/whatsapp.com\",\"facebook\":\"http:\\/\\/facebook.com\",\"telegram\":\"http:\\/\\/telegram.me\",\"instagram\":\"https:\\/\\/instagram.com\",\"twitter\":\"http:\\/\\/twitter.com\"}');
INSERT INTO `ym_site_setting` VALUES ('6', 'phone', 'شماره تماس', '[02] 96464466');
INSERT INTO `ym_site_setting` VALUES ('7', 'phone2', 'شماره تماس دوم', '0433347481');
INSERT INTO `ym_site_setting` VALUES ('8', 'address', 'آدرس', '9/45 Rawson St, Auburn NSW 2144 Access Via, Station Road');
INSERT INTO `ym_site_setting` VALUES ('9', 'master_email', 'پست الکترونیک وبسایت', 'info@darband.com');
INSERT INTO `ym_site_setting` VALUES ('10', 'map_pic', 'تصویر نقشه', 'map.png');
INSERT INTO `ym_site_setting` VALUES ('11', 'map_link', 'آدرس نقشه', 'https://www.google.com/maps/place/Darband+Restaurant/@-33.8498184,151.0327375,17z/data=!3m1!4b1!4m5!3m4!1s0x6b12bcb2018e56ad:0x3d3bee05012da80c!8m2!3d-33.8498184!4d151.0349262');
INSERT INTO `ym_site_setting` VALUES ('12', 'opening_hours', 'ساعات کاری', 'Everyday 11:00 am – 10:00 pm');
INSERT INTO `ym_site_setting` VALUES ('13', 'menu_pdf', 'فایل منو', 'Darband_Menu.pdf');

-- ----------------------------
-- Table structure for ym_slideshow
-- ----------------------------
DROP TABLE IF EXISTS `ym_slideshow`;
CREATE TABLE `ym_slideshow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` text,
  `image` varchar(100) DEFAULT NULL,
  `link` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ym_slideshow
-- ----------------------------
INSERT INTO `ym_slideshow` VALUES ('25', null, null, 'dlBlD1545065896.png', null);
INSERT INTO `ym_slideshow` VALUES ('26', null, null, 'oIaLE1545066760.png', null);

-- ----------------------------
-- Table structure for ym_tags
-- ----------------------------
DROP TABLE IF EXISTS `ym_tags`;
CREATE TABLE `ym_tags` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) CHARACTER SET utf8 COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'عنوان',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ym_tags
-- ----------------------------

-- ----------------------------
-- Table structure for ym_tag_rel
-- ----------------------------
DROP TABLE IF EXISTS `ym_tag_rel`;
CREATE TABLE `ym_tag_rel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) NOT NULL,
  `model_id` int(10) unsigned NOT NULL,
  `tag_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tag_id` (`tag_id`),
  CONSTRAINT `ym_tag_rel_ibfk_1` FOREIGN KEY (`tag_id`) REFERENCES `ym_tags` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ym_tag_rel
-- ----------------------------

-- ----------------------------
-- Table structure for ym_users
-- ----------------------------
DROP TABLE IF EXISTS `ym_users`;
CREATE TABLE `ym_users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL COMMENT 'پست الکترونیک',
  `role_id` int(10) unsigned DEFAULT NULL,
  `create_date` varchar(20) DEFAULT NULL,
  `status` enum('pending','active','blocked','deleted') DEFAULT 'pending',
  `verification_token` varchar(100) DEFAULT NULL,
  `change_password_request_count` int(1) DEFAULT '0',
  `auth_mode` varchar(50) NOT NULL DEFAULT 'site',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of ym_users
-- ----------------------------

-- ----------------------------
-- Table structure for ym_user_details
-- ----------------------------
DROP TABLE IF EXISTS `ym_user_details`;
CREATE TABLE `ym_user_details` (
  `user_id` int(10) unsigned NOT NULL COMMENT 'کاربر',
  `first_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام',
  `last_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام خانوادگی',
  `phone` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'تلفن',
  `zip_code` varchar(10) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'کد پستی',
  `address` varchar(1000) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نشانی دقیق پستی',
  `avatar` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'آواتار',
  `mobile` varchar(11) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'موبایل',
  `dealership_name` varchar(50) COLLATE utf8_persian_ci DEFAULT NULL COMMENT 'نام نمایشگاه',
  PRIMARY KEY (`user_id`),
  KEY `user_id` (`user_id`) USING BTREE,
  CONSTRAINT `ym_user_details_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `ym_users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ym_user_details
-- ----------------------------

-- ----------------------------
-- Table structure for ym_user_roles
-- ----------------------------
DROP TABLE IF EXISTS `ym_user_roles`;
CREATE TABLE `ym_user_roles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_persian_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ym_user_roles
-- ----------------------------
INSERT INTO `ym_user_roles` VALUES ('1', 'کاربر معمولی', 'user');

-- ----------------------------
-- Table structure for ym_user_role_permissions
-- ----------------------------
DROP TABLE IF EXISTS `ym_user_role_permissions`;
CREATE TABLE `ym_user_role_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'شناسه',
  `role_id` int(10) unsigned DEFAULT NULL COMMENT 'نقش',
  `module_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'ماژول',
  `controller_id` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT 'کنترلر',
  `actions` text CHARACTER SET utf8 COMMENT 'اکشن ها',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=229 DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- ----------------------------
-- Records of ym_user_role_permissions
-- ----------------------------
INSERT INTO `ym_user_role_permissions` VALUES ('195', '2', 'base', 'BookController', 'buy,bookmark,rate,verify,updateVersion');
INSERT INTO `ym_user_role_permissions` VALUES ('196', '2', 'base', 'BookPersonsController', 'list');
INSERT INTO `ym_user_role_permissions` VALUES ('197', '2', 'base', 'TagsController', 'list');
INSERT INTO `ym_user_role_permissions` VALUES ('198', '2', 'comments', 'CommentsCommentController', 'admin,adminBooks,delete,approve');
INSERT INTO `ym_user_role_permissions` VALUES ('199', '2', 'publishers', 'PublishersPanelController', 'manageSettlement,uploadNationalCardImage,uploadRegistrationCertificateImage,update,create,excel,account,index,discount,settlement,sales,documents,signup');
INSERT INTO `ym_user_role_permissions` VALUES ('200', '2', 'publishers', 'PublishersBooksController', 'create,update,delete,uploadImage,deleteImage,upload,deleteUpload,deleteFile,images,savePackage,deletePackage,getPackages,updatePackage,uploadPreview,deleteUploadedPreview');
INSERT INTO `ym_user_role_permissions` VALUES ('201', '2', 'shop', 'ShopAddressesController', 'add,remove,update');
INSERT INTO `ym_user_role_permissions` VALUES ('202', '2', 'shop', 'ShopOrderController', 'getInfo,history');
INSERT INTO `ym_user_role_permissions` VALUES ('203', '2', 'tickets', 'TicketsDepartmentsController', 'create,update');
INSERT INTO `ym_user_role_permissions` VALUES ('204', '2', 'tickets', 'TicketsManageController', 'index,view,create,update,closeTicket,upload,deleteUploaded,send');
INSERT INTO `ym_user_role_permissions` VALUES ('205', '2', 'tickets', 'TicketsMessagesController', 'delete,create');
INSERT INTO `ym_user_role_permissions` VALUES ('206', '2', 'users', 'UsersCreditController', 'buy,bill,captcha,verify');
INSERT INTO `ym_user_role_permissions` VALUES ('207', '2', 'users', 'UsersPublicController', 'dashboard,logout,setting,notifications,changePassword,bookmarked,downloaded,transactions,library,sessions,removeSession');
INSERT INTO `ym_user_role_permissions` VALUES ('223', '1', 'lists', 'ListsCategoryController', 'index,create,update,admin,delete,view');
INSERT INTO `ym_user_role_permissions` VALUES ('224', '1', 'lists', 'ListsManageController', 'index,create,update,admin,delete,upload,deleteUpload,uploadItem,deleteUploadItem,changeStatus');
INSERT INTO `ym_user_role_permissions` VALUES ('225', '1', 'lists', 'ListsPublicController', 'view,new,update,upload,uploadItem,deleteUpload,deleteUploadItem,rows,json,authJson');
INSERT INTO `ym_user_role_permissions` VALUES ('226', '1', 'users', 'UsersManageController', 'index,view,create,update,admin,delete,userTransactions,transactions,dealerships,createDealership,updateDealership,upload,deleteUpload,dealershipRequests,dealershipRequest,deleteDealershipRequest');
INSERT INTO `ym_user_role_permissions` VALUES ('227', '1', 'users', 'UsersRolesController', 'create,update,admin,delete');
INSERT INTO `ym_user_role_permissions` VALUES ('228', '1', 'users', 'UsersPublicController', 'dashboard,logout,changePassword,verify,forgetPassword,recoverPassword,authCallback,transactions,index,ResendVerification,profile,upload,deleteUpload,viewProfile,login,captcha');
