-- Adminer 4.8.1 MySQL 10.11.8-MariaDB-ubu2004 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `artist`;
CREATE TABLE `artist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `description` longtext NOT NULL,
  `picture` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `spotify` varchar(255) DEFAULT NULL,
  `snapchat` varchar(255) DEFAULT NULL,
  `tiktok` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `artist` (`id`, `name`, `description`, `picture`, `video`, `website`, `facebook`, `twitter`, `instagram`, `spotify`, `snapchat`, `tiktok`, `created_at`, `updated_at`) VALUES
(1,	'Aya Nakamura',	'Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo. Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.',	'https://images.pexels.com/photos/7086304/pexels-photo-7086304.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX',	'https://www.musicscreen.be/',	NULL,	NULL,	NULL,	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(2,	'Travis Scott',	'Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo. Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.',	'https://images.pexels.com/photos/258732/pexels-photo-258732.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/aMfzTaiBXyg?si=rUMeJJHKzPddDve7',	'https://www.musicscreen.be/	',	NULL,	NULL,	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	'https://www.snapchat.com/',	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(3,	'BTS',	'Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo. Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.',	'https://images.pexels.com/photos/2531728/pexels-photo-2531728.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX',	NULL,	NULL,	NULL,	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	'https://www.snapchat.com/',	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(4,	'Sliman',	'Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo. Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.',	'https://images.pexels.com/photos/5648438/pexels-photo-5648438.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/ouzVcuLlJo0?si=FeluwVwOLBNz9tVD',	NULL,	NULL,	'https://x.com/',	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(5,	'Adele',	'Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci. Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla',	'https://images.pexels.com/photos/6173807/pexels-photo-6173807.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/ouzVcuLlJo0?si=FeluwVwOLBNz9tVD',	'https://www.musicscreen.be/',	'https://www.facebook.com/',	NULL,	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(6,	'Korn',	'Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci. Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla',	'https://images.pexels.com/photos/6173832/pexels-photo-6173832.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/aMfzTaiBXyg?si=rUMeJJHKzPddDve7',	NULL,	'https://www.facebook.com/',	'https://x.com/',	NULL,	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(7,	'Frank Sinatra',	'Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo. Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.',	'https://images.pexels.com/photos/3807278/pexels-photo-3807278.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/aMfzTaiBXyg?si=rUMeJJHKzPddDve7',	'https://www.musicscreen.be/	',	NULL,	NULL,	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(8,	'Billie Eilish',	'Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo. Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.',	'https://images.pexels.com/photos/7090876/pexels-photo-7090876.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX',	NULL,	'https://www.facebook.com/',	'https://x.com/',	NULL,	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(9,	'Bob Marley',	'Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo. Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.',	'https://images.pexels.com/photos/1150837/pexels-photo-1150837.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/aMfzTaiBXyg?si=rUMeJJHKzPddDve7',	NULL,	'https://www.facebook.com/',	'https://x.com/',	NULL,	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	'https://www.snapchat.com/',	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(10,	'The Blaze',	'Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo. Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.',	'https://images.pexels.com/photos/3388899/pexels-photo-3388899.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/ouzVcuLlJo0?si=FeluwVwOLBNz9tVD',	'https://www.musicscreen.be/',	NULL,	NULL,	NULL,	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(11,	'Stevie Wonder',	'Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo. Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.',	'https://images.pexels.com/photos/2231755/pexels-photo-2231755.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX',	'https://www.musicscreen.be/',	'https://www.facebook.com/',	'https://x.com/',	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(12,	'Madonna',	'Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci. Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla',	'https://images.pexels.com/photos/2345342/pexels-photo-2345342.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/aMfzTaiBXyg?si=rUMeJJHKzPddDve7',	NULL,	NULL,	NULL,	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(13,	'John Lennon',	'Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci. Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla',	'https://images.pexels.com/photos/6270136/pexels-photo-6270136.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX',	'https://www.musicscreen.be/',	NULL,	'https://x.com/',	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(14,	'Machine Gun Kelly',	'Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla pulvinar eleifend sem. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Quisque porta. Vivamus porttitor turpis ac leo. Morbi a metus. Phasellus enim erat, vestibulum vel, aliquam a, posuere eu, velit. Nullam sapien sem, ornare ac, nonummy non, lobortis a, enim. Nunc tincidunt ante vitae massa. Duis ante orci, molestie vitae, vehicula venenatis, tincidunt ac, pede. Nulla accumsan, elit sit amet varius semper, nulla mauris mollis quam, tempor suscipit diam nulla vel leo. Etiam commodo dui eget wisi. Donec iaculis gravida nulla. Donec quis nibh at felis congue commodo. Etiam bibendum elit eget erat. Nam quis nulla. Integer malesuada. In in enim a arcu imperdiet malesuada. Sed vel lectus. Donec odio urna, tempus molestie, porttitor ut, iaculis quis, sem. Phasellus rhoncus. Aenean id metus id velit ullamcorper pulvinar. Vestibulum fermentum tortor id mi. Pellentesque ipsum. Nulla non arcu lacinia neque faucibus fringilla. Nulla non lectus sed nisl molestie malesuada. Proin in tellus sit amet nibh dignissim sagittis. Vivamus luctus egestas leo. Maecenas sollicitudin. Nullam rhoncus aliquam metus. Etiam egestas wisi a erat.',	'https://images.pexels.com/photos/7020687/pexels-photo-7020687.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/aMfzTaiBXyg?si=rUMeJJHKzPddDve7',	NULL,	'https://www.facebook.com/',	NULL,	NULL,	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(15,	'Megan Thee Stallion',	'Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci. Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla',	'https://images.pexels.com/photos/1460032/pexels-photo-1460032.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX',	'https://www.musicscreen.be/	',	'https://www.facebook.com/',	NULL,	NULL,	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	'https://www.snapchat.com/',	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(16,	'Lil Nas X',	'Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci. Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla',	'https://images.pexels.com/photos/1036399/pexels-photo-1036399.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/aMfzTaiBXyg?si=rUMeJJHKzPddDve7',	NULL,	'https://www.facebook.com/',	'https://x.com/',	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(17,	'David Bowie',	'Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci. Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla',	'https://images.pexels.com/photos/668278/pexels-photo-668278.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/ouzVcuLlJo0?si=FeluwVwOLBNz9tVD',	NULL,	NULL,	'https://x.com/',	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(18,	'Mariah Carey',	'Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci. Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla',	'https://images.pexels.com/photos/1083855/pexels-photo-1083855.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX',	'https://www.musicscreen.be/',	'https://www.facebook.com/',	'https://x.com/',	NULL,	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	'https://www.snapchat.com/',	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(19,	'Justin Bieber',	'Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci. Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla',	'https://images.pexels.com/photos/122635/pexels-photo-122635.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX',	'https://www.musicscreen.be/',	'https://www.facebook.com/',	'https://x.com/',	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL),
(20,	'Benjamin Biolay',	'Praesent in mauris eu tortor porttitor accumsan. Mauris suscipit, ligula sit amet pharetra semper, nibh ante cursus purus, vel sagittis velit mauris vel metus. Aenean fermentum risus id tortor. Integer imperdiet lectus quis justo. Integer tempor. Vivamus ac urna vel leo pretium faucibus. Mauris elementum mauris vitae tortor. In dapibus augue non sapien. Aliquam ante. Curabitur bibendum justo non orci. Morbi leo mi, nonummy eget, tristique non, rhoncus non, leo. Nullam faucibus mi quis velit. Integer in sapien. Fusce tellus odio, dapibus id, fermentum quis, suscipit id, erat. Fusce aliquam vestibulum ipsum. Aliquam erat volutpat. Pellentesque sapien. Cras elementum. Nulla',	'https://images.pexels.com/photos/4722551/pexels-photo-4722551.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2',	'https://www.youtube.com/embed/ouzVcuLlJo0?si=FeluwVwOLBNz9tVD',	'https://www.musicscreen.be/',	NULL,	NULL,	'https://www.instagram.com/',	'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm',	NULL,	'https://www.tiktok.com/',	'2024-06-05 14:10:16',	NULL);

DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `treatment` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `contact` (`id`, `name`, `email`, `content`, `created_at`, `updated_at`, `treatment`) VALUES
(1,	'Maia Harvey',	'marcos.marjorie@hotmail.fr',	'Bonjour,\r\nJe voudrais avoir les vrais horaires ? \r\nMerci',	NULL,	NULL,	'Traité');

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `birthdate` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `postcode` int(11) NOT NULL,
  `town` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `adress` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `customer` (`id`, `firstname`, `lastname`, `birthdate`, `email`, `phone_number`, `postcode`, `town`, `created_at`, `updated_at`, `adress`) VALUES
(1,	'Jeanne',	'Chauvin',	'2007-09-18',	'thierry.bailly@dupuis.fr',	'0608013850',	97403,	'Berger-la-Forêt',	'2024-06-02 11:45:59',	NULL,	'44, avenue Gilbert\n42265 Le Gallboeuf'),
(2,	'Guillaume',	'Girard',	'2007-06-19',	'qrey@tele2.fr',	'+33 (0)6 62 32 78 01',	52163,	'Perrin',	'2024-06-02 11:45:59',	NULL,	'31, rue Didier\n81784 Guichard'),
(3,	'Stéphanie',	'Parent',	'1992-05-06',	'regnier.chantal@laposte.net',	'+33 (0)7 88 73 84 34',	70907,	'Lemonnierdan',	'2024-06-02 11:45:59',	NULL,	'15, rue Guerin\n49908 Leveque'),
(4,	'Denise',	'Lucas',	'1984-07-08',	'penelope03@noos.fr',	'+33 (0)7 80 44 57 19',	20587,	'Lacroixdan',	'2024-06-02 11:45:59',	NULL,	'19, chemin de Simon\n35848 Weber-la-Forêt'),
(5,	'Guy',	'Faivre',	'1997-05-30',	'roger.berger@noos.fr',	'0778474662',	31593,	'Boutin',	'2024-06-02 11:45:59',	NULL,	'54, boulevard Adélaïde Huet\n71629 Etienne'),
(6,	'Alice',	'Duhamel',	'2020-02-28',	'louise.bailly@sfr.fr',	'+33 (0)6 99 86 00 07',	20169,	'LucasVille',	'2024-06-02 11:45:59',	NULL,	'819, rue Verdier\n93302 Tessierdan'),
(7,	'Frédéric',	'Pires',	'1972-08-16',	'npoulain@cordier.fr',	'+33 (0)6 96 77 54 71',	50482,	'Bruneau',	'2024-06-02 11:45:59',	NULL,	'3, rue Marchal\n18519 Jacquet-sur-Mer'),
(8,	'Caroline',	'Morin',	'1980-05-18',	'alice.maillet@dbmail.com',	'+33 (0)6 30 38 73 14',	90535,	'Poulain-la-Forêt',	'2024-06-02 11:45:59',	NULL,	'717, chemin Marine Hoarau\n09620 Cousin-la-Forêt'),
(9,	'Richard',	'Reynaud',	'1998-03-15',	'etienne.vaillant@pasquier.org',	'0757293655',	8731,	'Mendes',	'2024-06-02 11:45:59',	NULL,	'528, avenue de Navarro\n40492 Bigot'),
(10,	'Maurice',	'Delahaye',	'2009-02-15',	'eleblanc@leconte.com',	'+33 (0)6 45 23 90 10',	55090,	'Chartier',	'2024-06-02 11:45:59',	NULL,	'65, place de Brun\n05025 DumontVille');

DROP TABLE IF EXISTS `customer_ticket`;
CREATE TABLE `customer_ticket` (
  `customer_id` int(11) NOT NULL,
  `ticket_id` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`,`ticket_id`),
  KEY `IDX_266571F29395C3F3` (`customer_id`),
  KEY `IDX_266571F2700047D2` (`ticket_id`),
  CONSTRAINT `FK_266571F2700047D2` FOREIGN KEY (`ticket_id`) REFERENCES `ticket` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_266571F29395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


DROP TABLE IF EXISTS `genre`;
CREATE TABLE `genre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `genre` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'Experimental Rock',	'2024-06-05 14:10:16',	NULL),
(2,	'Électronique',	'2024-06-05 14:10:16',	NULL),
(3,	'House',	'2024-06-05 14:10:16',	NULL),
(4,	'Funk',	'2024-06-05 14:10:16',	NULL),
(5,	'Jazz',	'2024-06-05 14:10:16',	NULL),
(6,	'Shoegaze',	'2024-06-05 14:10:16',	NULL),
(7,	'Soul',	'2024-06-05 14:10:16',	NULL),
(8,	'Pop',	'2024-06-05 14:10:16',	NULL),
(9,	'Country',	'2024-06-05 14:10:16',	NULL),
(10,	'Noise Rock',	'2024-06-05 14:10:16',	NULL),
(11,	'Blues',	'2024-06-05 14:10:16',	NULL),
(12,	'Disco',	'2024-06-05 14:10:16',	NULL),
(13,	'Salsa',	'2024-06-05 14:10:16',	NULL),
(14,	'Classique',	'2024-06-05 14:10:16',	NULL),
(15,	'Rap',	'2024-06-05 14:10:16',	NULL);

DROP TABLE IF EXISTS `genre_artist`;
CREATE TABLE `genre_artist` (
  `genre_id` int(11) NOT NULL,
  `artist_id` int(11) NOT NULL,
  PRIMARY KEY (`genre_id`,`artist_id`),
  KEY `IDX_EAEAA6A74296D31F` (`genre_id`),
  KEY `IDX_EAEAA6A7B7970CF8` (`artist_id`),
  CONSTRAINT `FK_EAEAA6A74296D31F` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_EAEAA6A7B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `genre_artist` (`genre_id`, `artist_id`) VALUES
(1,	2),
(1,	5),
(1,	6),
(1,	7),
(1,	15),
(1,	17),
(4,	3),
(4,	8),
(4,	13),
(6,	2),
(6,	11),
(6,	19),
(6,	20),
(8,	1),
(8,	8),
(8,	10),
(8,	15),
(8,	17),
(13,	4),
(13,	6),
(13,	7),
(13,	9),
(13,	12),
(13,	13),
(13,	14),
(13,	16),
(13,	18);

DROP TABLE IF EXISTS `slot`;
CREATE TABLE `slot` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `artist_id` int(11) NOT NULL,
  `stage_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `day` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_AC0E2067B7970CF8` (`artist_id`),
  KEY `IDX_AC0E20672298D193` (`stage_id`),
  CONSTRAINT `FK_AC0E20672298D193` FOREIGN KEY (`stage_id`) REFERENCES `stage` (`id`),
  CONSTRAINT `FK_AC0E2067B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `slot` (`id`, `artist_id`, `stage_id`, `date`, `hour`, `created_at`, `updated_at`, `day`) VALUES
(1,	1,	4,	'2024-08-23',	'16:00-18:00',	'2024-06-05 14:10:16',	NULL,	'J1'),
(2,	2,	3,	'2024-08-23',	'18:00-20:00',	'2024-06-05 14:10:16',	NULL,	'J1'),
(3,	3,	1,	'2024-08-23',	'20:00-22:00',	'2024-06-05 14:10:16',	NULL,	'J1'),
(4,	4,	4,	'2024-08-23',	'22:00-00:00',	'2024-06-05 14:10:16',	NULL,	'J1'),
(5,	5,	4,	'2024-08-24',	'16:00-18:00',	'2024-06-05 14:10:16',	NULL,	'J2'),
(6,	6,	4,	'2024-08-24',	'18:00-20:00',	'2024-06-05 14:10:16',	NULL,	'J2'),
(7,	7,	3,	'2024-08-24',	'20:00-22:00',	'2024-06-05 14:10:16',	NULL,	'J2'),
(8,	8,	4,	'2024-08-24',	'22:00-00:00',	'2024-06-05 14:10:16',	NULL,	'J2'),
(9,	9,	1,	'2024-08-25',	'16:00-18:00',	'2024-06-05 14:10:16',	NULL,	'J3'),
(10,	10,	4,	'2024-08-25',	'18:00-20:00',	'2024-06-05 14:10:16',	NULL,	'J3'),
(11,	11,	4,	'2024-08-25',	'20:00-22:00',	'2024-06-05 14:10:16',	NULL,	'J3'),
(12,	12,	2,	'2024-08-25',	'22:00-00:00',	'2024-06-05 14:10:16',	NULL,	'J3');

DROP TABLE IF EXISTS `sponsor`;
CREATE TABLE `sponsor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sponsor` (`id`, `name`, `icon`) VALUES
(2,	'Dentaga',	'https://cdn.pixabay.com/photo/2016/09/14/20/50/tooth-1670434_1280.png'),
(3,	'RacconCity',	'https://cdn.pixabay.com/photo/2017/01/31/23/42/animal-2028258_1280.png'),
(4,	'Meto',	'https://cdn.pixabay.com/photo/2017/02/18/19/20/logo-2078018_1280.png'),
(5,	'Ivangers',	'https://cdn.pixabay.com/photo/2021/08/11/18/06/paladin-6539115_1280.png');

DROP TABLE IF EXISTS `stage`;
CREATE TABLE `stage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `stage` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1,	'404 Not Found',	'2024-06-05 14:10:16',	NULL),
(2,	"418 I'm a Teapot",	'2024-06-05 14:10:16',	NULL),
(3,	'409 Conflict',	'2024-06-05 14:10:16',	NULL),
(4,	'502 Bad Gateway',	'2024-06-05 14:10:16',	NULL);

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE `ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `start_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `end_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `quantity` int(11) DEFAULT NULL,
  `fee` varchar(64) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `type` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ticket` (`id`, `title`, `price`, `created_at`, `updated_at`, `start_at`, `end_at`, `quantity`, `fee`, `duration`, `type`) VALUES
(1,	'Pass 1 JOUR Plein Tarif le 23/08/2024',	100,	'2024-06-03 12:04:33',	NULL,	'2024-08-23 00:00:00',	'2024-08-23 00:00:00',	1,	'Plein Tarif',	24,	'Pass 1 JOUR'),
(2,	'Pass 2 JOURS Tarif Enfant (-12 ans) du 24/08/2024 au 25/08/2024',	0,	'2024-06-03 12:10:19',	NULL,	'2024-08-24 00:00:00',	'2024-08-25 00:00:00',	1,	'Tarif Enfant (-12 ans)',	48,	'Pass 2 JOURS'),
(3,	'Pass 3 JOURS Plein Tarif du 23/08/2024 au 25/08/2024',	250,	'2024-06-03 12:29:49',	NULL,	'2024-08-23 00:00:00',	'2024-08-25 00:00:00',	1,	'Plein Tarif',	72,	'Pass 3 JOURS'),
(4,	'Pass 1 JOUR Tarif Étudiant le 23/08/2024',	80,	'2024-06-03 12:59:28',	NULL,	'2024-08-23 00:00:00',	'2024-08-23 00:00:00',	1,	'Tarif Étudiant',	24,	'Pass 1 JOUR'),
(5,	'Pass 1 JOUR Tarif Enfant (-12 ans) le 23/08/2024',	0,	'2024-06-03 12:59:49',	NULL,	'2024-08-23 00:00:00',	'2024-08-23 00:00:00',	1,	'Tarif Enfant (-12 ans)',	24,	'Pass 1 JOUR'),
(6,	'Pass 1 JOUR Plein Tarif le 24/08/2024',	100,	'2024-06-03 13:00:12',	NULL,	'2024-08-24 00:00:00',	'2024-08-24 00:00:00',	1,	'Plein Tarif',	24,	'Pass 1 JOUR'),
(7,	'Pass 1 JOUR Tarif Étudiant le 24/08/2024',	80,	'2024-06-03 13:02:30',	NULL,	'2024-08-24 00:00:00',	'2024-08-24 00:00:00',	1,	'Tarif Étudiant',	24,	'Pass 1 JOUR'),
(8,	'Pass 1 JOUR Tarif Enfant (-12 ans) le 24/08/2024',	0,	'2024-06-03 13:02:56',	NULL,	'2024-08-24 00:00:00',	'2024-08-24 00:00:00',	1,	'Tarif Enfant (-12 ans)',	24,	'Pass 1 JOUR'),
(9,	'Pass 1 JOUR Plein Tarif le 25/08/2024',	100,	'2024-06-03 13:04:15',	NULL,	'2024-08-25 00:00:00',	'2024-08-25 00:00:00',	1,	'Plein Tarif',	24,	'Pass 1 JOUR'),
(10,	'Pass 1 JOUR Tarif Étudiant le 25/08/2024',	80,	'2024-06-03 13:04:35',	NULL,	'2024-08-25 00:00:00',	'2024-08-25 00:00:00',	1,	'Tarif Étudiant',	24,	'Pass 1 JOUR'),
(11,	'Pass 1 JOUR Tarif Enfant (-12 ans) le 25/08/2024',	0,	'2024-06-03 13:04:54',	NULL,	'2024-08-25 00:00:00',	'2024-08-25 00:00:00',	1,	'Tarif Enfant (-12 ans)',	24,	'Pass 1 JOUR'),
(12,	'Pass 2 JOURS Plein Tarif du 24/08/2024 au 25/08/2024',	200,	'2024-06-03 13:05:53',	NULL,	'2024-08-24 00:00:00',	'2024-08-25 00:00:00',	1,	'Plein Tarif',	48,	'Pass 2 JOURS'),
(13,	'Pass 2 JOURS Tarif Étudiant du 24/08/2024 au 25/08/2024',	150,	'2024-06-03 13:06:44',	NULL,	'2024-08-24 00:00:00',	'2024-08-25 00:00:00',	1,	'Tarif Étudiant',	48,	'Pass 2 JOURS'),
(14,	'Pass 3 JOURS Tarif Étudiant du 23/08/2024 au 25/08/2024',	200,	'2024-06-03 13:08:29',	NULL,	'2024-08-23 00:00:00',	'2024-08-25 00:00:00',	1,	'Tarif Étudiant',	72,	'Pass 3 JOURS'),
(15,	'Pass 3 JOURS Tarif Enfant (-12 ans) du 23/08/2024 au 25/08/2024',	0,	'2024-06-03 13:09:04',	NULL,	'2024-08-23 00:00:00',	'2024-08-25 00:00:00',	1,	'Tarif Enfant (-12 ans)',	72,	'Pass 3 JOURS');

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(180) NOT NULL,
  `roles` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL COMMENT '(DC2Type:json)' CHECK (json_valid(`roles`)),
  `password` varchar(255) NOT NULL,
  `firstname` varchar(64) NOT NULL,
  `lastname` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_IDENTIFIER_EMAIL` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `user` (`id`, `email`, `roles`, `password`, `firstname`, `lastname`, `created_at`, `updated_at`) VALUES
(1,	'talya@ofestival.fr',	'[\"ROLE_ADMIN\"]',	'$2y$13$dtEoqptHglRxkDAhwPSvi.RXyEI5Y0xhRA569ujGRJln4A7xi/DxO',	'Talya',	'LALAOUI',	'2024-06-05 14:10:16',	NULL),
(2,	'badri@ofestival.fr',	'[\"ROLE_ADMIN\"]',	'$2y$13$dtEoqptHglRxkDAhwPSvi.RXyEI5Y0xhRA569ujGRJln4A7xi/DxO',	'Badri',	'CHOULAK',	'2024-06-05 14:10:16',	NULL),
(3,	'nicolas@ofestival.fr',	'[\"ROLE_ADMIN\"]',	'$2y$13$dtEoqptHglRxkDAhwPSvi.RXyEI5Y0xhRA569ujGRJln4A7xi/DxO',	'Nicolas',	'JOUBERT',	'2024-06-05 14:10:16',	NULL),
(4,	'marjorie@ofestival.fr',	'[\"ROLE_ADMIN\"]',	'$2y$13$dtEoqptHglRxkDAhwPSvi.RXyEI5Y0xhRA569ujGRJln4A7xi/DxO',	'Marjorie',	'MARCOS',	'2024-06-05 14:10:16',	NULL);

-- 2024-06-05 12:53:18