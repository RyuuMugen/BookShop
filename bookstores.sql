-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 16, 2023 lúc 06:58 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bookstores`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date_start` varchar(12) NOT NULL,
  `date_end` varchar(12) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `trash` tinyint(1) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `date_start`, `date_end`, `status`, `trash`, `title`) VALUES
(5, 'banner1.jpg', '2023-05-04', '2023-05-18', 0, 0, 'scdscds'),
(10, 'banner2.jpg', '2023-05-09', '2023-05-19', 0, 0, 'new'),
(11, 'banner3.jpg', '2023-05-15', '2023-06-11', 0, 0, 'new');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `book_info`
--

CREATE TABLE `book_info` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `book_images` varchar(200) NOT NULL,
  `types` varchar(10) NOT NULL,
  `pages` int(10) NOT NULL,
  `trash` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `book_info`
--

INSERT INTO `book_info` (`id`, `book_id`, `book_images`, `types`, `pages`, `trash`) VALUES
(76, 17, 'Overlord_Volume_1_Chapter_1.jpg', 'cover', 0, 0),
(77, 17, 'AH1.jpg', 'cover', 0, 1),
(105, 17, 'Overlord_Volume_1_Chapter_3.jpg', 'cover', 0, 0),
(106, 17, 'Screenshot 2023-01-08 183909.png', 'read', 0, 0),
(109, 17, 'Screenshot 2023-03-11 203559.png', 'read', 0, 1),
(110, 19, 'download.jpg', 'cover', 0, 0),
(111, 19, '03.jpg', 'read', 3, 0),
(112, 19, '01.jpg', 'read', 4, 0),
(113, 19, '02.jpg', 'read', 5, 0),
(114, 20, 'im3.jpg', 'read', 1, 0),
(115, 20, 'im1.jpg', 'read', 2, 0),
(116, 20, 'im2.jpg', 'read', 3, 0),
(117, 17, 'Overlord_Volume_1_Chapter_5.jpg', 'cover', 0, 0),
(118, 17, 'Overlord_Volume_1_Chapter_4.jpg', 'cover', 0, 0),
(119, 17, 'Overlord_Volume_1_Chapter_2.jpg', 'cover', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `category_name`, `status`, `trash`, `created_at`) VALUES
(8, 'Tiểu Thuyết', 0, 0, '2022-05-04 21:33:38'),
(9, 'Chính trị – pháp luật', 0, 0, '2022-05-04 21:34:16'),
(10, 'Khoa học công nghệ', 0, 0, '2022-05-04 21:34:23'),
(11, 'Kinh tế', 0, 0, '2022-05-04 21:34:40'),
(12, 'Văn học nghệ thuật', 0, 0, '2022-05-04 21:34:52'),
(13, 'Văn hóa xã hội – Lịch sử', 0, 0, '2022-05-04 21:35:01'),
(14, 'Giáo trình', 0, 0, '2022-05-04 21:35:17'),
(15, 'Truyện tranh', 0, 0, '2022-05-04 21:35:30'),
(16, 'Tâm lý, tâm linh, tôn giáo', 0, 0, '2022-05-04 21:35:45'),
(17, 'Thiếu nhi', 0, 0, '2022-05-04 21:36:08'),
(18, 'Ngoại Ngữ', 0, 1, '2022-05-04 21:36:15'),
(19, 'Light Novel', 0, 0, '2022-05-04 21:36:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_description` text NOT NULL,
  `content` text NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `trash` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `short_description`, `content`, `avatar`, `created_at`, `status`, `trash`) VALUES
(7, 'Light Novel : \"Hiệp Sĩ Xương Trên Đường Du Hành Đến Thế Giới Khác\" chính thức ra mắt với độc giả tại Việt Nam', 'Light Novel ra mắt với độc giả tại Việt Nam', '<p>Hiệp Sĩ Xương Trên Đường Du Hành Đến Thế Giới Khác&nbsp;</p><p>Sau khi ngủ quên khi đang chơi một game MMORPG, \"Arc\" tỉnh dậy và thấy mình ở một thế giới xa lạ trong hình dáng của nhân vật trong game. Hình dáng này là của một hiệp sĩ, bên ngoài mặc giáp trụ nhưng bên trong lại là một bộ xương!? Nếu hình dạng này lộ ra thì sẽ bị nhầm tưởng là quái vật và trở thành đối tượng bị truy sát mất! Arc quyết định sẽ trở thành một lính đánh thuê không nổi bật, nhưng anh đã bắt gặp một chuyện không hay. Giải cứu những người đẹp quý tộc bị tấn công! Tiêu diệt quái vật mạnh đến mức phải huy động một đội quân!! Hơn thế còn triệt hạ...!? Và, nhờ những kỹ năng đã rèn luyện trong game mà thành công giải quyết nhóm đạo tặc. Một ngày nọ, anh được một Dark Elf xinh đẹp tên Ariane thuê và góp phần vào công cuộc giải cứu những Elf bị giam cầm. Tuy nhiên, đằng sau đó là những âm mưu của hoàng tộc...!? Câu chuyện kỳ ảo về Hiệp sĩ xương mạnh nhất vô thức \"cải cách lại thế giới\" bắt đầu!!</p>', 'a14168d0bfc3099b_ad6fcc5373b42db5_13092816427815313185710.jpg', '2022-05-06 14:50:07', 0, 0),
(8, 'Du học sinh Việt tại Nhật lập tủ sách tiếng Việt, lấy tiền làm thiện nguyện', 'TTO - Không chỉ tìm kiếm, tạo dựng không gian trao đổi sách tiếng Việt, các bạn trẻ còn thực hiện nhiều chương trình quyên góp cho các hoạt động thiện nguyện trong nước.', '<p>Chuỗi hoạt động \"Một cuốn sách, vạn yêu thương\" vừa được Hội Sinh viên và thanh niên Việt Nam tại Nhật (VYSA) khởi động mùa thứ 3.<br>&nbsp;</p><p>Trong dự án, các bạn tình nguyện viên của VYSA thu thập sách, truyện, lập thành một tủ sách tiếng Việt cho cộng đồng tại Tokyo (Nhật). Bạn trẻ Việt trong thành phố sẽ có nơi để đọc, trao đổi sách viết bằng tiếng mẹ đẻ ngay trên đất Nhật.</p><p>Bên cạnh đó, định kỳ 2 lần mỗi tháng, các thành viên trong hội sẽ tổ chức những sự kiện thú vị liên quan đến sách, các buổi chia sẻ về kỹ năng mềm, kinh nghiệm sống và học tập nơi xứ người. Từ đó, dự án tạo không gian kết nối cho các sinh viên Việt đang học tập tại Nhật, đặc biệt những bạn có cùng sở thích đọc.</p><p>Nguyễn Đình Nam - chủ tịch Hội Sinh viên và thanh niên Việt Nam tại Nhật - cho biết không dừng lại ở một tủ sách, dự án còn tổ chức những buổi bán sách gây quỹ với mức giá tùy tâm người mua. Toàn bộ số tiền thu được từ việc bán sách sẽ được gửi về các dự án thiện nguyện tại Việt Nam, giúp đỡ những em nhỏ khó khăn.</p><p>Chẳng hạn trong mùa 1, dự án đã kết hợp cùng tổ chức \"Khăn ấm cho em\", góp sức xây dựng lại lớp học chữ Nôm Dao cho thầy trò nghệ nhân ưu tú Tẩn Vần Siệu tại Sa Pa, Lào Cai.</p><p>Mùa 2, số tiền được các du học sinh quyên góp cho công trình nước sạch tại Trường tiểu học La Văn Cầu, huyện Đắk Glong, Đắk Nông.</p><p>Trong mùa 3 năm nay, khoản tiền thu được sẽ được nhóm góp vào chương trình \"Nhịp tim Việt Nam\", hỗ trợ chi phí phẫu thuật tim cho trẻ em nghèo dưới 18 tuổi trong nước.<br>&nbsp;</p><p>Nguyễn Kim Chuẩn - trưởng ban điều hành dự án \"Một cuốn sách, vạn yêu thương\" - chia sẻ trong quá trình vận hành, chuyện tìm một địa điểm miễn phí cho tiệm sách ngay tại trung tâm Tokyo rất khó khăn.</p><p>Các tình nguyện viên phải rong ruổi khắp nơi hỏi xin các tổ chức, doanh nghiệp trong thành phố mới có đơn vị chịu hỗ trợ một nơi để đặt tiệm sách. Không gian đủ rộng để các bạn không chỉ đến lựa mua sách mà còn thuận tiện cho gặp gỡ và chia sẻ…</p><p>Kim Chuẩn cho biết qua 3 năm, dự án đã thu hút sự chú ý của nhiều người bản địa, người nước ngoài sinh sống tại Tokyo. Dự án nhận được rất nhiều đầu sách đa dạng về thể loại, ngoài sách tiếng Việt còn có cả sách tiếng Anh, tiếng Nhật…</p><p>\"Chúng mình cố gắng mang tiệm sách đến gần hơn cộng đồng người Việt Nam, Nhật và bạn bè quốc tế. Chúng mình cũng luôn tin rằng từng quyển sách được cho đi sẽ là vạn yêu thương đến người nhận cũng như các em nhỏ ở Việt\", Chuẩn nói.</p>', 'tin1.png', '2022-05-26 12:16:48', 0, 0),
(9, 'Công bố 7 tác phẩm đoạt giải thưởng Văn học tuổi 20 lần 7', 'TTO - Ban tổ chức giải thưởng Văn học tuổi 20 lần 7 (2019 - 2022) vừa công bố 7 tác phẩm đoạt giải mặc dù chưa công bố thứ hạng cụ thể cho từng tác phẩm.', '<p>Đây là 7 tác phẩm cuối cùng vượt qua 511 tác phẩm tham dự giải thưởng lần này, bao gồm: <i>Bảy bảy bốn chín</i> (của Hoàng Công Danh), <i>Chopin biến mất</i> (Hiền Trang), <i>Chuồng cọp trên cao</i> (Nguyễn Thu Hằng), <i>Có thú dữ trong thành phố</i> (Nguyên Nguyên), <i>Nửa lời chưa nói</i> (Duy Ân), <i>Vệt sáng của bụi</i> (Lê Quang Trạng), <i>Vụn ký ức</i> (Yang Phan).<br>&nbsp;</p><p>Trong đó, các tác phẩm <i>Bảy bảy bốn chín, Chopin biến mất </i>và <i>Vụn ký ức</i> là những truyện dài bên cạnh 4 tập truyện ngắn cho thấy đội ngũ tác giả Văn học tuổi 20 lần này thuận tay ở cả dung lượng truyện ngắn và dài. Vấn đề còn lại là đề tài và chất văn trong mỗi tác phẩm.</p><p>Có thể thấy rõ cảm hứng về cái nhìn của người trẻ đối với cuộc sống hôm nay qua từng tác phẩm đoạt giải. Nói như ông Nguyễn Thành Nam - tổng biên tập Nhà xuất bản Trẻ, thành viên ban tổ chức - các tác phẩm đoạt giải đều đã phản ánh được phần lớn cuộc sống và quan tâm của tuổi 20 hôm nay.</p><p>&nbsp;</p><p>\"Đó là cuộc sống khi đi du học hay sinh sống nơi đất khách, phải nỗ lực vươn lên. Đó là trách nhiệm của người trẻ trước cuộc sống và xã hội. Đó là vấn đề môi trường, chữa lành tâm lý. Đó là những thân phận dưới đáy xã hội.</p><p>Đó là những áp lực của cuộc sống công sở, hay cuộc mưu sinh nơi thành thị. Hay đó chính là văn chương, ngôn ngữ và nghệ thuật được chính các tác giả chọn làm đề tài. Tất cả được các tác giả thể hiện qua lối viết khá đa dạng, chỉn chu, mới mẻ và hiện đại\".</p><p>Giải thưởng Văn học tuổi 20 lần 7 (2019 - 2022) do Nhà xuất bản Trẻ tổ chức. Ban giám khảo chung khảo gồm: PGS.TS Ngô Văn Giá, PGS.TS Nguyễn Thành Thi, nhà báo Thúy Nga, nhà văn Nguyễn Ngọc Tư và nhà văn Phan Hồn Nhiên. Lễ trao giải sẽ diễn ra tại TP.HCM vào ngày 24-5 tới.</p>', 'tin2.png', '2022-05-26 12:50:06', 0, 0),
(10, 'NHỮNG THAY ĐỔI LỚN CỦA KONOSUBA SEASON 2 SO VỚI LIGHT NOVEL', 'Chứa đựng những cảnh phụ và gợi ý về những diễn biến trong tương lai, người hâm mộ của anime sẽ không muốn bỏ qua những tập này của bộ light novel nổi tiếng.', '<p>Gần nửa thập kỷ nay , KonoSuba: God’s Blessing on This Wonderful World! đã tận hưởng vị trí của nó như một trong những người vĩ đại nhất mọi thời đại. Nhờ sự cân bằng giữa hài hước tự ti, xây dựng thế giới hấp dẫn và hành động ly kỳ, loạt phim này đứng trên nhiều giải đấu cùng thời với nó . Tất nhiên, một phần của điều làm cho bộ anime trở nên tỏa sáng như vậy là sự chuyển thể tuyệt vời của nó từ nguyên tác của Natsume Akatsuki</p><p>Tuy nhiên, với số tập khiêm tốn, chương trình chỉ có thể chuyển thể một lượng nhất định nội dung đã viết. Phần 2 bắt đầu trong tập 3 và 4 của bộ light novel và đưa người xem vượt qua các bức tường của khu vực dành cho người mới bắt đầu để khám phá thế giới rộng lớn. Đối với những ai mới chỉ xem anime, nhưng mong muốn biết thêm về nó, đây là bộ sưu tập những thay đổi lớn nhất giữa anime chuyển thể và light novel</p><p>Thời điểm tồi tệ nhất của Kazuma dễ dàng xảy ra khi anh ấy phải ngồi tù vì nghi ngờ có liên kết với Ma Vương. Trong khi đóng vai trò quan trọng trong việc phòng thủ chống lại Mobile Fortress Destroyer, sự lãnh đạo của anh đã dẫn đến việc phá hủy dinh thự của một lãnh chúa địa phương. Kết quả là, người anh hùng sẽ được đưa vào bờ vực, bị thẩm vấn và đưa ra xét xử với bản án tử hình có thể xảy ra trên đầu. Trong anime, những ngày trước khi xét xử anh ta chứng kiến ​​anh ta bị mắc kẹt trong phòng giam một mình trong khi Aqua, Megumin và Darkness cố gắng phá anh ta bằng một số kế hoạch khá đáng ngờ.</p><p>Cuốn tiểu thuyết mở rộng chi tiết về thời gian Kazuma ở trong tù, đi xa hơn là để cho anh ta một người bạn cùng phòng. Dust, bạn tâm giao thường xuyên của Kazuma, và là một trong số ít những nhà thám hiểm trong thị trấn có danh tiếng thậm chí còn tệ hơn anh ta, từng là bạn thân của Kazuma trong cốt truyện. Bụi cố tình vào tù, gây náo loạn say sưa đòi bữa ăn, chỗ ngủ miễn phí. Có vẻ như anh ấy đã rất thích chỗ ở một cách đáng ngạc nhiên vì anh ấy thậm chí còn ngủ nhờ chiến lược đánh lạc hướng dựa trên Vụ nổ của Megumin.</p>', 'tin3.png', '2022-05-26 12:53:03', 0, 0),
(11, 'NOVEL JUJUTSU KAISEN 0 SẼ PHÁT HÀNH VÀO THÁNG 12', 'Bộ phim Jujutsu Kaisen 0 sắp ra mắt sẽ được chuyển thể từ tiểu thuyết chính thức của Ballad Kitaguni. Cuốn tiểu thuyết được phát hành vào ngày 24 tháng 12 tại Nhật Bản, cùng ngày với buổi ra mắt bộ phim.', '<p>Cuốn tiểu thuyết sẽ dựa trên kịch bản của bộ phim của Hiroshi Seko, với Gege Akutami (mangaka) được liệt kê là tác giả gốc. Tác giả Kitaguni trước đây đã từng làm <a href=\"https://otakugo.net/jujutsu-kaisen\">light novel Jujutsu Kaisen</a>: Iku Natsu to Kaeru Aki . Tiểu thuyết Jujutsu Kaisen sẽ có giá 836 yên (khoảng 7,5 USD) và có 256 trang.</p><p><a href=\"https://otakugo.net/jujutsu-kaisen-0-movie-tiet-lo-hinh-anh-nhan-vat-moi-100739.og\">Movie Jujutsu Kaisen 0</a> gần đây đã tiết lộ trailer đầu tiên và sẽ chuyển thể tập truyện tranh tiền truyện tập trung vào Yuta Okkotsu. Ngoài movie, TV anime của MAPPA được phát sóng từ mùa Thu năm 2020 đến mùa Đông năm 2021.</p><p><strong>Jujutsu Kaisen 0</strong></p><p>Manga Jujutsu Kaisen 0 của tác giả Gege Akutami có 4 chương, được biên soạn thành 1 tập. Bộ truyện kéo dài từ ngày 28 tháng 4 năm 2017 đến ngày 28 tháng 7 năm 2017, trong khi tập truyện ra mắt vào năm 2018. Bộ truyện ban đầu có tựa đề là Trường kỹ thuật lời nguyền Tokyo Metropolitan . Viz Media đã cấp phép cho manga bằng tiếng Anh.</p><p>Trang web Jump-J-Books liệt kê cuốn tiểu thuyết cũng có sẵn bìa:</p>', 'tin4.png', '2022-05-26 12:59:31', 0, 0),
(12, 'NOVEL THE DEVIL IS A PART TIMER XÁC NHẬN RA MẮT PHẦN TIẾP THEO', 'Vào tháng 8 năm 2020, Satoshi Wagahara đã ra mắt phân cảnh cuối cùng của Hataraku Mao-Sama trong phạm vi công cộng. Nhưng thật kinh ngạc, tác giả đã phải đối mặt với những lời dọa giết vì con đường mà anh ta đi cùng với cái kết.', '<p>Hai năm sau sự cố này, cuối cùng người hâm mộ cũng có thông báo mới từ tác giả. The Devil Is A Part Timer Novel Sequel đã được xác nhận. Vì vậy, đây là tất cả mọi thứ mà bạn cần biết về dự án này.</p><p>The Devil Is A Part Timer, hay còn gọi là Hataraku Mao-Sama là một bộ light novel gốc ra mắt vào năm 2011. Do Satoshi Wagahara sáng tác, cuốn tiểu thuyết này được minh họa bởi 029. Loạt phim này được tiếp nối bởi ba lần phát hành manga thành công và một mùa anime. Hiện tại, phần tiếp theo của tiểu thuyết này và phần tiếp theo của anime đang được thực hiện.</p><p>Tin tức đến trực tiếp từ các trang truyền thông xã hội chính thức của tác giả Satoshi Waghara. Lên Twitter, tác giả viết rằng cuốn tiểu thuyết gốc không phải là kết thúc cuối cùng của câu chuyện. Thay vào đó, anh đã lên kế hoạch cho phần tiếp theo trong một thời gian dài. Cũng trong chuỗi này, anh ấy đã lên bục để công bố chính thức về dự án. Do đó, The Devil Is A Part Timer Novel Sequel đã được thực hiện. Cùng với điều này, người tạo cũng xác nhận cửa sổ phát hành cuối cùng cho dự án. Hãy tiếp tục đọc thêm để tìm hiểu khi nào thì dự án sẽ trở nên nổi bật.</p><p>Tên của dự án mới này là Hataraku Maou-sama – Okawari . Phần viết sẽ do Satoshi Waghara thực hiện. Hơn nữa, 029 trong người minh họa trên dự án. Cùng với đó, chi tiết cốt truyện của liên doanh cũng được tiết lộ.</p><h3><strong>Novel nói về điều gì?</strong></h3><p>Satoshi đã đề cập trong thông báo rằng phần tiếp theo kết hợp chặt chẽ với câu chuyện về dự án đầu tiên của anh ấy. Ngay khi tập cuối cùng của cuốn tiểu thuyết ra mắt vào năm 2020, dự án này vẫn đang được tiếp tục phát triển. Câu chuyện chọn lọc từ cuốn tiểu thuyết cuối cùng. Một lập luận mà người hâm mộ đang bàn tán trên internet liên quan đến sự lựa chọn của tác giả. Sau cái kết nặng nề được đưa ra cho câu chuyện chính, tác giả đã phải nhận một số lời dọa giết cho phần kết.</p><p>Toàn bộ cuộc tranh luận xoay quanh ý kiến ​​bác bỏ con đường hậu cung. Vì vậy, đây có thể là một trong những lý do khiến cuốn tiểu thuyết mới trở lại với bàn ăn.</p><h3><strong>Phần tiếp theo The Devil Is A Part Timer: Chi tiết phát hành</strong></h3><p>Hiện tại, ngày ra mắt thích hợp của tiểu thuyết phần tiếp theo vẫn chưa được công bố. Nhưng những người hâm mộ có một cửa sổ phát hành cho dự án. Vì vậy, Hataraku Maou-sama – Okawari , The Devil Is A Part Timer Novel Sequel sẽ phát hành vào tháng 7 năm 2022. Công ty xuất bản tại nhà của manga là Yen Press. Vì vậy, dự kiến ​​rằng công ty này sẽ trở lại xuất bản một lần nữa.</p>', 'tin6.png', '2022-05-27 09:45:23', 0, 0),
(13, 'LIGHT NOVEL 86 -EIGHTY SIX- VOLUME 11 BỊ HOÃN DO TÁC GIẢ SỨC KHỎE KÉM', 'Trên trang web chính thức của Dengeki Bunko , đã thông báo rằng light novel 86 -Eighty Six- Volume 11 của Asato Asato sẽ bị hoãn chiếu do tác giả sức khỏe không tốt. Mặc dù tập mới nhất được cho là sẽ phát hành vào tháng 12 này, nhưng hiện tại nó đã được dời đến tháng 2 năm 2022. Thông báo viết:', '<p>Cảm ơn bạn rất nhiều vì đã tiếp tục ủng hộ Dengeki Bunko. Chúng tôi rất tiếc phải thông báo rằng “86: Eighty-Six – Ep. 11 Dies Passionis ”sẽ bị trì hoãn. Cuốn sách dự kiến ​​xuất bản vào tháng 12 năm 2021, nhưng đã bị hoãn lại do tác giả sức khỏe không tốt. Ngày phát hành mới dự kiến ​​vào tháng 2 năm 2022. Chúng tôi thành thật xin lỗi độc giả của chúng tôi, những người đã chờ đợi bản phát hành mới này. Chúng tôi rất lấy làm tiếc vì sự ra mắt đột ngột bị hoãn lại.</p><p>&nbsp;</p><p>Trong khi đó, Crunchyroll phát trực tuyến anime và họ mô tả câu chuyện:</p><blockquote><p><i>Được gọi là “Juggernaut”, đây là những máy bay không người lái chiến đấu được phát triển bởi Cộng hòa San Magnolia để đáp trả các cuộc tấn công của máy bay không người lái tự động của Đế chế Giad láng giềng, “ Quân đoàn ”. Nhưng chúng chỉ không có người lái trên danh nghĩa. Trên thực tế, chúng được điều khiển bởi Tám mươi sáu người – những người được coi là kém hơn con người và được coi như những công cụ đơn thuần. Quyết tâm đạt được mục đích bí ẩn của riêng mình, Shin, đội trưởng của Spearhead Squadron, bao gồm tám mươi sáu người, tiếp tục chiến đấu trong một cuộc chiến vô vọng trên một chiến trường nơi chỉ có cái chết đang chờ đợi anh ta.</i></p></blockquote><p>Chúng tôi luôn buồn khi biết về sức khỏe kém của một tác giả, và chúng tôi cầu chúc cho Asato Asato sớm khỏe lại và thành công trong tương lai với 86 -Eighty Six-!</p>', 'tin7.png', '2022-05-27 10:00:09', 0, 0),
(14, '‘Bà đỡ’ cho những tác phẩm văn học', 'Dòng sách văn học có những đặc thù riêng, đòi hỏi biên tập viên phải chú ý đến cốt truyện, văn phong và ý đồ nghệ thuật mà tác giả cài cắm trong bản thảo.', '<h3><strong>Tiêu chí chọn bản thảo</strong></h3><p>Với 14 năm trong nghề, thay vì làm việc trực tiếp với các tác giả và bản thảo gốc, biên tập viên Thùy Linh gắn bó chủ yếu với bản dịch và dịch giả.</p><p>Xét về mặt kỹ thuật, biên tập viên sách văn học ngoài đảm bảo sự chỉn chu, chuẩn mực cho bản thảo, phải đủ nhạy cảm để tôn trọng phong cách sáng tạo, đôi khi là sự phá cách của tác giả cả về ý tưởng lẫn văn phong. Chẳng hạn như dụng ý văn chương khi tác giả viết thường các chữ mà theo quy định chính tả phải viết hoa, hoặc cố ý ngắt dòng giữa trang…</p><p>“Độc giả của dòng sách phi hư cấu thường đọc để lấy thông tin, kiến thức. Nhưng bạn đọc của mảng sách văn học còn muốn được thưởng thức. Đó cũng là đặc thù của dòng sách này”, chị Thùy Linh nói.</p><p>Theo biên tập viên Công ty sách Nhã Nam, người làm công việc biên tập phải đứng ở giữa, dung hòa các yêu cầu từ nhiều phía (nhà xuất bản, tác giả, dịch giả, độc giả), đặc biệt là đối với các tác phẩm có nhiều phá cách mới mẻ, lạ lẫm trong một thời điểm nào đó.</p><p>Do mang những đặc thù riêng, việc khai thác bản thảo văn học cũng cần có tiêu chí nhất định. Với chị Thùy Linh, nếu là câu chuyện, trước hết nó phải thuyết phục, logic, có cái kết bất ngờ (hoặc ít nhất là hợp lý) và cách viết hấp dẫn.</p><p>“Còn với các tác phẩm có hàm lượng văn chương cao hơn, không đề cao yếu tố câu chuyện, thì nó phải mang sự độc đáo. Đôi khi chúng tôi phải lựa chọn bản thảo dựa trên trực giác mà không có tiêu chuẩn cụ thể nào”, biên tập viên Thùy Linh cho hay.</p><p>Mỗi đơn vị xuất bản đều có định hướng riêng khi lựa chọn bản thảo. Sở hữu thế mạnh về tiểu thuyết lịch sử, truyện ngắn đương đại, Nhà xuất bản Phụ nữ Việt Nam nhận được nhiều bản thảo gửi về trong một tháng.</p><p>“Có tháng, chúng tôi nhận được hơn 20 bản thảo. Công việc của biên tập viên là phân loại theo đề tài, đọc và phản hồi lại với tác giả. Đối với đơn vị chúng tôi, những bản thảo thóa mạ hình tượng phụ nữ, mang tính cá nhân, đề cao cái tôi quá mức sẽ không được chấp nhận. Văn chương cần tìm được sự đồng cảm từ số đông”, chị Nguyễn Thu Giang - biên tập viên mảng sách văn học trong nước, Nhà xuất bản Phụ nữ Việt Nam - cho biết.</p><p>Khi đọc bản thảo văn chương, theo chị Thu Giang, người biên tập còn phải lưu ý cả về mặt tư tưởng, chính trị, văn hóa, để đảm bảo tác phẩm không chứa chi tiết nhạy cảm.</p><h3><strong>Công việc thầm lặng</strong></h3><p>Công việc biên tập sách văn học liên quan nhiều đến cảm hứng sáng tác của các nhà văn. Nó mang tính chất tự do, không khuôn phép như những dòng sách về khoa học, kỹ năng. Khi làm việc với các nhà văn, nhà thơ, khó khăn đối với chị Thu Giang là thuyết phục tác giả chỉnh sửa “đứa con tinh thần” của họ.</p><p>“Văn mình - vợ người” là câu nói khá chính xác khi nhận xét về một tác phẩm văn chương. Sẽ rất khó để thuyết phục nhà văn, nhà thơ chỉnh sửa những ý mà đôi khi họ cho là hay nhất và có dụng ý nghệ thuật.</p><p>Làm “bà đỡ” cho những tác phẩm văn chương như <i>Phật trong hẻm nhỏ</i> (Huỳnh Trọng Khang), <i>Người khách kỳ dị</i> (Ma Văn Kháng), <i>Người bán linh hồn</i> (Trần Thùy Mai)… chị Thu Giang cho rằng bản thân mình chỉ là người đứng ở hậu trường, nhưng luôn “đồng cam, cộng khổ” với tác giả trước sự đón nhận của bạn đọc.</p><p>“Trong quá trình trao đổi với tác giả, tôi học hỏi được nhiều điều hơn về cuộc đời, con người và trải nghiệm của những nhân vật khác nhau. Văn chương luôn có sự đa dạng trong cách viết, nên khi tiếp cận các bản thảo khác nhau, tôi thấy thú vị vì cùng viết về một đề tài nhưng mỗi người sẽ có cách khai thác riêng”, biên tập viên Thu Giang chia sẻ.</p><p>Trong khi đó, niềm vui với biên tập viên Thùy Linh (Nhã Nam) khi làm nghề trước hết là được đọc nhiều câu chuyện và đóng góp cho sự ra đời của một sản phẩm mang tính sáng tạo, từ khi nó còn ở dạng bản thảo thô đến khi trở thành cuốn sách hoàn chỉnh, đẹp đẽ trong các hiệu sách.</p><p>“Tất cả khó khăn sẽ được bù đắp bằng sự đón nhận từ độc giả và nếu may mắn thì của cả giới phê bình. Dòng sách văn học dịch thường không bán được số lượng lớn, nhưng được tham dự một phần nào đó vào thế giới hư cấu đã là một điều rất thú vị”, chị Thùy Linh bày tỏ.</p><p>Từng biên tập nhiều dòng sách khác nhau, trong đó có mảng văn học, chị Đàm Thị Ly - Phó trưởng Ban biên tập, Nhà xuất bản Hà Nội - luôn tự hỏi bản thân: Bản thảo văn chương này khi được xuất bản thành sách sẽ mang giá trị gì tới bạn đọc?</p><p>Theo chị Ly, giá trị, thông điệp của bản thảo là yếu tố tiên quyết trong khâu lựa chọn để biên tập. Cách khai thác đề tài tùy thuộc hướng tiếp cận và văn phong của mỗi nhà văn. Đề tài đó không cần quá mới mẻ, chỉ cần có cách viết mới mẻ, lôi cuốn, thì sẽ trở thành tác phẩm hay.</p><p>“Dù ở thể loại truyện ngắn hay tiểu thuyết, tác phẩm đó cũng phải truyền tải được giá trị nhân văn tốt đẹp đến độc giả. Khi khép cuốn sách, những gì đọng lại trong lòng độc giả sẽ là điều quyết định tác phẩm đó có thành công hay không”, chị Ly nói thêm.</p>', 'cat.jpg', '2022-05-28 08:06:54', 0, 0),
(17, 'dvfds', 'dscsdc', '<p>sdfsdf</p>', 'car18.jpg', '2023-05-06 09:50:29', 0, 1),
(18, 'v sv ', 'dvdsv', '<p>dsvds</p>', 'infinity-logo-symbol-template-icons-vector-business-sign-modern-concept-design-creative-element-shape-emblem-loop-infinite-170504485.jpg', '2023-05-10 04:29:08', 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `phone` int(10) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `total` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `order_date` datetime DEFAULT current_timestamp(),
  `delivered` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `name`, `phone`, `address`, `total`, `note`, `order_date`, `delivered`) VALUES
(48, 2, 'User', 12332, 'e', 871000, '11', '2022-05-07 16:49:33', 2),
(50, 11, 'Đường Ngọc Hà', 122939341, 'Bắc Giang', 246000, 'Thêm hai quả đấm', '2022-05-07 22:16:40', 0),
(54, 10, 'Nguyễn Văn An', 0, '', 123000, '', '2022-05-26 14:03:54', 0),
(61, 11, 'Đường Ngọc Hà', 122939341, 'Bắc Giang', 123000, '11', '2022-05-28 17:16:10', 1),
(62, 11, 'Đường Ngọc Hà', 12332, 'test', 240000, 'sss', '2022-05-28 17:17:21', 1),
(63, 1, 'Phạm Toàn Thắng', 12332, 'Bắc Giang', 60000, '', '2022-05-29 16:47:09', 2),
(64, 1, 'Phạm Toàn Thắng', 122939341, 'Bắc Giang', 400000, '', '2022-05-31 14:14:29', 2),
(65, 14, 'Nguyễn Văn A', 122939341, 'Quảng Ninh', 348000, '', '2022-06-01 09:29:47', 0),
(66, 1, 'Phạm Toàn Thắng', 122939341, 'Bắc Giang', 116000, '', '2022-06-01 09:31:59', 0),
(67, 1, 'Phạm Toàn Thắng', 769234431, 'd', 100000, 'sách', '2023-05-05 13:05:27', 0),
(69, 1, 'Phạm Toàn Thắng', 769234431, 'd', 100000, 'sách', '2023-05-05 20:01:52', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `product_price`, `total`) VALUES
(36, 48, 28, 2, 120000, 240000),
(37, 48, 30, 1, 120000, 120000),
(38, 48, 29, 1, 124000, 124000),
(39, 48, 27, 1, 123000, 123000),
(40, 48, 26, 1, 152000, 152000),
(41, 48, 25, 1, 112000, 112000),
(44, 50, 27, 2, 123000, 246000),
(48, 54, 27, 1, 123000, 123000),
(57, 61, 27, 1, 123000, 123000),
(58, 62, 28, 2, 120000, 240000),
(59, 63, 45, 1, 60000, 60000),
(60, 64, 49, 1, 400000, 400000),
(61, 65, 50, 3, 116000, 348000),
(62, 66, 50, 1, 116000, 116000),
(63, 67, 17, 1, 100000, 100000),
(64, 69, 17, 1, 100000, 100000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sale` tinyint(1) DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `price` float NOT NULL,
  `saleprice` float NOT NULL,
  `product_detail` text NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `trash` tinyint(1) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `publisher`, `author`, `category_id`, `sale`, `image`, `quantity`, `price`, `saleprice`, `product_detail`, `created_at`, `trash`, `status`) VALUES
(17, 'OVERLORD - Tập 1 - The Undead King', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 0, 'u2-adb94b86-5d78-4921-ad8e-87a8d811a7a2.jpg', 93, 100000, 0, '<p>Chuyện xảy ra vào năm 2138, thời đại công nghệ thực tế ảo phát triển đến đỉnh cao, giúp người chơi game trải nghiệm thế giới ảo theo một cách chân thực nhất. Trong số game ấy có một trò đỉnh cao. Trong trò ấy có một guild đỉnh cao. Trong guild ấy có một thủ lĩnh gắn bó đỉnh cao. Đồng đội dần dần rời</p>', '2023-05-05 05:04:05', 0, 0),
(18, 'OVERLORD - Tập 2 - The Dark Warrior', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 0, '705.jpg', 100, 108000, 0, '<p>Vào ngày hoạt động cuối cùng của game YGGDRASIL, do hiện tượng bí ẩn nào đó, một người chơi là Momonga trong tạo hình nhân vật bộ xương tự nhiên bị dịch chuyển tới một thế giới xa lạ. Đã tám ngày trôi qua. Suốt tám ngày này, Momonga, giờ đổi tên thành Ainz, đã thăm thú toàn bộ lăng mộ Nazarick, xem xét tình hình các thuộc hạ của mình. Sau khi xác nhận rằng nơi đây chẳng khác mấy so với thế giới game, Ainz quyết định đã đến lúc tiến hành bước tiếp theo, là mở rộng phạm vi khám phá và chinh phục. Dẫn theo một hầu gái hộ vệ, anh tìm đến thành phố trong vai trò người chuyên diệt quái, mà người ta vẫn gọi là “mạo hiểm giả”. Không biết chữ, không có tiền, tìm việc làm, cẩn trọng thăm dò môi trường mới, gặp gỡ nhiều nhân vật thuộc nhiều thành phần, đi săn một sinh vật pháp thuật hùng mạnh, và đáng kể nhất là bắt đầu công khai bộc lộ tài năng… Ainz cứ thế đặt chân vào một chuyến phiêu lưu mới.&nbsp;</p>', '2022-05-29 10:30:47', 0, 0),
(19, 'OVERLORD - Tập 3 - The Bloody Valkyrie', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 0, 'book_1294.jpg', 100, 110700, 0, '<p>Giới thiệu sách: OVERLORD - Tập 3: Valkyrie Khát Máu Mở đầu cho một hành trình huy hoàng, thông thường sẽ có hai phong cách. Một, nhân vật chính là người bình thường, không biết gì cả, lơ ngơ đơn thuần rơi vào một thế giới xa lạ, đi đâu cũng đụng kẻ mạnh và va vấp với muôn vàn thử thách, vừa run sợ vừa dũng cảm tiến bước và trưởng thành. Hai, nhân vật chính là kẻ mạnh có một không hai trên đời, xuất phát từ vạch đích, không bao giờ phải phấn đấu vì vừa hiện ra đã mạnh sẵn rồi, chỉ có đi gặt hái thất bại và sinh mạng của đối thủ mà thôi. Nếu như có ai đó, đem cả hai phong cách này hòa làm một thì sao? Thì sẽ có câu chuyện như OVERLORD vậy… Sau khi game anh từng chơi bỗng biến thành một thế giới khác, Suzuki Satoru hay Momonga hay Ainz Ooal Gown cùng các bề tôi ở Nazarick bắt đầu con đường vừa dò tìm vừa chinh phục không gian vừa quen vừa lạ này. Kế hoạch đang tiến triển vô cùng thuận lợi thì một yếu tố cản trở xuất hiện: Shalltear Bloodfallen, hộ vệ tầng hùng mạnh hàng đầu Nazarick nổi loạn, phản bội, chống chúa tể. Thách thức dành cho Ainz lần này chỉ được làm có một lần, yêu cầu là phải toàn thắng, tiêu diệt được Shalltear, khẳng định tư chất và bản lĩnh lãnh đạo của mình. Nhưng cô gái cũng lại là đứa con tinh thần của đồng đội cũ, là sợi dây duy nhất gắn kết anh với những yêu thương hoài niệm, giữ cô lại cũng là minh chứng anh đủ sức bảo vệ toàn vẹn Nazarick. Ainz phải làm thế nào đây? Tập 3, “Valkyrie khát máu”, bởi vì pha trộn những trăn trở rất người như thế, thành ra vừa dữ dằn, lại vừa ấm áp…</p>', '2022-05-29 10:30:55', 0, 0),
(20, 'OVERLORD - Tập 4 - The Lizard Man Heroes', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 1, '707.jpg', 50, 117000, 10, '<p>OVERLORD - Tập 4: Lizarmand Anh Dũng</p>', '2022-05-07 08:38:34', 0, 0),
(21, 'OVERLORD - Tập 5 - The Men in the Kingdom 1', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 1, '707 (1).jpg', 50, 152000, 14, '<p>OVERLORD - Tập 5: Những Anh Hùng Vương Quốc</p>', '2022-05-07 08:38:41', 0, 0),
(22, 'OVERLORD - Tập 6 - The Men in the Kingdom 2', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 1, '708.jpg', 50, 150000, 20, '<p>OVERLORD - Tập 6 - The Men in the Kingdom 2</p>', '2022-05-07 08:18:32', 0, 0),
(23, 'OVERLORD - Tập 7 - The Invaders of the Large tomb', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 1, '705_cb=20150928200622.jpg', 10, 100000, 15, '<p>OVERLORD - Tập 7 - The Invaders of the Large tomb</p>', '2022-05-07 08:19:58', 0, 0),
(24, 'OVERLORD - Tập 8 - The Two Leaders', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 1, 'book_1299.jpg', 6, 152000, 24, '<p>OVERLORD - Tập 8 - The Two Leaders</p>', '2022-05-07 08:40:15', 0, 0),
(25, 'OVERLORD - Tập 9 - The Magic Caster of Destroy', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 1, 'book_1300.jpg', 49, 112000, 15, '<p>OVERLORD - Tập 9 - The Magic Caster of Destroy</p>', '2022-05-07 08:42:19', 0, 0),
(26, 'OVERLORD - Tập 10 - The Ruler of Conspiracy', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 0, 'book_1301.jpg', 99, 152000, 0, '<p>OVERLORD - Tập 10 - The Ruler of Conspiracy</p>', '2022-05-07 08:44:02', 0, 0),
(27, 'OVERLORD - Tập 11 - The Craftsman of Dwarf', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 0, 'e11.png', 88, 123000, 0, '<p>OVERLORD - Tập 11 - The Craftsman of Dwarf</p>', '2022-05-07 16:37:37', 0, 0),
(28, 'OVERLORD - Tập 12: The Pladin of the Holy kingdom', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 0, 'ep12.png', 2, 120000, 0, '<p>OVERLORD - Tập 12: The Pladin of the Holy kingdom</p>', '2022-05-07 16:26:15', 0, 0),
(29, 'OVERLORD - Tập 13 The Pladin of the Holy Kingdom', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 0, 'ep13.jpg', 3, 124000, 0, '<p>OVERLORD - Tập 13 The Pladin of the Holy Kingdom</p>', '2022-05-07 16:23:25', 0, 0),
(30, 'OVERLORD - Tập 14 - The witch of the Falling kingdom', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 1, 'ep14.png', 7, 120000, 20, '<p>OVERLORD - Tập 14 - The witch of the Falling kingdom</p>', '2022-05-07 16:21:28', 0, 0),
(31, 'Học Viện Siêu Anh Hùng – Tập 1', 'NXB Kim Đồng', ' Kohei Horikoshi', 15, 0, 'AH1.jpg', 100, 20000, 0, '<p>Một ngày nọ, cơ thể con người bắt đầu hình thành một thứ siêu năng lực được gọi là “kosei”, từ đó xã hội bắt đầu tràn ngập những người sở hữu siêu năng lực. Tuy nhiên sự “phi thường” ấy đồng thời cũng khiến tỉ lệ tội phạm tăng cao, dẫn đến tình trạng mà đến chính phủ cũng không thể xử lí. Nhân cơ hội đó, một vài cá nhân đã bắt đầu ra tay chống lại cái ác! Những siêu anh hùng này về sau được dân chúng công nhận và chính thức bước vào hoạt động nhằm bảo vệ hòa bình thế giới hệt như trong truyện tranh! Đây là câu chuyện về cậu bé “vô năng” Midoriya Izuku, luôn đem lòng ngưỡng mộ các siêu anh hùng tình cờ gặp được siêu anh hùng All Might đứng đầu tất cả, từ đó hành trình trở thành siêu anh hùng vĩ đại nhất của cậu cũng bắt đầu!!</p><p>My Hero Academia - Học viện siêu anh hùng, một \"tân binh\" đến từ Shonen Jump, bộ truyện được kì vọng sẽ tiếp bước các đàn anh Naruto và One Piece, đã bán ra hơn 10 triệu bản tại Nhật chắc chắn sẽ làm mùa hè 2018 của bạn thêm phần hứng khởi!!</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', '2022-05-28 16:30:20', 0, 0),
(32, 'Học Viện Siêu Anh Hùng – Tập 2', 'NXB Kim Đồng', ' Kohei Horikoshi', 15, 0, 'AH2.jpg', 100, 17000, 0, '<p>GIỚI THIỆU TÁC PHẨM&nbsp;</p><p>Một ngày nọ, cơ thể con người bắt đầu hình thành một thứ siêu năng lực được gọi là “kosei”, từ đó xã hội bắt đầu tràn ngập những người sở hữu siêu năng lực. Tuy nhiên sự “phi thường” ấy đồng thời cũng khiến tỉ lệ tội phạm tăng cao, dẫn đến tình trạng mà đến chính phủ cũng không thể xử lí. Nhân cơ hội đó, một vài cá nhân đã bắt đầu ra tay chống lại cái ác! Những siêu anh hùng này về sau được dân chúng công nhận và chính thức bước vào hoạt động nhằm bảo vệ hòa bình thế giới hệt như trong truyện tranh! Đây là câu chuyện về cậu bé “vô năng” Midoriya Izuku, luôn đem lòng ngưỡng mộ các siêu anh hùng tình cờ gặp được siêu anh hùng All Might đứng đầu tất cả, từ đó hành trình trở thành siêu anh hùng vĩ đại nhất của cậu cũng bắt đầu!! My Hero Academia - Học viện siêu anh hùng, một \"tân binh\" đến từ Shonen Jump, bộ truyện được kì vọng sẽ tiếp bước các đàn anh Naruto và One Piece, đã bán ra hơn 10 triệu bản tại Nhật chắc chắn sẽ làm mùa hè 2020 của bạn thêm phần hứng khởi!!</p>', '2022-05-28 16:57:25', 0, 0),
(33, 'Học Viện Siêu Anh Hùng – Tập 3', 'NXB Kim Đồng', ' Kohei Horikoshi', 15, 0, 'AH3.jpg', 100, 20000, 0, '<p><strong>Học Viện Siêu Anh Hùng - Tập 3</strong></p><p>Một ngày nọ, cơ thể con người bắt đầu hình thành một thứ siêu năng lực được gọi là “kosei”, từ đó xã hội bắt đầu tràn ngập những người sở hữu siêu năng lực. Tuy nhiên sự “phi thường” ấy đồng thời cũng khiến tỉ lệ tội phạm tăng cao, dẫn đến tình trạng mà đến chính phủ cũng không thể xử lí. Nhân cơ hội đó, một vài cá nhân đã bắt đầu ra tay chống lại cái ác! Những siêu anh hùng này về sau được dân chúng công nhận và chính thức bước vào hoạt động nhằm bảo vệ hòa bình thế giới hệt như trong truyện tranh! Đây là câu chuyện về cậu bé “vô năng” Midoriya Izuku, luôn đem lòng ngưỡng mộ các siêu anh hùng tình cờ gặp được siêu anh hùng All Might đứng đầu tất cả, từ đó hành trình trở thành siêu anh hùng vĩ đại nhất của cậu cũng bắt đầu!!</p><p>My Hero Academia - Học viện siêu anh hùng, một \"tân binh\" đến từ Shonen Jump, bộ truyện được kì vọng sẽ tiếp bước các đàn anh Naruto và One Piece, đã bán ra hơn 10 triệu bản tại Nhật chắc chắn sẽ làm mùa hè 2018 của bạn thêm phần hứng khởi!!</p><p>Giá sản phẩm trên Tiki đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như phí vận chuyển, phụ phí hàng cồng kềnh, thuế nhập khẩu (đối với đơn hàng giao từ nước ngoài có giá trị trên 1 triệu đồng).....</p>', '2022-05-28 16:58:15', 0, 0),
(34, 'Học Viện Siêu Anh Hùng – Tập 4', 'NXB Kim Đồng', ' Kohei Horikoshi', 15, 0, 'AH4.jpg', 50, 20000, 0, '<p>Sau khi về nhất trong cuộc đua vượt chướng ngại vật, Deku đã gặp rắc rối to trong trận kị mã chiến. Nhưng cũng nhờ đó mà cả bọn giành được sự chú ý, nếu là Deku thì nhất định sẽ không sao đâu! Mình cũng không thể thua được! Ba mẹ ơi, hãy cùng dõi theo con nhé ! “Plus Ultra”!!</p>', '2022-05-28 17:15:40', 0, 0),
(35, 'Học Viện Siêu Anh Hùng – Tập 5', 'NXB Kim Đồng', ' Kohei Horikoshi', 15, 0, 'AH5.jpg', 50, 17000, 0, '<p>ĐẦUTRẬN CUỐI CÙNG trong VÒNG ĐẤU CHÍNH THỨC!! Trước một đối thủ siêu đáng gờm như Bakugo, Uraraka vẫn giữ tinh thần hăng hái. Cả hai bên đều dốc hết sức mình vào cuộc so tài. Mọi người vừa là bạn , vừa là ĐỐI THỦ ! Mình cũng phải đấu một trận không hổ thẹn để trở thành siêu anh hùng giống như anh hai mới được!</p>', '2022-05-28 17:17:10', 0, 0),
(36, 'Học Viện Siêu Anh Hùng – Tập 6', 'NXB Kim Đồng', ' Kohei Horikoshi', 15, 0, 'AH6.jpg', 50, 20000, 0, '<p>Sau hội thao, chúng tôi biết tin anh của Ida bị Villain tấn công. Bình thường Ida luôn tỏ ra mạnh mẽ, nhưng lần này thì... Vài ngày sau, đến lượt chúng tôi được thực tập ở chỗ của các siêu anh hùng chuyên nghiệp. Con đường tôi muốn đi... Để thay đổi bản thân, tôi quyết định sẽ không né tránh bố mình nữa...</p>', '2022-05-28 17:54:03', 0, 0),
(37, 'NHỮNG TRUYỆN HAY VIẾT CHO THIẾU NHI - NGUYÊN HỒNG', 'NXB Kim Đồng', 'Nguyên Hồng', 17, 0, 'tn1.png', 10, 35000, 0, '<p>“…Nguyên&nbsp; Hồng&nbsp; có&nbsp; những&nbsp; trang&nbsp; viết đầy&nbsp; xúc&nbsp; động&nbsp; về&nbsp; những&nbsp; nhân&nbsp; vật&nbsp; trẻ thơ.&nbsp; “Trẻ&nbsp; em&nbsp; như&nbsp; búp&nbsp; trên&nbsp; cành”&nbsp; lẽ&nbsp; ra phải&nbsp; được&nbsp; thương&nbsp; yêu,&nbsp; chiều&nbsp; chuộng, phải&nbsp; được&nbsp; chăm&nbsp; sóc&nbsp; đủ&nbsp; đầy,&nbsp; ấy&nbsp; vậy</p><p>dưới&nbsp; chế&nbsp; độ&nbsp; cũ,&nbsp; trẻ&nbsp; em&nbsp; cũng&nbsp; là&nbsp; những nạn&nbsp; nhân&nbsp; đau&nbsp; khổ.&nbsp; Nguyên&nbsp; Hồng&nbsp; viết về&nbsp; những&nbsp; sinh&nbsp; mệnh&nbsp; đáng&nbsp; thương&nbsp; này bằng chính những trải nghiệm trong thời thơ&nbsp; ấu&nbsp; của&nbsp; mình&nbsp; nên&nbsp; có&nbsp; sức&nbsp; lay&nbsp; động lòng người sâu sắc.” - Tiến sĩ Bạch Văn Hợp</p><p>Cuốn sách tuyển chọn những truyện ngắn tiêu biểu: Con chó vàng, Mợ Du, Hai nhà nghề, Giọt máu, Chuyện cái xóm tha hương ở cửa rừng Suối Cát và con hùm con mồ côi… và những truyện ngắn đặc sắc viết cho thiếu nhi của nhà văn Nguyên Hồng.</p><p>Nhà văn NGUYÊN HỒNG (1918 -1982)</p><p>Tên thật: Nguyễn Nguyên Hồng - Quê quán: Nam Định</p><p>* Giải thưởng Hồ Chí Minh về Văn học nghệ thuật, năm 1996</p><p>Tác phẩm chính: Bỉ vỏ, Bảy Hựu, Những ngày thơ ấu, Địa ngục và lò lửa, Đất nước yêu dấu, Đêm giải phóng, Giữ thóc, Giọt máu, Trời xanh, Cháu gái người mãi võ họ Hoa, Sóng gầm, Thời kỳ đen tối, Cơn bão đã đến, Một tuổi thơ văn, Sông núi quê hương, Khi đứa con ra đời, Núi rừng Yên Thế, Tuyển tập Nguyên Hồng …</p>', '2022-05-29 09:49:57', 0, 0),
(38, 'NHỮNG TRUYỆN HAY VIẾT CHO THIẾU NHI - NGUYỄN KIÊN', 'NXB Kim Đồng', 'Nguyễn Kiên', 17, 0, 'tn2.png', 155, 35000, 0, '<p>“Tác phẩm dành cho thiếu nhi là những câu chuyện đời sống được nhìn bằng đôi mắt trẻ thơ. Còn giấc mơ ẩn sau mỗi câu chuyện là giấc mơ trẻ thơ của chính tác giả, hằng lưu giữ trong tâm hồn.”</p><p>Nhà văn NGUYỄN KIÊN</p>', '2022-05-29 09:51:39', 0, 0),
(39, 'NHỮNG TRUYỆN HAY VIẾT CHO THIẾU NHI - TRẦN HOÀI DƯƠNG', 'NXB Kim Đồng', 'Trần Hoài Dương', 17, 0, 'tn3.jpg', 50, 35000, 0, '<p>Tuyển tập truyện hay nhất viết cho thiếu nhi của nhà văn Trần Hoài Dương: Em bé và bông hồng, Cây lá đỏ, Cô bé mảnh khảnh, Cuộc phiêu lưu của những con chữ, Những đóa hồng bạch dâng tặng Andersen…</p><p>\"Theo tôi, cái phần đặc sắc nhất để làm nên một Trần Hoài Dương riêng biệt, một Trần Hoài Dương nhà văn độc đáo - ấy là các truyện ngắn dành cho lứa tuổi học trò. Ở những truyện ngắn loại này, tôi có thể khẳng định rằng, mỗi mẩu chuyện là một áng thơ, văn xuôi từ hình thức, nhịp điệu, lời văn đến mạch cảm xúc bên trong của tác phẩm\".</p><p>Nhà thơ Hoàng Cát</p>', '2022-05-29 09:52:53', 0, 0),
(40, 'NHỮNG TRUYỆN HAY VIẾT CHO THIẾU NHI - MA VĂN KHÁNG', 'NXB Kim Đồng', ' Ma Văn Kháng', 17, 0, 'tn3.png', 50, 35000, 0, '<p>Tập truyện bạn đọc đang cầm trên tay đây là những truyện ngắn có nội dung gần gũi với tuổi thơ. Được chọn lọc từ hơn hai trăm truyện ngắn của Ma Văn Kháng, những trang văn có nhân vật là trẻ em hoặc những nhân vật, sự việc xoay quanh thế giới tuổi thơ cũng đã được viết từ nguồn cảm hứng, niềm mến yêu cuộc sống và lòng yêu thương dành cho con trẻ và tuổi trẻ của nhà văn.</p><p>Từ Ông Pồn và chú hổ con, Giấc mơ của bà nội, Hoa gạo đỏ… cho tới Con chó lạc nhà, Khu vườn tuổi thơ, Đồng cỏ nở hoa, Ông nội cổ giả và quê mùa, Kiểm – Chú bé – Con người… tất cả những truyện ngắn được giới thiệu trong cuốn sách này hầu hết đều mang âm hưởng của những số phận nhiều lo toan, vất vả, nhọc nhằn, có hoàn cảnh éo le và chịu nhiều thiệt thòi; nhưng đó cũng là những con người có nhiều phẩm chất tốt đẹp mà nổi bật hơn cả là lòng nhân hậu, nết can đảm và ý chí kiên cường. Bỏ lại phía sau giọng điệu gai góc, ưu tư, phiền muộn, truyện ngắn viết cho trẻ em và viết về trẻ thơ của Ma Văn Kháng vẫn vang lên giai điệu lạc quan về cuộc sống, ước mơ và tình đời cao thượng.</p>', '2022-05-29 09:55:18', 0, 0),
(41, 'Kinh Tế Nhật Bản: Giai Đoạn Phát Triển Thần Kỳ 1955-1973', 'NXB Đà Nẵng', 'Trần Văn Thọ', 11, 0, 'kt1.png', 10, 199000, 0, '<p><strong>Giáo sư Trần Văn Thọ là chuyên gia tầm chính phủ về kinh tế. Góc nhìn của ông về kinh tế thế giới – Nhật Bản – và Việt Nam luôn được các nhà hoạch định chính sách quan tâm lắng nghe để đưa ra quyết sách ở tầm vĩ mô.</strong></p><p><strong>***</strong></p><p><strong>Đây là một cuốn sách cực kỳ quan trọng, được biên soạn rất công phu, phản ảnh kiến thức sâu và rộng của tác giả về cả lý thuyết lẫn thực hành của ngành kinh tế phát triển. Sách được đúc kết dựa trên các phân tích số lượng chặt chẽ và đem lại những kiến thức mới để hiểu quá trình Nhật Bản trở thành một cường quốc kính tế. Những bài học được tác giả rút ra từ Nhật Bản sẽ giúp Việt Nam trên đường công nghiệp hoá và phát triển. Đặc biệt ấn tượng là kinh nghiệm Nhật Bản được tổng kết qua hai khái niệm nhà nước kiến tạo phát triển và năng lực xã hội.</strong></p>', '2022-05-29 09:58:56', 0, 0),
(42, 'Trump 101: Con Đường Dẫn Đến Thành Công', 'NXB Trẻ', 'Donald J. Trump , Meredith Mclver', 11, 1, 'kt2.png', 10, 63000, 15, '<p>Trump 101: Con Đường Dẫn Đến Thành Công (Tái Bản 2017)</p><p>Bạn đã đọc Tôi đã làm giàu như thế, Đường đến thành công đỉnh cao, Nghĩ như một tỷ phú của Donald J. Trump thì không thể bỏ qua Trump 101, con đường dẫn đến thành công. Trong cuốn sách này với vai trò vừa là nhà tư vấn, vừa là bạn đồng hành, Donald J. Trump sẽ chia sẻ cùng bạn những bí quyết cũng như những chiến lược giúp bạn phát triển khả năng của mình một cách tốt nhất và có được những định hướng đúng đắn nhất trong nghề nghiệp cũng như trong cuộc sống.</p>', '2022-05-29 10:13:49', 0, 0),
(43, 'Danh Tướng', 'NXB Dân Trí', 'Will Durant', 13, 0, 'ls1.png', 10, 425000, 0, '<p><i><strong>Danh Tướng</strong></i></p><p>Danh tướng đưa ra cái nhìn mới về giới lãnh đạo quân sự, những người đã làm nên lịch sử bằng những trận chiến trên bộ, trên biển, cũng như trên không, từ Alexander Đại Đế, nhà chinh phạt lẫy lừng của thế kỉ 4 TCN, tới chư tướng dẫn dắt các chiến dịch ở Afghanistan và Iraq ngày nay.</p><p>&nbsp;Cuốn sách bao gồm thông tin tiểu sử và hình ảnh tướng lãnh, bản đồ trận đánh và chi tiết sống động về các cuộc hành quân. Đây là cẩm nang bằng hình giúp bạn tìm hiểu về các thiên tài quân sự trên thế giới.</p><p>&nbsp;“Coi lính như con em, lính sẽ cùng ta vào thâm khê. Coi lính như con yêu, lính sẽ bên ta sống chết.” – <i>Binh pháp Tôn Tử</i></p><p><br>&nbsp;</p>', '2022-05-29 10:12:56', 0, 0),
(44, 'Putin - Logic Của Quyền Lực - Putin: Innenansichten Der Macht', 'NXB Tổng Hợp TPHCM', 'Hubert Seipel', 9, 1, 'ct.png', 100, 134000, 12, '<p>Tên gốc của tác phẩm là Putin: Innenansichten der Macht. Sách gồm 21 chương, do Hubert Seipel thực hiện trong 5 năm (từ năm 2010 đến 2015). Tác giả đã có hơn 20 buổi phỏng vấn chuyên sâu với Putin, đồng thời tháp tùng ông trên hàng chục chuyến đi trong, ngoài nước.</p><p>Sách mở ra góc nhìn mới về nhà lãnh đạo Nga. Putin: Logic của quyền lực phát hành ở Việt Nam cuối tháng 11, do dịch giả Phan Xuân Loan chuyển ngữ, Nhà xuất bản Tổng hợp phát hành. Hubert Seipel tái hiện những dấu mốc chính trong cuộc đời Putin. Năm 1975, Putin tốt nghiệp khoa Luật Đại học Tổng hợp Quốc gia Saint Petersburg. Năm 1985, ông trở thành nhân viên tình báo đối ngoại của Liên Xô ở Đức. Năm 1994, ông trở thành phó chủ tịch thứ nhất của thành phố quê nhà Saint Petersburg. Năm 1996, ông chuyển đến Moskva và được bổ nhiệm nhiều chức vụ quan trọng trong văn phòng Tổng thống Nga. Cuối năm 1999, ông trở thành Tổng thống Nga…</p>', '2022-05-29 10:16:02', 0, 0),
(45, 'Nguồn Gốc Văn Minh - Nguyễn Hiến Lê', 'NXB Hồng Đức', 'Will Durant', 13, 1, 'ls2.png', 99, 84000, 60, '<p><i><strong>Ngược dòng thời gian để xem văn minh nhân loại và vạn vật muôn loài được hình thành như thế nào.</strong></i></p><p>Bạn có biết lịch sử hình thành văn minh nhân loại được hình thành như thế nào không? Và cho tới hiện tại nền văn minh đã và đang ở đâu không? Mỗi giai đoạn lịch sử qua đi là một điểm nhấn mấu chốt mà gần như người xảy ra những biến cố hoặc dấu tích đặc trưng cho thời kỳ đó.</p><p><strong>Nguồn gốc văn minh từ đâu?</strong></p><p>Theo các nhà khoa học, loài người phát triển từ thuở hoang sơ cho đến nay ước khoảng mười nghìn năm, gồm các thời Cổ Đại, Trung Cổ, Cận Đại và Hiện đại. Ở mỗi thời đại, xã hội loài người nổi lên một số vùng, hoặc một mảnh đất mà ở đó xã hội cư dân ở điểm tập hợp được các giá trị tiên tiến vượt trội trong nhiều lĩnh vực - hình thành <strong>nền văn minh</strong>.</p><p>Một số thống kê cụ thể ở thời Cổ Đại có 8 nền văn minh lớn: nền văn minh Ai Cập cổ đại, nền văn minh Hy Lạp, nền văn minh La Mã, nền văn minh Tây Á, nền văn minh Ấn Độ, nền văn minh Trung Hoa, nền văn minh Maya và nền văn minh Andes…</p>', '2022-05-29 10:19:38', 0, 0),
(46, 'How Psychology Works - Hiểu Hết Về Tâm Lý Học', 'NXB Thế Giới', 'Jo Hemmings', 16, 1, 'tl.png', 100, 250000, 20, '<p>MỘT TRONG NHỮNG CUỐN SÁCH MỞ KHÓA HỮU ÍCH NHẤT VỀ TƯ DUY, KÝ ỨC VÀ CẢM XÚC CỦA CON NGƯỜI!<br>Ám sợ là gì, ám sợ có thực sự đáng sợ không? Rối loạn tâm lý là gì, làm thế nào để thoát khỏi tình trạng suy nhược và xáo trộn đó? Trầm cảm là gì, vì sao con người hiện đại thường xuyên gặp và chống chọi với tình trạng u uất, mệt mỏi và tuyệt vọng này?</p><p>Tìm hiểu về các vấn đề tâm trí của con người luôn đầy sức hấp dẫn và lôi cuốn, vì vậy mà tâm lý học ra đời, hình thành và phát triển rất nhiều các học thuyết và trường phái. Cuốn sách này dẫn dắt bạn đọc qua hành trình tìm hiểu các học thuyết và trường phái đó, về cách các nhà tâm lý diễn giải hành xử và tâm trí con người. Tại sao chúng ta có những hành vi, suy nghĩ và cảm xúc như vậy, chúng diễn ra và kết thúc như thế nào, chúng ảnh hưởng lâu dài, gián đoạn hay ngắn ngủỉ đến đời sống của chúng ta ra sao, làm thế nào để chúng ta thoát khỏi những tác động tiêu cực của chúng?</p>', '2022-05-29 10:23:26', 0, 0),
(47, 'Tri Thức Bách Khoa - Những Phát Kiến, Phát Minh Trong Khoa Học Công Nghệ Và Cuộc Sống', 'NXB Đại Học Sư Phạm', 'Lê Quang', 10, 0, 'kh.png', 100, 31000, 0, '<p>Tri Thức Bách Khoa - Những Phát Kiến, Phát Minh Trong Khoa Học Công Nghệ Và Cuộc Sống</p>', '2022-05-29 11:11:09', 0, 0),
(48, 'Harry Potter and the Deathly Hallows', 'Bloomsbury Publishing PLC', 'J. K. Rowling', 8, 0, 'hr.png', 10, 100000, 0, '<p>Harry Potter and the Deathly Hallows</p>', '2022-05-29 11:16:24', 0, 0),
(49, 'Harry Potter and the Deathly Hallows (Hardcover)', 'Bloomsbury Publishing PLC', 'J. K. Rowling', 8, 0, 'hr2.png', 99, 450000, 400000, '<p>Harry Potter and the Deathly Hallows</p>', '2022-05-31 09:16:40', 0, 0),
(50, 'Tanya Chiến Ký 1: Deus Lo Vult', 'NXB Thái Hà', 'Carlo Zen', 19, 1, 'b_a_27_2.jpg', 96, 145000, 20, '<p>Tanya Chiến ký (tên gốc: Youjo senki) là light novel đầu tay của tác giả Carlo Zen, minh họa bởi Shinotsuki Shinobu lấy đề tài chiến tranh, giả tưởng thời cận hiện đại trên một thế giới khác, tồn tại đồng thời pháo binh, những cỗ tăng thiết giáp và máy bay chiến đấu cùng với những ma pháp sư sử dụng ngọc diễn toán can thiệp vào thế giới vật lý bay lượn trên bầu trời.</p><p>Tanya chiến ký bắt đầu với khung cảnh một bé gái cất tiếng khóc chào đời tại một cô nhi viện, tuy nhiên, có vẻ như bé gái ấy lại tồn tại một ý thức khác, một ý thức chưa từng nghĩ tới rằng mình sẽ tái sinh thành một cô bé trong một thế giới thảm khốc như vậy. Ý thức ấy thuộc về một trưởng phòng nhân sự mẫn cán tại Nhật Bản xa xôi. Là một người làm công ăn lương mẫu mực, chăm chỉ nhưng không có lòng trắc ẩn và có phần vô tâm, từ khi đi học cho tới khi đi làm, anh ta luôn làm theo đúng y sì những gì mà xã hội và cấp trên mong muốn, tuân thủ mọi quy định và hoàn thành mọi mệnh lệnh từ trên xuống. Là người phụ trách nhân sự, trong thời buổi kinh tế khó khăn và đổi mới công nghệ, anh ta đã hoàn thành xuất sắc việc cắt giảm nhân sự không hiệu quả cho công ty, dẫu đó có là một nhân viên lâu năm hay dẫu người ấy có quỳ lạy khóc lóc như nào. Sự vô tình này đã khiến anh ta hứng thụ sự uất hận từ người bị sa thải, và trong một khoảnh khắc trước khi ý thức mất đi, anh ta vẫn nhớ rằng mình đang đứng đợi tàu điện ở sát đường ray rồi bị một ai đó đẩy từ phía sau.</p>', '2022-05-31 19:42:23', 0, 0),
(54, 'OVERLORD - Tập 1: Chúa Tể Bất Tử - Tặng Kèm Postcard', 'Kim đồng', '', 10, 0, '60637604_2038961603076540_7399464138239377408_n.jpg', 0, 0, 0, '<p>ssx</p>', '2023-05-05 05:06:29', 1, 0),
(56, 'OVERLORD - Tập 15 -  The Half-Elf Demigod Part I', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 1, '81FCNBoCUAL._AC_UF1000,1000_QL80_.jpg', 10, 120000, 10, '<p>War with the Nation of Darkness is inevitable―or so the Theocracy’s leaders believe with every part of their beings. With such an obvious threat on their borders, there’s no time to waste on lesser concerns, so they decide to eliminate the elf king who has been a thorn in their sides for too long! Meanwhile, Ainz sets out for the elf country on what he’s decided to call a paid vacation. His real goal is to create an opportunity for Aura and Mare to make some friends their age―even as the Theocracy armies march on the capital! The twins know their wise ruler has his hopes pinned on them and won’t stop until they bring this forest under the control of Ainz Ooal Gown!</p>', '2023-05-13 14:10:05', 0, 0),
(57, 'OVERLORD - Tập 16:  The Half-Elf Demigod Part II', 'NXB Hồng Đức', 'Kugane Maruyama', 19, 0, 'tải xuống.jpg', 15, 150000, 0, '<p>Even fierce warriors are in awe when they see the majesty of <a href=\"https://overlordmaruyama.fandom.com/wiki/Great_Tomb_of_Nazarick\">Nazarick</a>! <a href=\"https://overlordmaruyama.fandom.com/wiki/Ainz_Ooal_Gown\">Ainz</a> and the twins stay in the <a href=\"https://overlordmaruyama.fandom.com/wiki/Dark_Elf\">dark elf</a> village and continue to interact with the villagers. But the Theocracy has finally just begun to attack the <a href=\"https://overlordmaruyama.fandom.com/wiki/Elf_Country\">elf country</a>. Ainz, who had a plan, started to act.</p>', '2023-05-13 14:12:32', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `avatar` varchar(200) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `phone`, `address`, `avatar`, `created_at`, `status`, `role`) VALUES
(1, 'admin@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Phạm Toàn Thắng', 769234431, 'Cẩm Phả-Quảng Ninh', 'avt.jpg', '2022-04-07 23:40:11', 0, 1),
(2, 'user1@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'User', 3213, '', 'avt.png', '2022-04-07 18:41:02', 0, 0),
(10, 'A@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Nguyễn Văn An 123', 122939341, 'Hà Nội', 'avt.png', '2022-05-05 15:43:10', 0, 0),
(11, 'test@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Đường Ngọc Hà', 122939341, '', 'avt.png', '2022-05-07 17:15:57', 0, 0),
(12, 'long@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Vĩnh Long', 122939341, '', 'avt.png', '2022-05-31 16:12:53', 0, 0),
(13, 'thinh.nq@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Quốc Thịnh', 123513467, '', 'avt.png', '2022-05-31 19:17:56', 0, 0),
(14, 'AB@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Nguyễn Văn A', 122939341, '', 'avt.png', '2022-06-01 04:28:59', 0, 0),
(15, 'ad@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Phạm Toàn Thắng', 769234431, 'quảng ninh', '705.jpg', '2023-05-16 13:45:13', 0, 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `book_info`
--
ALTER TABLE `book_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `infor` (`book_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD KEY `user` (`user_id`),
  ADD KEY `book` (`book_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`publisher`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `book_info`
--
ALTER TABLE `book_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `book_info`
--
ALTER TABLE `book_info`
  ADD CONSTRAINT `infor` FOREIGN KEY (`book_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `book` FOREIGN KEY (`book_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
