-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Січ 31 2024 р., 18:53
-- Версія сервера: 10.4.26-MariaDB
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `tetatet`
--

-- --------------------------------------------------------

--
-- Структура таблиці `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `comments`
--

INSERT INTO `comments` (`id`, `message`, `datetime`, `post_id`, `user_id`) VALUES
(1, 'Це правда :)', '2022-02-18 12:10:00', 27, 27),
(10, 'Пси, пси, такі псиии...', '2022-05-26 15:09:09', 32, 12),
(11, 'Огох', '2022-10-14 12:15:43', 31, 12),
(12, 'Woww', '2024-01-25 18:24:53', 38, 12),
(13, 'qwert', '2024-01-25 21:51:02', 40, 12),
(14, 'we', '2024-01-29 18:20:49', 1, 12);

-- --------------------------------------------------------

--
-- Структура таблиці `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `messages`
--

INSERT INTO `messages` (`id`, `message`, `datetime`, `user_id`) VALUES
(242, 'Привіт, як ти?', '2022-10-14 10:25:01', 12),
(243, 'Супер, а ти?)', '2022-10-14 10:32:43', 25),
(245, 'Привіт :)', '2022-10-14 10:49:56', 25),
(254, 'Все чудово...', '2022-10-14 12:10:22', 12),
(255, 'Куу', '2024-01-25 18:27:44', 12);

-- --------------------------------------------------------

--
-- Структура таблиці `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Title',
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Description',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Text',
  `datetime` datetime NOT NULL COMMENT 'Add time',
  `datetime_lastedit` datetime DEFAULT NULL COMMENT 'Last edit',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Photo',
  `user_id` int(11) NOT NULL COMMENT 'author ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `news`
--

INSERT INTO `news` (`id`, `title`, `category`, `description`, `text`, `datetime`, `datetime_lastedit`, `photo`, `user_id`) VALUES
(34, 'Маск вирішив не платити за \"Старлінки\" в Україні і відмовляється постачати нові', 'Війна', 'Компанія SpaceX нарікає на брак коштів і просить про оплату від Пентагону.', '<p>Власник компанії SpaceX&nbsp;<a href=\"https://tsn.ua/lady/news/obschestvo/ilona-maska-obveli-navkolo-palcya-milyarderu-pidstavili-nespravzhnogo-putina-2179024.html\">Ілон Маск&nbsp;</a>вирішив не платити за &quot;Старлінки&quot; в Україні і відмовляється постачати нові.</p>\r\n\r\n<p>Більше не може платити за українські &quot;Старлінки&quot; - компанія Ілона Маска SpaceX звернулася до американського Міністерства оборони, щоби те взяло на себе фінансування супутників в Україні.&nbsp;Про це повідомляє&nbsp;<a href=\"https://edition.cnn.com/\">CNN</a>, у розпорядженні якого опинились офіційні документи.</p>\r\n\r\n<p>У них SpaceX зазначає, більше не може фінансувати сервіс &quot;Старлінк&quot; - бо до кінця року це коштуватиме 120 мільйонів доларів, а впродовж наступного року - ще 400 мільйонів. Тож, покрити витрати на обслуговування і на нові супутники просять Пентагон.</p>\r\n\r\n<p>Також у листі компанія Маска зазначає, що у липні Київ просив про ще 8 тисяч терміналів &quot;Старлінк&quot; - і SpaceX не має фінансових можливостей забезпечити цей запит.</p>\r\n\r\n<p>CNN зазначає, що звернення до Пентагону написано на тлі нещодавніх новин про масштабні збої в роботі &quot;Старлінка&quot; в районах, де діють ЗСУ, в період активного контрнаступу. І це, за повідомленнями, призвело до катастрофічних утрат зв&#39;язку.</p>\r\n\r\n<p>Запит Маска викликав роздратування в командування Пентагону, - пише CNN. Бо там вважають, що SpaceX має нахабство &quot;бути героєм&quot; та отримувати пошану за передавання&nbsp;20 тисяч &quot;Старлінків&quot;, хоча насправді переважну більшість із них оплатили Сполучені Штати, Польща та інші благодійники.</p>\r\n\r\n<p>#Війна</p>\r\n', '2023-10-14 12:36:03', '2024-01-31 18:43:43', '34_63492d844d2c6', 12),
(35, 'Вертоліт NASA на Марсі здійснив останній політ і вийшов із ладу', 'ІТ', 'Коли вертоліт Ingenuity опинився на висоті 1 метр над поверхнею Марса, вчені з NASA втратили з ним зв\'язок. ', '<p><strong>Апарату не вдалося виконати його програму.</strong></p>\r\n\r\n<p>У&nbsp;<a href=\"https://tsn.ua/tags/nasa\"><strong>NASA&nbsp;</strong></a>повідомили&nbsp;про припинення місії дрона-вертольота Ingenuity. Щонайменше одна з його лопатей отримала пошкодження під час останнього польоту. Це означає, що Ingenuity більше не підніметься в небо Червоної планети.</p>\r\n\r\n<p>Про це&nbsp;<a href=\"https://www.space.com/nasa-ingenuity-mars-helicopter-mission-ends\">пише&nbsp;</a>Space.</p>\r\n\r\n<p>Вертоліт Ingenuity здійснив свій 72-й політ. Апарату не вдалося виконати його програму: через збій у роботі навігаційної системи він був змушений здійснити дострокову посадку. Це сталося через те, що маршрут гелікоптера пролягав над піщаною ділянкою, де практично не було каміння або якихось інших утворень, які можна було б використовувати як орієнтир.</p>\r\n\r\n<p>Згідно з повідомленням NASA, перший у світі літальний апарат, який здійснював польоти на іншій планеті, зазнав ушкодження однієї з лопатей несучого гвинта і більше ніколи не зможе злетіти.</p>\r\n\r\n<p>Коли вертоліт Ingenuity опинився на висоті 1 метр над поверхнею Марса, вчені з NASA втратили з ним зв&#39;язок. Його було відновлено і, здавалося б, усе йде за планом, але наступні дані і зображення, які передав Ingenuity на Землю, показали, що сталася аварія.</p>\r\n\r\n<p>За майже 3 роки польотів на Марсі Ingenuity подолав у 14 разів більшу відстань і в 33 рази довше перебував у повітрі, ніж планували вчені. Цей літальний апарат здійснив вражаючі 72 польоти на Марсі.</p>\r\n\r\n<p>Раніше стало відомо, що у&nbsp;<a href=\"https://tsn.ua/nauka_it/nasa-stvoryuye-yaderniy-raketniy-dvigun-mozhna-doletiti-do-susidnih-zirok-2499685.html\"><strong>NASA</strong></a>&nbsp;розпочали роботу над створенням тонколистового ядерного ізотопного ядерного ракетного двигуна, що буде легшим і дешевшим у виробництві. Це дасть змогу створювати необхідну тягу для швидких переміщень у космосі.</p>\r\n\r\n<p>#іт</p>\r\n\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: -48px; top: 205.8px;\">\r\n<div class=\"gtx-trans-icon\">&nbsp;</div>\r\n</div>\r\n', '2023-10-14 12:58:12', '2024-01-31 18:38:58', '35_65ba6991b8e0c', 12),
(36, 'У ТЦК Києва розповіли, чи будуть силоміць затримувати чоловіків на вулицях', 'Війна', 'У ТЦК Києва заявили, що не можуть силоміць затримувати військовозобов\'язаних, бо таких повноважень у співробітників військкоматів відповідно до законодавства немає, але...', '<p><strong>Співробітники ТЦК можуть роздавати повістки на вулиці, на блокпості, у кафе чи спортзалах. Проте силоміць &quot;пакувати&quot; чоловіків вони не мають права.</strong></p>\r\n\r\n<p>У ТЦК Києва заявили, що не можуть силоміць затримувати військовозобов&#39;язаних, бо таких повноважень у співробітників військкоматів відповідно до законодавства немає</p>\r\n\r\n<p>Про це заявив заступник начальника &ndash; начальник мобілізаційного відділення Дарницького районного у м. Києві ТЦК та СП Володимир Новосядлий в інтерв&#39;ю &quot;<a href=\"https://vechirniy.kyiv.ua/news/94345/\" target=\"_blank\">Вечірньому Києву</a>&quot;.</p>\r\n\r\n<p>За його словами, співробітники ТЦК можуть роздавати повістки на вулиці, на блокпості, у кафе чи спортзалах. Проте силоміць &quot;пакувати&quot; чоловіків у бус вони не мають права.</p>\r\n\r\n<p>&quot;Представники ТЦК можуть пропонувати особі або пройти, або проїхати, щоб уточнити тут і зараз облікові дані в ТЦК. Питання щодо затримання осіб належить до компетенції Національної поліції.</p>\r\n\r\n<p>Якщо особа відмовляється, явно ухиляється від призову, викликається поліція, або ж представники ТЦК спільно з поліцією працюють. Далі складають протоколи про те чи інше порушення, яке сталося. Затримати особу може Нацполіція в рамках адміністративного затримання. Нам такі повноваження законодавство не надає&quot;, &ndash; сказав Новосядлий.</p>\r\n\r\n<p>Він наголосив, що це не завдання ТЦК &ndash; займатися розшуковими діями. Це обов&rsquo;язок громадянина &ndash; прийти й уточнити свої дані.</p>\r\n\r\n<p>#війна&nbsp;#політика</p>\r\n', '2023-10-14 13:05:01', '2024-01-31 18:39:24', '36_65ba690a146af', 25),
(37, 'Курс валют на 1 лютого', 'Політика', 'Курс валют на 1 лютого: скільки коштуватимуть долар, євро і злотий', '<p><strong>Американський долар втратив у ціні.</strong></p>\r\n\r\n<p>Національний банк України встановив офіційний<a href=\"https://tsn.ua/tags/%D0%BA%D1%83%D1%80%D1%81%20%D0%B2%D0%B0%D0%BB%D1%8E%D1%82\"><strong>&nbsp;курс валют</strong></a>&nbsp;на четвер, 1 лютого. Так, порівняно&nbsp;з попереднім днем долар США впав&nbsp;на 31&nbsp;копійку&nbsp;та&nbsp;становить 37,56&nbsp;гривні.</p>\r\n\r\n<p>Про це&nbsp;<a href=\"https://bank.gov.ua/ua/markets/exchangerates?date=01.02.2024&amp;period=daily\">йдеться&nbsp;</a>на офіційному сайті НБУ.</p>\r\n\r\n<h3><strong>Курс долара</strong></h3>\r\n\r\n<ul>\r\n	<li>1 долар США &ndash; 37,56&nbsp;(-31&nbsp;коп.)</li>\r\n</ul>\r\n\r\n<h3><strong>Курс євро</strong></h3>\r\n\r\n<ul>\r\n	<li>1 євро &ndash; 40,70&nbsp;(-38&nbsp;коп.)</li>\r\n</ul>\r\n\r\n<h3><strong>Курс злотого</strong></h3>\r\n\r\n<ul>\r\n	<li>1 польський злотий &ndash; 9,39&nbsp;(-2&nbsp;коп.)</li>\r\n</ul>\r\n\r\n<p>Як зазначалося раніше, у НБУ прокоментували&nbsp;<a href=\"https://tsn.ua/ukrayina/u-nbu-prokomentuvali-riven-inflyaciyi-k-2023-roci-2490919.html\">рівень інфляції&nbsp;</a>2023 року.</p>\r\n\r\n<p>#політика</p>\r\n\r\n<p>&nbsp;</p>\r\n', '2023-10-14 13:10:34', '2024-01-31 18:39:42', '37_65ba689aacc40', 25),
(38, 'Зеленський прокоментував рішення ПАРЄ про терористичний режим Росії: ', 'Війна', 'Зеленський заявив, що з цією терористичною групою, нема про що говорити.', '<p>Президент України&nbsp;<a href=\"https://tsn.ua/tags/%D0%B2%D0%BE%D0%BB%D0%BE%D0%B4%D0%B8%D0%BC%D0%B8%D1%80%20%D0%B7%D0%B5%D0%BB%D0%B5%D0%BD%D1%81%D1%8C%D0%BA%D0%B8%D0%B9\">Володимир Зеленський</a>&nbsp;схвально відреагував на рішення ПАРЄ, яким вона оголосила Росію терористичним режимом.</p>\r\n\r\n<p>Про це глава держави сказав у відеозверненні 13 жовтня.</p>\r\n\r\n<p>&quot;Маємо потужний відгук від ПАРЄ &ndash; це&nbsp;<strong>перша міжнародна організація, яка визначила наявний в Росії режим як терористичний.</strong>&nbsp;Дуже важливо, що це політичний сигнал. Сигнал усім державам-членам Ради Європи й усім державам світу, що з цією терористичною групою, яка привласнила собі Росію та розвʼязала найстрашнішу за 80 років війну в Європі, немає про що говорити&quot;, &ndash; сказав Зеленський.</p>\r\n\r\n<p>&quot;<strong>Терору треба відповідати силою на всіх рівнях: і на полі бою, і санкціями, і юридично.</strong>&nbsp;Ми створимо спеціальний трибунал щодо злочину агресії Росії проти України і забезпечимо роботу спеціального компенсаційного механізму, щоб Росія своїми активами відповіла за цю війну&quot;, &ndash; додав він.</p>\r\n\r\n<p>Нагадаємо,&nbsp;ПАРЄ&nbsp;13 жовтня&nbsp;ухвалила резолюцію про визнання&nbsp;<a href=\"https://tsn.ua/ato/parye-uhvalila-rezolyuciyu-pro-viznannya-rosiyi-teroristichnim-rezhimom-2179192.html\">Росії&nbsp;терористичним режимом</a>. Це перша міжнародна організація, яка визнала РФ державою-терористкою.</p>\r\n\r\n<p>Зауважимо, як пояснив політолог Володимир Фесенко,&nbsp;<a href=\"https://tsn.ua/exclusive/chomu-ssha-ne-viznayut-rosiyu-sponsorkoyu-terorizmu-fesenko-nazvav-prichini-ta-skazav-koli-ce-stanetsya-2177920.html\">США поки не оголошуватимуть&nbsp;Росію&nbsp;</a>державою-спонсоркою тероризму через певні ризики для себе, зокрема &ndash; застосування тактичної ядерної зброї.</p>\r\n\r\n<p>#війна</p>\r\n', '2023-10-14 13:15:01', '2024-01-31 18:43:43', '38_634936a5d27ef', 25),
(39, 'Данілов спростував заяви про те, що російські обстріли пошкодили третину енергетичної інфраструктури України', 'Бізнес', 'Секретар РНБО Олексій Данілов спростував заяви глави Міненерго про те, що російські ракетні удари 10 жовтня пошкодили близько 30% енергетичної інфраструктури України.', '<p>Секретар РНБО Олексій Данилов спростував слова міністра енергетики Германа Галущенка про те, що&nbsp;ракетний обстріл на&nbsp;початку тижня пошкодив близько 30% енергетичної інфраструктури України.</p>\r\n\r\n<p>Про це він заявив в інтерв&#39;ю&nbsp;<a href=\"https://nv.ua/ukr/ukraine/events/rosiya-staye-slabshoyu-oleksiy-danilov-pro-krimskiy-mist-ilona-maska-i-putina-novini-ukrajini-50276553.html\" target=\"_blank\">Радіо НВ</a>.</p>\r\n\r\n<p>Він назвав таку оцінку пошкоджень з&nbsp;боку Міненерго некоректною і такою, що&nbsp;не відповідає дійсності.</p>\r\n\r\n<p>&quot;&nbsp;Я&nbsp;хотів би&nbsp;зауважити, що&nbsp;розрахунки, які давав міністр [енергетики] Герман Галущенко про 30%, є абсолютно некоректними. Це&nbsp;не відповідає дійсності&quot;,&nbsp;&mdash; заявив Данілов.</p>\r\n\r\n<p>Також він додав, що&nbsp;все, що&nbsp;можна було впорядкувати, вже виправили.</p>\r\n\r\n<p>&laquo;І&nbsp;не&nbsp;потрібно лякати населення, що&nbsp;у&nbsp;нас 30% енергетичної потужності відсутня. Це&nbsp;не відповідає дійсності. Потрібно дуже коректно все це відслідковувати&raquo;,&nbsp;&mdash; додав секретар РНБО.</p>\r\n\r\n<p>Данілов зазначив, що&nbsp;10 жовтня Росія справді мала плани знищити 30% енергетичної інфраструктури України.</p>\r\n\r\n<p>&quot;&nbsp;Сьогодні відновили майже скрізь, на&nbsp;всіх територіях відновлено енергопостачання. Ми&nbsp;наперед готувалися до&nbsp;всіх цих процесів. Розуміємо, що відбувається у цій галузі, не&nbsp;треба лякати людей&quot;,&nbsp;&mdash; зазначив чиновник.</p>\r\n\r\n<p>Також він додав, що&nbsp;Росія дійсно в&nbsp;планах має продовження знищення критичної інфраструктури України, в&nbsp;тому числі &mdash; газопроводів.</p>\r\n\r\n<p>Раніше глава Міненерго України Герман Галущенко заявляв, що&nbsp;за&nbsp;два дні обстрілу російські ракети та&nbsp;дрони-камікадзе&nbsp;<a href=\"https://biz.nv.ua/ukr/markets/raketni-obstrili-poshkodili-tretinu-ukrajinskoji-energoinfrastrukturi-novini-ukrajini-50276130.html\" target=\"_blank\">пошкодили близько 30% енергетичної інфраструктури України</a>&nbsp;.</p>\r\n\r\n<p>#бізнес #політика</p>\r\n', '2023-10-14 13:23:46', '2023-10-14 13:23:47', '39_634938b2e681a', 28),
(40, 'Мільйони за ніч. Користувачі помітили, що їхні підписники у Facebook різко зникли', 'IT', 'Користувачі з усього світу помічають, що кількість підписників у популярних акаунтів різко впала.', '<p>Користувачі з&nbsp;усього світу помічають, що кількість підписників у&nbsp;популярних акаунтів різко впала. Постраждав навіть генеральний директор компанії Meta&nbsp;<a href=\"https://nv.ua/ukr/tags/mark-tsukerberh.html\" target=\"_blank\">Марк Цукерберг</a>.</p>\r\n\r\n<p><strong><em>UPD. Станом на&nbsp;11:48 у&nbsp;Facebook ніяк не&nbsp;коментували ситуацію, проте проблема вже виправилася, а кількість підписників показується нормально.</em></strong></p>\r\n\r\n<p>Через невідому помилку на&nbsp;публічних сторінках різко скоротилася кількість підписників. З&nbsp;проблемою зіштовхнулися користувачі з&nbsp;усього світу.</p>\r\n\r\n<p>Незалежно від кількості підписників, станом на&nbsp;12 жовтня у&nbsp;багатьох блогерів залишилося до&nbsp;10 тисяч читачів. За інформацією&nbsp;<a href=\"https://ms.detector.media/sotsmerezhi/post/30431/2022-10-12-vidomi-blogery-za-nich-vtratyly-tysyachi-pidpysnykiv-u-facebook/\" target=\"_blank\">Detector Media</a>, головний редактор HUBZ Inform Ігор Тихолаз зараз має 9971 підписників, хоча до&nbsp;цього їх було близько 25 тисяч. Олексій Арестович мав 879 тисяч читачів&nbsp;&mdash; тепер їх 9993.</p>\r\n\r\n<p>&laquo;Про це&nbsp;написали багато хто з&nbsp;моїх знайомих журналістів, друзів. Хто мав 40, хто 50, а&nbsp;хто і 125 тисяч, чи&nbsp;як я&nbsp;25 тисяч&nbsp;&mdash; усі однаково втратили&raquo;,&nbsp;&mdash;&nbsp;<a href=\"https://www.facebook.com/tiholaz/posts/pfbid02Mi1jFAiCdLzfHEu5SQeUYnLYsA5Fy5rKfqDzdKRmrV9L6EwSTxESBA1umm3s3QFul\" target=\"_blank\">повідомляє&nbsp;</a>на&nbsp;своїй сторінці в&nbsp;Facebook Ігор Тихолаз.</p>\r\n\r\n<p>Проблема торкнулася навіть гендиректора Meta Марка Цукерберга&nbsp;&mdash; за ніч кількість його підписників скоротилася зі 119 млн до&nbsp;9993 людей.</p>\r\n\r\n<p>Користувачі підозрюють, що&nbsp;проблема могла критися у&nbsp;певному багу платформи. Дехто вважає, що&nbsp;адміністрація Facebook почистила фейкових підписників, але важко пояснити той факт, що&nbsp;у&nbsp;всіх блогерів кількість підписників впала до&nbsp;приблизно однакової кількості. Є також гіпотези, що&nbsp;ситуація якось може бути пов&rsquo;язаною із&nbsp;<a href=\"https://techno.nv.ua/ukr/it-industry/facebook-instagram-ta-antivoyenniy-ruh-vesna-v-rosiji-viznano-teroristami-novini-50275991.html\" target=\"_blank\">визнанням Meta&nbsp;&laquo;терористичною організацією&raquo; у&nbsp;Росії</a>.</p>\r\n\r\n<p>#it #бізнес</p>\r\n', '2023-10-14 13:28:47', '2024-01-31 18:48:03', '40_634939df7bbcd', 28),
(41, 'Вперше у світі носорога запліднили за допомогою ЕКЗ', 'Наука', 'Це дало надію на порятунок північного білого носорога від вимирання – на планеті залишилося лише дві такі тварини.', '<p>Вчені досягли першої у світі вагітності носорога за допомогою ЕКЗ, успішно перенісши сурогатній матері створений у лабораторії ембріон.</p>\r\n\r\n<p>Про це&nbsp;<a href=\"https://www.bbc.com/news/science-environment-68064432\" target=\"_blank\">пише</a>&nbsp;BBC.</p>\r\n\r\n<p>Процедура проводилася із південними білими носорогами, близьким підвидом північних білих носорогів. Наступний крок &ndash; повторити те саме з північними білими ембріонами.</p>\r\n\r\n<p>&quot;Досягти першого успішного перенесення ембріона носорогу - це величезний крок&quot;, - сказала Сюзанна Хольце, вчена з Інституту досліджень зоопарків та дикої природи Лейбніца в Німеччині, який є частиною проєкту Biorescue, міжнародного консорціуму, який намагається врятувати цей вид. &quot;Але тепер я думаю, що завдяки цьому досягненню ми дуже впевнені, що зможемо створити північних білих носорогів так само і що ми зможемо врятувати цей вид&quot;.</p>\r\n\r\n<p>Колись північні білі носороги водилися по всій Центральній Африці, але незаконне браконьєрство, яке підігрівається попитом на роги носорога, знищило їхню дику популяцію.</p>\r\n\r\n<p>Зараз залишилося лише два носороги: дві самки, Наджин та її дочка Фату. Обидві колишні тварини зоопарку утримуються під суворою охороною в заповіднику Ол Педжета в Кенії.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Вперше у світі носорога запліднили за допомогою ЕКЗ / Фото: Jan Zwilling/BBC / © \" src=\"https://img.tsn.ua/cached/471/tsn-dc382829a98d0f40b34d312a72bcb9b7/thumbs/x/3f/f1/3668355ab365333c4251f4739c89f13f.jpeg\" style=\"height:549px; width:976px\" /></p>\r\n\r\n<p>Вперше у світі носорога запліднили за допомогою ЕКЗ / Фото: Jan Zwilling/BBC</p>\r\n\r\n<p>Нездатний до розмноження цей вид технічно вимер. Але тепер команда біорятувальників звернулася до радикальної науки про народжуваність, щоб урятувати цих тварин від прірви.</p>\r\n\r\n<p>Свою роботу вони розпочали з використання південних білих носорогів. Населення цього близького родича північних білих налічує тисячі особин, і його вважають успішним природоохоронним об&#39;єктом, хоча йому все ще загрожує незаконне полювання.</p>\r\n\r\n<p>На реалізацію проєкту пішли роки, і йому довелося подолати безліч проблем: від розробки способу збирання яйцеклітин від двотонних тварин до створення перших в історії ембріонів носорогів у лабораторії та спроб встановити, як і коли їх імплантувати.</p>\r\n\r\n<p>Для досягнення першої життєздатної вагітності ЕКЗ із використанням південних білих носорогів знадобилося 13 спроб.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Вперше у світі носорога запліднили за допомогою ЕКЗ / Фото: Jan Zwilling/BBC / © \" src=\"https://img.tsn.ua/cached/238/tsn-dc382829a98d0f40b34d312a72bcb9b7/thumbs/x/ea/03/0e5bf0055fab4c8c1d421dcd3b2103ea.jpeg\" style=\"height:549px; width:976px\" /></p>\r\n\r\n<p>Вперше у світі носорога запліднили за допомогою ЕКЗ / Фото: Jan Zwilling/BBC</p>\r\n\r\n<p>Ембріон, створений з використанням яйцеклітини південної білої самки із зоопарку в Бельгії, запліднили спермою самця з Австрії, і перенесли в тіло південної білої сурогатної самки в Кенії. Їй вдалося завагітніти.</p>\r\n\r\n<p>Проте за успіхом була трагедія.</p>\r\n\r\n<p>На сімдесятий день вагітності сурогатна матір померла від зараження клостридіями &ndash; бактеріями, виявленими у ґрунті, які можуть бути смертельними для тварин. Смерть завдала команді удару: розтин показав, що плід чоловічої статі зростом 6,5 см розвивався добре і мав 95% шанс народитися живим.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Вперше у світі носорога запліднили за допомогою ЕКЗ / Фото: Jan Zwilling/BBC / © \" src=\"https://img.tsn.ua/cached/244/tsn-dc382829a98d0f40b34d312a72bcb9b7/thumbs/x/4c/9e/f27f13f078a6e58612c30346dac09e4c.jpeg\" style=\"height:549px; width:976px\" /></p>\r\n\r\n<p>Вперше у світі носорога запліднили за допомогою ЕКЗ / Фото: Jan Zwilling/BBC</p>\r\n\r\n<p>Але це показало, що метод спрацював і що життєздатна вагітність за допомогою ЕКЗ носорога можлива. Тепер наступним кроком буде спроба зробити це за допомогою ембріонів північного білого носорога.</p>\r\n\r\n<p>Наразі існує всього 30 таких дорогоцінних ембріонів, що зберігаються в рідкому азоті в Німеччині та Італії. Вони були створені з використанням яйцеклітин, зібраних у Фату, молодої самки з Кенії, та сперми, зібраної у двох самців північних білих носорогів перед їхньою смертю.</p>\r\n\r\n<p>Втім є ще одна проблема: ані молодша самка Фату, ані її матір Наджин не зможуть завагітніти через вік і слабке здоровʼя. Науковці виключили з програми розведення одного з останніх у світі білих носорогів &mdash; &quot;з етичних міркувань&quot;. Тож ембріон імплантують в утробу сурогатного південного білого носорога.</p>\r\n\r\n<p>ЕКЗ у підвидів ніколи раніше не випробовувалося, але команда впевнена, що це спрацює.</p>\r\n\r\n<p>Команда біорятувальників сподівається імплантувати ембріони у найближчі місяці. Вони хочуть, щоб дитинча народилося, поки ще живі деякі північні білі носороги.</p>\r\n\r\n<p>Дослідники усвідомлюють, що додавання ще декількох тварин за допомогою ЕКЗ не врятує цей вид &mdash; генетичної різноманітності буде недостатньо для створення життєздатної популяції. Тому вони одночасно працюють над ще більш експериментальною методикою, намагаючись створити сперму та яйцеклітину носорога зі стовбурових клітин, щоб потім виробляти ембріони.</p>\r\n', '2024-01-31 18:41:19', '2024-01-31 18:41:20', '41_65ba6a1f9a304', 12),
(42, 'Усик - Ф\'юрі', 'Спорт', 'Усик – Ф\'юрі: букмекери назвали фаворита бою за звання абсолютного чемпіона світу', '<p><strong>Українець і британець проведуть поєдинок за всі пояси надважкого дивізіону.</strong></p>\r\n\r\n<p>29 вересня стало відомо, що чемпіон світу за версіями&nbsp;WBO, WBA, IBO та IBF<strong>&nbsp;</strong><a href=\"https://www.zrist-zirok.site/ukrayinski/oleksandr-usyk/\"><strong>Олександр&nbsp;Усик</strong></a>&nbsp;і&nbsp;володар&nbsp;титулу WBC&nbsp;<strong>Тайсон&nbsp;Ф&#39;юрі</strong>&nbsp;<a href=\"https://tsn.ua/prosport/oficiyno-usik-i-f-yuri-pidpisali-kontrakt-na-biy-za-zvannya-absolyutnogo-chempiona-svitu-2420170.html\"><strong>підписали контракт на бій</strong></a>&nbsp;за звання &quot;абсолюта&quot;&nbsp;в надважкій вазі.</p>\r\n\r\n<p>Довгоочікуваний об&#39;єднавчий поєдинок&nbsp;<a href=\"https://tsn.ua/prosport/usik-f-yuri-oficiyno-ogolosheno-datu-ta-misce-boyu-za-zvannya-absolyutnogo-chempiona-svitu-2452183.html\"><strong>відбудеться</strong></a>&nbsp;17 лютого 2024 року в Ер-Ріяді (Саудівська Аравія).</p>\r\n\r\n<p>Бій між українцем і британцем планували провести 23 грудня 2023 року, але його&nbsp;<a href=\"https://tsn.ua/prosport/biy-usika-ta-f-yuri-pereneseno-koli-vidbudetsya-dovgoochikuvaniy-poyedinok-za-absolyuta-zmi-2441353.html\"><strong>перенесли</strong></a>&nbsp;через травму, яку &quot;Циганський король&quot; отримав у поєдинку проти&nbsp;ексчемпіона UFC Френсіса Нганну 28 жовтня у Саудівській Аравії. Британець&nbsp;побував у нокдауні, але роздільним рішенням суддів&nbsp;<a href=\"https://tsn.ua/prosport/dali-biy-z-usikom-f-yuri-pobuvav-u-nokdauni-ale-peremig-ngannu-2439154.html\"><strong>переміг</strong></a>&nbsp;камеруно-французького&nbsp;бійця&nbsp;ММА, для якого це був дебют у боксі.</p>\r\n\r\n<p>Переможець бою&nbsp;Усик &ndash; Ф&#39;юрі назавжди впише своє ім&#39;я до історії боксу, адже стане першим абсолютним чемпіоном світу в надважкому&nbsp;дивізіоні&nbsp;у XXI столітті.</p>\r\n\r\n<p>Останнім &quot;абсолютом&quot; у&nbsp;хевівейті був легендарний британець Леннокс Льюїс, який 1999 року&nbsp;в об&#39;єднавчому поєдинку&nbsp;переміг американця Евандера Холіфілда.&nbsp;Тоді на кону стояли титули&nbsp;WBA, WBC та IBF.&nbsp;Пояс WBO було визнано рівноцінним 2007 року, тому переможець бою між Усиком і&nbsp;Ф&#39;юрі стане першим в історії &quot;абсолютом&quot; у хевівейті з чотирма&nbsp;головними титулами.</p>\r\n\r\n<p>Букмекери вже приймають ставки на поєдинок між українцем&nbsp;і британцем за&nbsp;абсолютне чемпіонство.</p>\r\n\r\n<h2><strong>Прогнози букмекерів на бій&nbsp;Усик &ndash; Ф&#39;юрі</strong></h2>\r\n\r\n<p>Букмекери вважають&nbsp;фаворитом майбутнього&nbsp;поєдинку&nbsp;&quot;Циганського короля&quot;.&nbsp;На перемогу Ф&#39;юрі можна поставити з коефіцієнтом 1,56.&nbsp;Виграш Усика&nbsp;&ndash;&nbsp;2,50.</p>\r\n\r\n<p>Нічия, як найменш вірогідний результат у боксі, оцінена коефіцієнтом 21,00.</p>\r\n\r\n<p>На думку букмекерів, найбільш імовірним результатом бою є перемога британця за очками&nbsp;&ndash; 2,00. Успіх&nbsp;Ф&#39;юрі нокаутом оцінюється&nbsp;коефіцієнтом 4,50.</p>\r\n\r\n<p>Перемога Усика&nbsp;суддівським&nbsp;рішенням&nbsp;&ndash; 3,80. Достроковий тріумф українського боксера&nbsp;&ndash; 7,50.</p>\r\n', '2024-01-31 18:43:43', '2024-01-31 18:43:43', '42_65ba6aaf1e7e3', 12),
(43, 'Найкращий продукт', 'Наука', 'З ним можна прожити більше 100 років: улюблений продукт довгожителів і всіх українців', '<p><strong>Лікарі рекомендують обов&rsquo;язково їсти цей продукт, бо він попереджає старечі захворювання, позитивно впливаючи на імунітет і процеси травлення.</strong></p>\r\n\r\n<p>Звичайно, це сало. Експерти, які досліджують харчування довгожителів, з&rsquo;ясували, що літні люди їдять цей продукт практично кожного дня. Лікарі рекомендують регулярно їсти сало у помірній кількості, щоб попередити нирзку захворювань і зміцнити здоров&rsquo;я. Тоді можна прожити довге життя і відсвяткувати свої сто років. Розповідаємо, чим корисне сало, що відбувається з організмом, якщо їсти його щодня і кому не слід вживати.</p>\r\n\r\n<h2>Що відбувається з організмом, якщо їсти сало кожного дня</h2>\r\n\r\n<p>Сало містить у своєму складі 90% різноманітних жирів. Також воно багате на вітаміни А, Е, D, які вкрай необхідні для організму, щоб підтримувати всі процеси життєдіяльності на належному рівні. Тому його можна назвати справжнім українським суперфудом.</p>\r\n\r\n<p>Лікарі рекомендують кожного дня їсти по два шматочки сала усім, хто має проблеми із &quot;поганим&quot;&nbsp;холестерином і тим, хто хоче очистити судини. Найкраще їсти сало з чорним хлібом та часником. До того ж, воно не шкодить печінці і забезпечує відчуття ситості на тривалий проміжок часу.</p>\r\n\r\n<p>Також за допомогою сала можна налагодити якісну роботу мозку і поліпшити свої розумові здібності. Цей продукт впливає на наш мозок так само, як і чорний шоколад. Сало має неоціненний вплив на зміцнення імунітету, якість крові та попереджає ракові захворювання.</p>\r\n\r\n<p>Якщо ви належите до категорії мерзляків чи мерзлячок, тоді перед виходом на вулицю у холодну пору року можна з&rsquo;їдати кілька шматочків сала. Секрет у тому, що завдяки вмісту жирних кислот сало має зігріваючий ефект, бо насичує організм корисними мікроелементами.</p>\r\n\r\n<h2>Яка користь сала для шлунково-кишкового тракту</h2>\r\n\r\n<p>Сало вкрай необхідне і корисне для кишківника та шлунку. Воно стимулює правильний та регулярний відтік жовчі, що запобігає різноманітним запальним процесам у внутрішніх органах.</p>\r\n\r\n<p>Також лікарі рекомендують їсти сало, аби налагодити процеси травлення, що вкрай важливо для здоров&rsquo;я людей похилого віку. Бо цей продукт активує виділення ферментів, які покращують обмін речовин, розганяючи метаболізм.</p>\r\n\r\n<p>Продукт містить ряд жирних кислот і вітамінів, які попереджають захворювання шлунково-кишкового тракту.</p>\r\n\r\n<h2>Чи можна їсти сало щодня і кому не слід його вживати</h2>\r\n\r\n<p>Так, сало можна їсти кожного дня, але у невеликих кількостях. Лікарі рекомендують вживати 20 грамів продукту на день за помірного способу життя. А тим, хто займається спортом чи має активні фізичні навантаження, можна їсти 50 грамів сала щодня.</p>\r\n\r\n<p>Сало не можна їсти тим, хто має проблеми із зайвою вагою, ожирінням, травленням, нирками та печінкою.</p>\r\n', '2024-01-31 18:46:15', '2024-01-31 18:46:16', '43_65ba6b47b20d5', 12);

-- --------------------------------------------------------

--
-- Структура таблиці `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `projects`
--

INSERT INTO `projects` (`id`, `title`, `category`, `description`, `user_id`, `photo`) VALUES
(1, 'Новини-12', 'Новини', 'Вечірній випуск новин, який усвідомлює громадян України про найостанніші новини країни, який інформує про все актуальне й необхідне у нинішний час. Незмінна телеведуча Оксана Карпенко та велика команда професіоналів за її спиною донесуть до вас правду!', 12, '1_65b7c21d7fee4'),
(3, 'Хата на тата', 'Розваги', 'Тебе втомив побут? А чоловік не допомагає і не цінує твою працю? Він не приділяє належної уваги дітям і воліє весь час проводити не з тобою, а з телевізором або комп’ютером? Спеціально для таких сімей телеканал створив унікальний проект «Хата на тата», який стартував в ефірі в квітні 2012 року і вже має армію прихильниць – мам, які мріють хоч трохи відпочити.', 12, '3_65b7c47460249'),
(4, 'Євробачення', 'Розваги', 'Конкурсний відбір в Україні на Євробачення проводять з 2016 року. Після виступу всіх учасників найпопулярніша пісня визначається шляхом голосування телеглядачів і журі. У фіналі Національного відбору на Євробачення у 2020 році судді і глядачі одноголосно віддали Go-A максимальну кількість балів — 12. Суспільний мовник запропонував гурту Go-A представляти Україну на Євробаченні-2021. Трансляція грандіозного пісенного конкурсу Євробачення-2021 традиційно відбудеться в ефірі телеканалу 18, 20 і 22 травня о 22:00. Коментатором буде Сергій Притула.', 12, '4_65b7c4e3ea732'),
(5, 'Холостяк', 'Розваги', 'Найромантичніший та найкрасивіший реаліті-проєкт українського телебачення, а також і найбільш обговорюваний. Він збирає біля екранів мільйони українок, кожен раз змушуючи переживати за долі його героїв. Це проєкт про відносини, про те, як завоювати увагу чоловіка та не втратити його симпатію. «Холостяк» показує, що іноді потрібно ризикувати, аби не шкодувати про те, що не зроблено.', 12, '5_65b7c5dd46fab'),
(6, 'Хто зверху?', 'Розваги', '«Хто зверху?» – адаптований каналом формат шоу «Battle of the Sexes» телекомпанії «Talpa». Над створенням проекту працює Творче об’єднання Олени Антонової («Україна чудес», «Хто зверху?», «СуперІнтуїція»). Капітани Леся Нікітюк та Сергій Притула вже зібрали команди зіркових гравців одинадцятого сезону шоу «Хто зверху?». Це буде бій не на життя, а на сміх!...', 12, '6_65b7c7aee7697'),
(7, 'Ліга чемпіонів', 'Спорт', 'Ліга чемпіонів УЄФА — щорічний футбольний турнір, що проводиться поміж європейськими клубами, які найбільш успішно виступили в національних чемпіонатах попереднього сезону. Турнір запроваджено УЄФА. Раніше турнір мав назву Кубок Європейських чемпіонів.', 12, '7_65b7c83eb9fd7'),
(8, 'Антизомбі', 'Новини', 'Легендарний проєкт, який роками знищує російську пропаганду. Проводить факти й іншу важливу інформацію задля запобігання фейкам й іншої штучноствореної дизінформації ворога, методом представлення правди', 12, '8_65b7db609c149');

-- --------------------------------------------------------

--
-- Структура таблиці `teleprogram`
--

CREATE TABLE `teleprogram` (
  `id` int(11) NOT NULL,
  `premiere` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `teleprogram`
--

INSERT INTO `teleprogram` (`id`, `premiere`, `project_id`, `start_time`, `end_time`, `user_id`) VALUES
(2, 1, 3, '00:00:00', '02:00:00', 12),
(3, 1, 7, '02:00:00', '04:00:00', 12),
(4, 1, 8, '06:00:00', '08:00:00', 12),
(5, 1, 5, '08:00:00', '14:00:00', 12),
(6, 1, 3, '14:00:00', '17:00:00', 12),
(7, 1, 1, '17:00:00', '21:00:00', 12),
(8, 1, 8, '21:00:00', '00:00:00', 12),
(9, 2, 1, '00:00:00', '04:00:00', 12),
(10, 2, 4, '04:00:00', '07:00:00', 12),
(11, 2, 5, '07:00:00', '13:30:00', 12),
(12, 2, 8, '13:30:00', '16:00:00', 12),
(13, 2, 1, '16:00:00', '22:00:00', 12),
(14, 2, 3, '22:00:00', '00:00:00', 12),
(15, 3, 1, '00:00:00', '07:00:00', 12),
(16, 3, 6, '07:00:00', '12:00:00', 12),
(17, 3, 3, '12:00:00', '16:00:00', 12);

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'ID',
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Login',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Password',
  `role` int(11) DEFAULT 0 COMMENT 'Access',
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Surname',
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name',
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`, `lastname`, `firstname`, `phone`, `city`) VALUES
(12, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1, 'Гаєвський', 'Артем', NULL, NULL),
(24, 'sergo@gmail.com', '174880e8a33c93a9603698e0fa9f4733', 0, 'Кузьменко', 'Сергій', NULL, NULL),
(25, 'natalia@gmail.com', 'c1ed60949799e3adcd72928bb3314fe0', 0, 'Коваль', 'Наталія', NULL, NULL),
(26, 'mail2@gmail.com', '174880e8a33c93a9603698e0fa9f4733', 0, 'Кравченко', 'Валерій', NULL, NULL),
(27, 'amigoo@gmail.com', '174880e8a33c93a9603698e0fa9f4733', 0, 'Конотоп', 'Максим', NULL, NULL),
(28, 'mail@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0, 'Поліщук', 'Василь', NULL, NULL);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `teleprogram`
--
ALTER TABLE `teleprogram`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;

--
-- AUTO_INCREMENT для таблиці `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблиці `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `teleprogram`
--
ALTER TABLE `teleprogram`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID', AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
