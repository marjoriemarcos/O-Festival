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
(1, 'Machine Gun Kelly', 'Aut molestiae quos dolor ex deleniti. Ratione consequatur velit et. Dolorem neque sit consequatur nobis nam voluptatem ut consequatur. Totam voluptas est earum quis eos sunt reiciendis et. Ut voluptatum repudiandae excepturi qui quia aspernatur qui. Dolorem molestiae nesciunt reiciendis aperiam quasi fugiat. Voluptas qui consectetur in laborum omnis id inventore eaque. Est quia quas nobis expedita ad. Voluptas qui quo enim aperiam omnis veritatis eos. Ratione deleniti delectus at quaerat debitis. Ut neque officiis adipisci quia sit odio ea. Et ipsa ab voluptas hic velit. Veniam eligendi ullam ipsam nisi illo et eum. Iusto ut eligendi facilis quas et. Nesciunt necessitatibus sed est qui rerum mollitia. Vel beatae molestiae voluptate fugit quia. Beatae magni est sed et sit. Voluptas magni fugiat pariatur sed qui exercitationem. Pariatur qui exercitationem ducimus dolores exercitationem et architecto molestiae. Molestias minus quos ut minus consequatur cumque doloremque.', 'https://images.pexels.com/photos/122635/pexels-photo-122635.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(2, 'Adele', 'Odio labore illo non asperiores et dicta. Aut non voluptatibus eos quasi repudiandae. Qui officiis qui quia est. Ipsam in aut non dolores maxime amet aut. Beatae est distinctio quam numquam quasi non sunt. Minima consequatur asperiores nihil velit veniam cumque. Consequatur in ea accusamus fugiat occaecati nulla architecto autem. Harum nemo aliquid voluptate voluptatum eligendi veritatis et ea. Soluta numquam consequuntur et. Rerum sint consectetur asperiores sit iure. Rerum earum cupiditate non aliquid eveniet voluptatem fugiat. Aut rerum blanditiis debitis incidunt nihil soluta. Et accusamus sint vel id reprehenderit. Voluptas incidunt quos consequatur. Dolores placeat ex assumenda rerum velit necessitatibus. Magnam libero officia libero quae expedita ea eum. Quod quasi culpa cumque et nulla aperiam. Et qui consequatur sapiente rerum quia voluptatem consequatur. Aut dolores quia et nulla id minima non. Sunt iure delectus ut provident debitis ut.', 'https://images.pexels.com/photos/814049/pexels-photo-814049.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(3, 'Doja Cat', 'Sit deleniti repudiandae vel recusandae est dignissimos itaque. Incidunt soluta ipsam doloremque voluptas debitis et consequuntur. Blanditiis mollitia ipsam dolores soluta est. Est nulla vero atque aliquam. Molestias non illum iusto vel. Facere voluptate et alias iste quis. Sequi ducimus rerum recusandae ipsam temporibus sed totam. Laboriosam omnis modi nihil ut at iure. Facilis velit aut in eum. Eius porro laboriosam aut. Ut ut aliquam laborum ea veniam rerum aut qui. Rerum expedita illum quo quo non voluptatem. Dignissimos corrupti est odio et. Impedit aut dignissimos consequuntur laudantium delectus mollitia consequatur. Numquam eius possimus ducimus eum sequi cum aut. Ut corporis et nobis ad exercitationem at perferendis. Exercitationem sit tempora perferendis porro odio. Delectus qui cumque est quis officia ex reprehenderit. Debitis omnis nisi itaque ab veniam quia aut. Consequatur accusantium expedita a assumenda. Eos cupiditate ut et soluta non vel veritatis.', 'https://images.pexels.com/photos/2345342/pexels-photo-2345342.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(4, 'Michael Jackson', 'Optio illum perspiciatis deleniti est ut. Ea aut architecto deleniti vitae animi illo sapiente. Iusto non officiis tempora aut quo. Rerum voluptates consequatur maxime dolorum nulla. Enim animi ad reprehenderit iste reprehenderit. In voluptas quaerat non aliquid in. Quo cumque qui aperiam eum. Delectus tempora placeat aperiam eveniet. Eum repellendus est voluptatem velit sit qui. Officiis eligendi aperiam id error omnis animi culpa reprehenderit. Laboriosam molestiae sit voluptas perferendis. Sed consectetur repudiandae assumenda fuga consequatur. Nostrum sequi repudiandae cupiditate illo quas libero tempora. Quia nihil et velit tenetur quibusdam placeat est. Deleniti dolorum id porro sunt eum nam et. Excepturi atque iusto ut consequatur dolor at. Ducimus aut et enim nisi. Voluptatem eum magni maxime praesentium dolor perspiciatis. Sapiente alias ad officiis necessitatibus. Praesentium totam consequatur soluta quam harum corporis illo.', 'https://images.pexels.com/photos/3775132/pexels-photo-3775132.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(5, 'Megan Thee Stallion', 'Id aspernatur libero quibusdam optio quia dolorem. Illo nobis praesentium dolorem non. Quis qui molestiae sit quisquam. Odio nulla numquam quo a. Dolorem dolores quasi impedit aut. Rerum qui quis velit velit sequi est. Deserunt tempora dolores nihil dolores possimus alias. Quas libero illum et ipsa quaerat dolores est id. Quaerat non consequatur porro amet quam velit. Assumenda tempora quasi perspiciatis facilis voluptas ex beatae. Eos aut excepturi voluptatibus tempora. Recusandae nostrum vero libero voluptatem eligendi illum perferendis. Beatae suscipit officiis et expedita ratione sapiente sint. Sit quibusdam qui beatae quam nulla eius autem adipisci. Officia qui esse esse odio id. Quia sed doloribus nihil corrupti repellat. Mollitia deleniti iusto deleniti omnis qui sed. Porro quo cumque libero inventore dolore quisquam consequuntur. Numquam ducimus non voluptatem tempora saepe dolores. Inventore qui nostrum quia accusantium odio est.', 'https://images.pexels.com/photos/6270265/pexels-photo-6270265.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(6, 'Paul McCartney', 'Ut fugit animi omnis explicabo tempora unde reprehenderit. Mollitia laborum a ullam officia rerum accusantium dolores. Repellat placeat impedit autem blanditiis itaque earum. Sapiente et et architecto velit eius accusantium. Laboriosam vitae rerum dicta ab sint ut. Ratione tenetur qui perferendis aut. Distinctio amet hic dolore amet nihil. Aliquam et harum magni est ut laborum quam. Quia consequuntur doloribus eos voluptatibus nam cupiditate aut. Tempore facilis maxime id sit veritatis. Corrupti vitae veniam et distinctio nisi quasi accusantium. Consequatur rerum quod voluptatem et dolorum occaecati. Vitae molestiae facere alias labore necessitatibus. Deleniti laboriosam dolorem sit praesentium quis velit ratione ut. Ad libero ut modi molestiae quam quibusdam. Optio consequuntur voluptatem necessitatibus eos. Quisquam ipsa beatae minima soluta nostrum. Aut corrupti voluptatibus quis. Perferendis omnis qui est impedit ab odio.', 'https://images.pexels.com/photos/6270136/pexels-photo-6270136.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(7, 'Mariah Carey', 'Sunt ducimus temporibus non accusamus deserunt reprehenderit. Porro eos quibusdam delectus neque voluptates. Atque doloremque consequatur quia ut consequatur. Doloribus hic atque reiciendis necessitatibus. Voluptas soluta ratione libero sed unde sunt ipsum. In maiores totam ut earum. Et officia sit ut eos rerum. Laboriosam voluptatem fuga occaecati vel facilis consequatur suscipit. Voluptas qui laudantium sapiente illo. Aut perspiciatis non nulla quia ipsa. Qui veniam quisquam eum totam voluptas pariatur quam. Cumque et ut minus. Eum rem voluptas sunt sint rerum dolorem aut. Dolorem omnis molestias maxime rerum optio enim animi. Aut sint alias aut sint non. Officiis magni repellendus sit praesentium enim fugit omnis. Vel ipsam pariatur tempora cumque ea facilis magnam. Reprehenderit sed ducimus labore ut voluptates. Odio enim non quia totam quidem. Nobis et illum animi eum voluptas voluptas non. Labore similique aperiam non neque molestiae laboriosam eaque.', 'https://images.pexels.com/photos/2531728/pexels-photo-2531728.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(8, 'David Bowie', 'Consequuntur eos beatae tempore sed explicabo. Nesciunt qui sit magni tenetur et. Velit commodi iste aut impedit. Sequi aut libero quod voluptatem earum architecto. Voluptatem et tempora repellendus sunt eaque possimus. Sapiente nesciunt dolorem maxime repellat est. Facilis perspiciatis porro eum quidem labore aut. Rerum laboriosam modi cum maxime. Quod quia consequatur non. Repellendus rerum ullam non numquam placeat eius. Dolor maiores cum illo aliquam voluptas rem in. Qui eveniet facere nesciunt dolor consequatur incidunt. Consequatur quis eum non ut et. Sed est et sed odit. Aut aut praesentium repellendus consequatur eveniet. Facilis voluptas qui eos nostrum et sit. Quod est repellat et ut est ullam. Et in et sint qui tenetur ipsum qui. Voluptate dolorem repudiandae ea laudantium magnam. Ut nesciunt qui itaque ut aliquid porro inventore et. Sunt facere sed temporibus aspernatur nemo repellendus et. Voluptatem molestias consectetur eaque nobis beatae corporis et fugit.', 'https://images.pexels.com/photos/1460032/pexels-photo-1460032.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(9, 'Prince', 'Sit nulla iste dolorem hic iure et. Asperiores quis error assumenda et et esse est. Incidunt ad quod quidem sit cupiditate non odit. Quos in debitis voluptatem beatae. Repudiandae impedit illum praesentium incidunt sint. Suscipit molestiae saepe dolores fugiat. Molestiae vel non voluptas molestias. Aut sint asperiores dolorem non. Facilis omnis possimus rerum velit est provident. Odit culpa sunt minus. Molestias quo rerum sapiente nemo. Dignissimos voluptas architecto autem et odit officiis nulla perspiciatis. Sed repellat qui non nulla quis architecto. Debitis itaque repellat quis. Dolorem est possimus veniam eos autem. Quia nihil iure possimus cum ut. Omnis deserunt consequatur quis nihil nostrum mollitia aut magnam. Asperiores quo maxime voluptatem perferendis. Nostrum porro placeat et quaerat commodi quasi.', 'https://images.pexels.com/photos/3388899/pexels-photo-3388899.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(10, 'Benjamin Biolay', 'Et officiis repellat expedita illo omnis. Quidem quia natus sed unde earum beatae. Doloremque doloribus vitae qui ab. Delectus provident fugit dolor. Voluptatem et nisi consectetur dolor. Maxime id dolor possimus officia officia earum. Dolorum doloremque ut eligendi voluptas mollitia. Sed quo voluptatem in accusamus. Eos et ducimus vel porro enim architecto distinctio. Repellat sunt voluptatem sit velit. Exercitationem doloribus provident rem est. Deserunt culpa quos a dignissimos magni delectus quia ut. Facilis est accusantium autem placeat nihil. Cum beatae quis ipsam qui ut. Distinctio provident suscipit at iure ut. Molestias voluptate quaerat fugit iure voluptates. Odio eveniet qui et optio quaerat aliquid voluptatum. Suscipit quisquam quis omnis unde qui. Voluptas architecto natus consequatur harum est. Quia eveniet iusto optio. Autem aut expedita dolores maxime velit. Non ab dolor dolorem placeat distinctio.', 'https://images.pexels.com/photos/2231755/pexels-photo-2231755.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(11, 'Sabrina Carpenter', 'Velit veritatis et praesentium eum sed qui. Molestias qui exercitationem totam sed ab maxime omnis. Tempora totam recusandae possimus molestiae quod cupiditate dolore. Cum qui quae impedit et voluptatem. Ratione rerum quis amet tempore esse quo quam earum. Laudantium in officia incidunt placeat aliquam voluptas. Sit voluptatem ut aliquid tenetur error nihil consequatur. Facilis non est error minima. Odio ut reprehenderit maiores maxime ullam reprehenderit omnis. Quos consequatur nihil repudiandae dicta laborum rerum. Sit doloribus ut est. Et soluta tenetur suscipit reprehenderit voluptatem. Veritatis facere minima ex dolorem. Quia ullam deleniti enim impedit nihil. Ratione delectus distinctio vel eaque praesentium. Quo molestiae quos quam distinctio et ut. Voluptas voluptate nobis rerum ut ipsum quidem. Cum eum et minus aliquam aspernatur mollitia. Non delectus non nulla at. Vero rerum sed est iure quod possimus sed.', 'https://images.pexels.com/photos/2364381/pexels-photo-2364381.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(12, 'Stevie Wonder', 'Et id accusamus aspernatur facilis. Ad dolore similique sed vel voluptatum qui. Velit quis modi quas quidem. Odio ea voluptas dolorum consequuntur. Qui iusto error sit doloribus id. Repellendus possimus omnis aut earum. Fugiat maxime officia et cumque dolores nihil voluptas. Impedit error aut officia dolor. Aut sint sit est aliquid ex tenetur non ad. Qui velit voluptas quae quas non. Non autem qui adipisci voluptate et aut. Iusto repellendus fugiat unde voluptate sed quaerat. Et qui asperiores recusandae ut. Sapiente et atque dicta quia molestias. Assumenda dignissimos necessitatibus eveniet ipsam quaerat doloremque. Autem excepturi quos possimus et alias quos. Nobis ipsa et autem iure sit sed. Ut qui aperiam voluptatem enim veniam harum qui quasi. Laboriosam numquam possimus repellendus. Et non labore autem neque beatae sit.', 'https://images.pexels.com/photos/1150837/pexels-photo-1150837.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(13, 'John Lennon', 'Totam eos sunt dolor cumque placeat modi debitis. Ab omnis tenetur itaque deserunt iusto. Veritatis officia voluptatem voluptates vel cupiditate magni. Doloribus fuga quia in vero. Esse eius sed fugiat fugit. Voluptatibus tempora nobis sint illo qui nihil. Qui aut velit nulla occaecati porro. Reiciendis aliquid pariatur laboriosam voluptate molestias qui. In labore iusto totam sit at earum. Accusantium tenetur optio et. Delectus officiis voluptate aliquam hic minus incidunt magnam. Amet asperiores ducimus quia. Sed incidunt consequatur maxime facilis quod. Enim quis reprehenderit fugit eos. Quis excepturi inventore optio voluptate. Qui illo libero quo rerum. Dignissimos facere provident doloremque voluptas doloremque est aut eaque. Quasi voluptas id ducimus recusandae at. Saepe est quasi odio dolorum voluptatem. Consequuntur sunt eius incidunt necessitatibus aperiam non quasi dolores. Velit ut facilis dolores sed.', 'https://images.pexels.com/photos/417473/pexels-photo-417473.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(14, 'BTS', 'Qui iusto quia ex. Vel aspernatur quia deleniti ut harum velit tenetur. Recusandae ut ex sint harum est quisquam id fuga. Officia corrupti est tenetur assumenda vero atque. Aspernatur laborum minima est molestiae. Quia qui itaque deleniti repellat sed nesciunt. Cum aperiam omnis nobis nulla sunt id quia quas. Non dolore autem aspernatur beatae sapiente ut. Sequi ut rem voluptatem nihil et. Pariatur perspiciatis id neque excepturi molestias quibusdam magnam a. Eos aspernatur vitae earum unde beatae. Accusantium exercitationem sit dolorum corrupti. Sit quos aut autem. Explicabo amet commodi occaecati et delectus quia. Occaecati dolore quia quaerat ut quasi. Error voluptas rem est voluptas laboriosam et rerum velit. Doloremque voluptas labore vitae. Omnis quia qui voluptas itaque assumenda. Adipisci possimus iusto accusantium libero ut. Voluptatem maxime error et reiciendis vero. Sed pariatur deleniti error animi ipsum repellendus.', 'https://images.pexels.com/photos/7020687/pexels-photo-7020687.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(15, 'Taylor Swift', 'Quia omnis consequatur debitis pariatur. Illum nihil a fuga qui dolores vitae. Et et aut aut quam. Sunt molestias sed consequatur veniam quam sequi provident. Rerum ipsa sed sunt atque et. Nesciunt neque veniam quas voluptas sint rerum similique. Nostrum eligendi excepturi consequatur nihil voluptatem vel repudiandae. Adipisci eveniet sunt nesciunt eum sequi necessitatibus. Delectus quisquam vero impedit. Tempore nihil optio temporibus blanditiis omnis. Assumenda est sequi veritatis harum qui. Nemo unde tempora nihil itaque id. Nostrum itaque officia qui voluptas velit neque tempore. Sint odit odit iusto animi sed suscipit. Voluptatem illo ut eos eaque eius dolore. Ut sapiente nisi cupiditate ipsa et. Tempora qui illum culpa dolore optio debitis occaecati. Ad quis itaque neque voluptatibus tempore temporibus. Voluptatem est officia minima beatae. Laboriosam dolor quas alias ea.', 'https://images.pexels.com/photos/442540/pexels-photo-442540.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(16, 'Whitney Houston', 'Beatae veritatis sed voluptate fugit. Nemo distinctio molestiae quos qui quam aliquam deserunt. Sint exercitationem nostrum delectus. Ex aspernatur dolorum sunt ut maiores rerum non vel. Voluptatem molestiae aut nostrum ab inventore. Ea molestias laborum sunt aut non voluptatum deserunt. Vitae ut aspernatur fugit aspernatur ut ut id ut. Hic odit id iste delectus asperiores quos. Nulla sunt expedita exercitationem. Eaque est asperiores quibusdam et sint nostrum aut. Harum blanditiis suscipit ipsum provident repellendus laudantium aut. Vero eum ducimus enim aliquid. Quos unde eius delectus eos aut qui exercitationem. Quia et porro necessitatibus qui illum. Sit ut ab reprehenderit sed aut aut. Aliquid qui consequatur aliquid aut placeat. Nobis odit error illo. Et hic similique officia aliquam. Expedita qui sed tempore repudiandae illum labore error est. Dolorem expedita eum et et accusamus adipisci provident ipsum. Et repudiandae illo ut expedita.', 'https://images.pexels.com/photos/668278/pexels-photo-668278.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(17, 'Bob Marley', 'Et optio sit at dicta distinctio. Consequatur qui velit id in voluptatum molestiae. Ut aut harum ut in ut et. Soluta earum sit ex. Iure eum vel assumenda eum. Earum repellat saepe reprehenderit quaerat quo mollitia rerum. Eaque ad corporis consequuntur. Sit quo quia ea error voluptatem vitae ea. Quidem cumque magni necessitatibus voluptatem omnis quisquam harum. Et maxime autem laboriosam perspiciatis. Perspiciatis eos earum sit modi id. Fuga quia ut exercitationem aperiam sint quia. Quae vel quo eligendi ea iste esse explicabo. Et aut quibusdam quae aperiam magni error quam. Quia ad velit aut nostrum dolores ut. Natus ducimus sunt provident minima distinctio. Exercitationem magni dignissimos qui atque consequuntur. Nostrum inventore qui est magnam. Numquam ea aut voluptatibus quo atque placeat nulla. Mollitia esse delectus quo at. Minima autem et soluta magnam nihil eos. Corporis est sequi ut.', 'https://images.pexels.com/photos/1036399/pexels-photo-1036399.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(18, 'Harry Style', 'Quam amet voluptate veritatis molestias ut modi. Beatae sunt vitae et. Itaque rerum laboriosam et rerum cupiditate qui. Voluptates suscipit numquam vitae asperiores ut occaecati aliquam molestias. Esse nihil eligendi nemo. Quam est deserunt sed ad. Quia aut at iste voluptatibus molestiae molestias esse. Facere tempore quia quia labore accusamus. Ut similique vitae quibusdam iusto et recusandae. Voluptas similique dolores non atque repellendus. Omnis ipsa reprehenderit velit nobis. Aperiam et distinctio dicta rem voluptates. Adipisci magni necessitatibus nobis qui quo dolorem architecto quasi. Corporis accusamus ea quidem facere quo omnis. Neque voluptatum possimus dolores autem exercitationem aut et. Quia perspiciatis sint autem suscipit sed libero est.', 'https://images.pexels.com/photos/7090876/pexels-photo-7090876.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(19, 'Lady Gaga', 'Nihil reprehenderit est incidunt sint autem omnis explicabo. Porro qui laborum et autem cum voluptatem molestias. Dolores nobis quos enim enim. Ducimus sint voluptatem omnis iure natus. Dolorum fuga non veniam ea ea. Minima alias iure est vel. Consequuntur non harum officiis non aut blanditiis necessitatibus. Sit sed consequatur ut porro incidunt velit ipsa. Est quia perspiciatis ipsam qui iure labore incidunt molestiae. Debitis est laboriosam praesentium doloremque ut. Rerum nemo amet porro tempore omnis ut. Et inventore atque doloribus expedita omnis asperiores. Velit dolores rerum ut eaque quis consectetur. Dolore dolores voluptas repellendus in. Animi iste voluptatem repellat repellendus voluptas. Neque dolorum sint et sequi corrupti. Odio quia reprehenderit molestiae necessitatibus omnis. Voluptatum debitis aut inventore provident dolores non explicabo. Laborum voluptatem repudiandae veniam sit aut corporis rerum. Fuga iste mollitia est sed blanditiis.', 'https://images.pexels.com/photos/6670756/pexels-photo-6670756.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL),
(20, 'Angèle', 'At excepturi molestiae qui veniam ad aut voluptates vel. Voluptas vitae repellendus accusantium id et modi laudantium. Ullam repellat et quia corporis aliquid. Minus est veniam qui. Tenetur quo in magni. Consectetur a beatae amet soluta rerum quia. Vitae nobis est et facere dolore. Odio ut est debitis cum voluptas ut harum. Omnis amet facere velit et et. Quis aut consectetur odio hic optio et voluptatem. Omnis dolor vitae voluptatem nostrum. Non et et nemo modi sit ipsa. Repudiandae quo enim numquam nesciunt. Ex dolores porro sit repudiandae cumque velit. Quae accusamus quidem soluta temporibus. Accusantium eius distinctio labore nihil. Eaque assumenda ipsam perspiciatis consectetur et. Enim molestiae aliquam ducimus. Aliquam voluptatem molestias temporibus doloremque in. Quia et vel dolore deleniti cupiditate.', 'https://images.pexels.com/photos/7086304/pexels-photo-7086304.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2', 'https://www.youtube.com/embed/UvEwfQvVSGg?si=ZSXsQd_1zxTxu6jX', 'https://www.musicscreen.be/', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/', 'https://open.spotify.com/intl-fr/artist/78BWF7oHqaEiQAtmLgZAnm/', 'https://www.snapchat.com/', 'https://www.tiktok.com/', '2024-06-12 09:24:27', NULL);

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
(1, 'Pass 1 JOUR Plein Tarif le 23/08/2024', 100, '2024-06-12 09:24:27', NULL, '2024-08-23 00:00:00', '2024-08-23 00:00:00', 365, 'Plein Tarif', 24, 'Pass 1 JOUR'),
(2, 'Pass 1 JOUR Tarif Etudiant le 23/08/2024', 80, '2024-06-12 09:24:27', NULL, '2024-08-23 00:00:00', '2024-08-23 00:00:00', 441, 'Tarif Etudiant', 24, 'Pass 1 JOUR'),
(3, 'Pass 1 JOUR Tarif Enfant (-12 ans) le 23/08/2024', 0, '2024-06-12 09:24:27', NULL, '2024-08-23 00:00:00', '2024-08-23 00:00:00', 332, 'Tarif Enfant (-12 ans)', 24, 'Pass 1 JOUR'),
(4, 'Pass 1 JOUR Plein Tarif le 24/08/2024', 100, '2024-06-12 09:24:27', NULL, '2024-08-24 00:00:00', '2024-08-24 00:00:00', 152, 'Plein Tarif', 24, 'Pass 1 JOUR'),
(5, 'Pass 1 JOUR Tarif Etudiant le 24/08/2024', 80, '2024-06-12 09:24:27', NULL, '2024-08-24 00:00:00', '2024-08-24 00:00:00', 66, 'Tarif Etudiant', 24, 'Pass 1 JOUR'),
(6, 'Pass 1 JOUR Tarif Enfant (-12 ans) le 24/08/2024', 0, '2024-06-12 09:24:27', NULL, '2024-08-24 00:00:00', '2024-08-24 00:00:00', 195, 'Tarif Enfant (-12 ans)', 24, 'Pass 1 JOUR'),
(7, 'Pass 1 JOUR Plein Tarif le 25/08/2024', 100, '2024-06-12 09:24:27', NULL, '2024-08-25 00:00:00', '2024-08-25 00:00:00', 141, 'Plein Tarif', 24, 'Pass 1 JOUR'),
(8, 'Pass 1 JOUR Tarif Etudiant le 25/08/2024', 80, '2024-06-12 09:24:27', NULL, '2024-08-25 00:00:00', '2024-08-25 00:00:00', 455, 'Tarif Etudiant', 24, 'Pass 1 JOUR'),
(9, 'Pass 1 JOUR Tarif Enfant (-12 ans) le 25/08/2024', 0, '2024-06-12 09:24:27', NULL, '2024-08-25 00:00:00', '2024-08-25 00:00:00', 210, 'Tarif Enfant (-12 ans)', 24, 'Pass 1 JOUR'),
(10, 'Pass 2 JOURS Plein Tarif du 24/08/2024 au 25/08/2024', 180, '2024-06-12 09:24:27', NULL, '2024-08-24 00:00:00', '2024-08-25 00:00:00', 311, 'Plein Tarif', 48, 'Pass 2 JOURS'),
(11, 'Pass 2 JOURS Tarif Etudiant du 24/08/2024 au 25/08/2024', 150, '2024-06-12 09:24:27', NULL, '2024-08-24 00:00:00', '2024-08-25 00:00:00', 323, 'Tarif Etudiant', 48, 'Pass 2 JOURS'),
(12, 'Pass 2 JOURS Tarif Enfant (-12 ans) du 24/08/2024 au 25/08/2024', 0, '2024-06-12 09:24:27', NULL, '2024-08-24 00:00:00', '2024-08-25 00:00:00', 392, 'Tarif Enfant (-12 ans)', 48, 'Pass 2 JOURS'),
(13, 'Pass 3 JOURS Plein Tarif du 23/08/2024 au 25/08/2024', 250, '2024-06-12 09:24:27', NULL, '2024-08-23 00:00:00', '2024-08-25 00:00:00', 75, 'Plein Tarif', 72, 'Pass 3 JOURS'),
(14, 'Pass 3 JOURS Tarif Etudiant du 23/08/2024 au 25/08/2024', 200, '2024-06-12 09:24:27', NULL, '2024-08-23 00:00:00', '2024-08-25 00:00:00', 111, 'Tarif Etudiant', 72, 'Pass 3 JOURS'),
(15, 'Pass 3 JOURS Tarif Enfant (-12 ans) du 23/08/2024 au 25/08/2024', 0, '2024-06-12 09:24:27', NULL, '2024-08-23 00:00:00', '2024-08-25 00:00:00', 493, 'Tarif Enfant (-12 ans)', 72, 'Pass 3 JOURS');


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