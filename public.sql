/*
 Navicat Premium Dump SQL

 Source Server         : wdpai
 Source Server Type    : PostgreSQL
 Source Server Version : 180000 (180000)
 Source Host           : localhost:5433
 Source Catalog        : db
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 180000 (180000)
 File Encoding         : 65001

 Date: 18/01/2026 23:45:40
*/


-- ----------------------------
-- Sequence structure for posts_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."posts_id_seq";
CREATE SEQUENCE "public"."posts_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for roles_id_roles_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."roles_id_roles_seq";
CREATE SEQUENCE "public"."roles_id_roles_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."users_id_seq";
CREATE SEQUENCE "public"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS "public"."posts";
CREATE TABLE "public"."posts" (
  "id_posts" int4 NOT NULL DEFAULT nextval('posts_id_seq'::regclass),
  "title" varchar(300) COLLATE "pg_catalog"."default" NOT NULL,
  "description" text COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "author" int4
)
;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO "public"."posts" VALUES (11, 'Bieganie to nie wszystko', 'Wielu początkujących biegaczy wpada w pułapkę "tylko biegania". Wydaje się logiczne, że aby biegać szybciej i dalej, trzeba po prostu więcej biegać. Niestety, takie podejście to prosta droga do kontuzji i stagnacji wyników. Nasze stawy i ścięgna potrzebują wsparcia w postaci silnych mięśni głębokich, pośladkowych i brzucha. Trening uzupełniający, czyli siłownia lub ćwiczenia z własną masą ciała, powinien stanowić co najmniej 30% planu treningowego każdego amatora. Ignorowanie regeneracji to kolejny grzech główny – mięśnie rosną i wzmacniają się podczas odpoczynku, a nie w trakcie wysiłku. Zaniedbanie rozciągania i rolowania prowadzi do przykurczów, które zmieniają biomechanikę ruchu, co w konsekwencji obciąża kolana i biodra. Warto też pamiętać o diecie; bez odpowiedniego "paliwa" w postaci węglowodanów złożonych i białka, organizm zacznie "zjadać" własne mięśnie. Mądry trening to nie tylko nabijanie kilometrów w aplikacji, ale holistyczne podejście do własnego ciała, snu i odżywiania.', '2026-01-11 01:57:27.017411', 31);
INSERT INTO "public"."posts" VALUES (1, 'Wypadek przy Filharmonii', 'Kraków to jedno z najpiękniejszych miast w Polsce, ale jak każde duże miasto, ma swoje mniej bezpieczne rejony. Szczególną ostrożność warto zachować w okolicach Dworca Głównego i Plant, gdzie często dochodzi do kradzieży kieszonkowych, zwłaszcza w tłumie podróżnych. W nocy okolice te mogą być niebezpieczne ze względu na obecność agresywnych osób pod wpływem alkoholu lub narkotyków. Podobnie wygląda sytuacja w przejściach podziemnych przy Alejach Trzech Wieszczów, które bywają miejscem zaczepiania przechodniów, a nawet drobnych napaści. Kolejnym miejscem, które budzi niepokój, jest ulica Wielopole i okolice Rynku Głównego po zmroku. To popularne miejsce spotkań, pełne klubów i barów, co sprawia, że często dochodzi tu do bójek i aktów agresji, zwłaszcza w weekendy. Należy uważać również w rejonie Nowej Huty, szczególnie na osiedlach o złej sławie, kojarzonych z działalnością grup pseudokibicowskich. Choć statystyki wskazują, że Nowa Huta staje się coraz bezpieczniejsza i zrywa z dawnymi stereotypami, zapuszczanie się w głąb ciemnych podwórek czy między bloki po zmroku – szczególnie dla osób nieznających topografii dzielnicy – może być ryzykowne. Warto również wspomnieć o Kazimierzu. Choć to jedna z najmodniejszych dzielnic, tłumy turystów w wąskich uliczkach (szczególnie w okolicach Placu Nowego i ulicy Szerokiej) przyciągają kieszonkowców. W weekendowe noce, podobnie jak na Rynku, wysokie stężenie osób pod wpływem alkoholu sprzyja głośnym awanturom i incydentom. Ostrożność należy zachować także w komunikacji miejskiej, zwłaszcza w autobusach i tramwajach nocnych. Zdarzają się tam kradzieże telefonów czy portfeli „na śpiocha”, gdy pasażerowie wracający z imprez tracą czujność. Mimo tych zagrożeń, Kraków pozostaje miastem przyjaznym dla turystów, a zachowanie podstawowych zasad bezpieczeństwa i zdrowego rozsądku zazwyczaj wystarcza, by uniknąć nieprzyjemności.', '2026-01-10 04:50:14.432735', 31);
INSERT INTO "public"."posts" VALUES (8, 'Czy AI zabierze nam pracę?', 'Sztuczna inteligencja rozwija się w tempie, które zaskakuje nawet samych twórców technologii. Jeszcze kilka lat temu algorytmy potrafiły jedynie segregować zdjęcia czy tłumaczyć proste zdania, a dziś piszą kod, tworzą obrazy wygrywające konkursy sztuki i prowadzą płynne konwersacje. Wiele osób zadaje sobie pytanie, czy ich zawód przetrwa najbliższą dekadę. Szczególnie zagrożone wydają się branże kreatywne, copywriterzy, graficy, a nawet programiści na niższych szczeblach. Jednak eksperci uspokajają – historia pokazuje, że każda rewolucja technologiczna, od maszyny parowej po internet, nie tyle niszczyła miejsca pracy, co je transformowała. Zamiast obawiać się "buntu maszyn", powinniśmy raczej skupić się na nauce współpracy z nowymi narzędziami. W przyszłości na rynku wygrają nie ci, którzy walczą z AI, ale ci, którzy potrafią wydajnie wykorzystać jej potencjał do przyspieszenia własnych zadań. Kluczem do sukcesu będzie adaptacja i ciągła nauka nowych umiejętności, których algorytm (jeszcze) nie posiada, takich jak empatia czy strategiczne myślenie.', '2026-01-11 01:56:03.052515', 32);
INSERT INTO "public"."posts" VALUES (12, 'Kryptowaluty: Szansa czy hazard?', 'Rynek kryptowalut od lat budzi skrajne emocje. Z jednej strony słyszymy historie o nastolatkach, którzy zostali milionerami dzięki Bitcoinowi, z drugiej o ludziach, którzy stracili dorobek życia w jeden dzień. Zmienność tego rynku jest niespotykana w tradycyjnych finansach; spadki o 20-30% w ciągu doby są tu na porządku dziennym. Dla niedoświadczonego inwestora wejście w ten świat bez odpowiedniej wiedzy to czysty hazard. Wiele projektów to tzw. "scamy", stworzone tylko po to, by wyciągnąć pieniądze od nieświadomych użytkowników i zniknąć. Zanim zdecydujesz się ulokować tu jakiekolwiek środki, musisz zrozumieć technologię blockchain, na której to wszystko się opiera. Nie warto kierować się FOMO (strachem przed przegapieniem okazji), bo to najgorszy doradca inwestycyjny. Złota zasada brzmi: inwestuj tylko tyle, ile jesteś gotów stracić. Kryptowaluty mogą być elementem dywersyfikacji portfela, ale traktowanie ich jako pewnego sposobu na szybkie bogactwo zazwyczaj kończy się bolesnym zderzeniem z rzeczywistością.', '2026-01-11 01:57:57.662594', 32);
INSERT INTO "public"."posts" VALUES (9, 'Vanlife w Portugalii', 'Decyzja o rzuceniu korporacji i wyjeździe starym kamperem na południe Europy była jedną z najlepszych w moim życiu, choć początki wcale nie wyglądały jak na zdjęciach z Instagrama. Portugalia przywitała nas deszczem i awarią silnika już na granicy z Hiszpanią. Jednak to, co wydarzyło się później, wynagrodziło wszelkie trudy. Wybrzeże Algarve to prawdziwy raj dla miłośników dzikiej natury – ogromne, pomarańczowe klify kontrastujące z turkusem oceanu zapierają dech w piersiach. Życie w vanie uczy minimalizmu; nagle okazuje się, że do szczęścia wystarczy deska surfingowa, dobra kawa o poranku i widok na ocean. Oczywiście są też minusy: szukanie miejsca do zaparkowania na noc, limitowana woda czy brak stałego dostępu do prądu bywają frustrujące. Mimo to, poczucie absolutnej wolności, kiedy każdego dnia możesz obudzić się w innym miejscu, jest nie do przecenienia. Społeczność vanliferów jest niezwykle otwarta – wieczorne ogniska z ludźmi z całego świata to standard. To podróż, która zmienia priorytety i pokazuje, jak niewiele potrzeba, by czuć się bogatym.', '2026-01-11 01:56:30.074079', 34);
INSERT INTO "public"."posts" VALUES (13, 'Cyfrowy detoks w praktyce', 'Żyjemy w czasach ciągłego podłączenia. Powiadomienia z mediów społecznościowych, e-maile z pracy i wiadomości od znajomych bombardują nas od momentu otwarcia oczu aż do późnej nocy. Postanowiłem przeprowadzić eksperyment i na cały weekend wyłączyć telefon, laptopa i telewizor. Początek był trudniejszy, niż przypuszczałem – odruch sięgania do kieszeni po smartfona pojawiał się co kilka minut, towarzyszyło mi dziwne uczucie niepokoju, że coś mnie omija. Jednak po kilku godzinach to napięcie zaczęło ustępować miejsca czemuś, o czym dawno zapomniałem: nudzie. I to właśnie w tej nudzie odnalazłem spokój. Czas zwolnił. Zamiast scrollować tablicę, przeczytałem pół książki, poszedłem na długi spacer bez słuchawek w uszach i odbyłem z partnerką rozmowę, podczas której nikt nie patrzył w ekran. Okazało się, że świat się nie zawalił, bo nie odpisałem na messengera przez 48 godzin. Ten detoks uświadomił mi, jak bardzo jesteśmy przebodźcowani i jak ważne dla higieny psychicznej jest bycie offline, choćby przez chwilę. Dokładnie!', '2026-01-11 01:58:17.543256', 30);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS "public"."roles";
CREATE TABLE "public"."roles" (
  "id_roles" int4 NOT NULL DEFAULT nextval('roles_id_roles_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO "public"."roles" VALUES (2, 'user');
INSERT INTO "public"."roles" VALUES (1, 'admin');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "public"."users";
CREATE TABLE "public"."users" (
  "id_users" int4 NOT NULL DEFAULT nextval('users_id_seq'::regclass),
  "name" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "surname" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "avatar" varchar(255) COLLATE "pg_catalog"."default" DEFAULT 'public/img/users/default_avatar.svg'::character varying,
  "role" int4 NOT NULL DEFAULT 2
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "public"."users" VALUES (32, 'Adrianna', 'Goldmann', 'gold@user.pl', '$2y$10$4NdnMUxKmcgmPIPcaGwd7uNBD1qonY0q5mzkkmUbo97FOL7/FjoJe', 'public/img/users/user_32.jpg', 2);
INSERT INTO "public"."users" VALUES (30, 'Ania', 'Kowal', 'ania@mejl.com', '$2y$12$xwBk.iar7cBj9g4MnJ5TheZKlUq0CzLHh5OHUCHqjXBupOFTC9rD6', 'public/img/users/user_30.jpg', 2);
INSERT INTO "public"."users" VALUES (31, 'Bartek', 'Korczek', 'bako@post.com', '$2y$10$odYxYVHbwbanFc6voJrfXOvI13miJeiDJt5UWAse2tl.jA3kzpQjq', 'public/img/users/user_31.jpg', 2);
INSERT INTO "public"."users" VALUES (33, 'Adam', 'Admin', 'admin@test.com', '$2y$12$hZTg/ozpzg37RiiXHMkRMOdyXs4kgRCpmJZo2GzaQfuRL8BE9UOem', 'public/img/users/default_avatar.svg', 1);
INSERT INTO "public"."users" VALUES (34, 'Robert', 'Wu', 'robert@post.com', '$2y$12$cpXY3Z8bgYdlwZwxE8DFfO247o5OcGkJduo.q9NoBIxSasLzSeMBW', 'public/img/users/default_avatar.svg', 2);
INSERT INTO "public"."users" VALUES (39, 'Imi', 'Naz', 'a@b.com', '$2y$12$Z1lhvHtFIY0.40YOw97VWeHywP.S4jomkMkoL1rf8tfxvZuCQYgha', 'public/img/users/default_avatar.svg', 2);

-- ----------------------------
-- Function structure for f_format_user_data
-- ----------------------------
DROP FUNCTION IF EXISTS "public"."f_format_user_data"();
CREATE FUNCTION "public"."f_format_user_data"()
  RETURNS "pg_catalog"."trigger" AS $BODY$
BEGIN
  new.name := INITCAP(new.name);
  new.surname := INITCAP(new.surname);
  new.email := LOWER(new.email);
  
  return new;
  END;
  $BODY$
  LANGUAGE plpgsql VOLATILE
  COST 100;

-- ----------------------------
-- Procedure structure for p_register_user
-- ----------------------------
DROP PROCEDURE IF EXISTS "public"."p_register_user"("p_name" varchar, "p_surname" varchar, "p_email" varchar, "p_password" varchar);
CREATE PROCEDURE "public"."p_register_user"("p_name" varchar, "p_surname" varchar, "p_email" varchar, "p_password" varchar)
 AS $BODY$
BEGIN
    INSERT INTO users (name, surname, email, password, role)
    VALUES (p_name, p_surname, p_email, p_password, 2);

    COMMIT;
    
EXCEPTION
    WHEN OTHERS THEN
        ROLLBACK;
        RAISE EXCEPTION 'Błąd rejestracji: %', SQLERRM;
END;
$BODY$
  LANGUAGE plpgsql;

-- ----------------------------
-- View structure for v_posts_details
-- ----------------------------
DROP VIEW IF EXISTS "public"."v_posts_details";
CREATE VIEW "public"."v_posts_details" AS  SELECT p.id_posts,
    p.title,
    p.description,
    u.avatar,
    u.name,
    u.surname,
    p.author
   FROM posts p
     LEFT JOIN users u ON p.author = u.id_users
  ORDER BY p.created_at DESC;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."posts_id_seq"
OWNED BY "public"."posts"."id_posts";
SELECT setval('"public"."posts_id_seq"', 31, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."roles_id_roles_seq"
OWNED BY "public"."roles"."id_roles";
SELECT setval('"public"."roles_id_roles_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."users_id_seq"
OWNED BY "public"."users"."id_users";
SELECT setval('"public"."users_id_seq"', 39, true);

-- ----------------------------
-- Primary Key structure for table posts
-- ----------------------------
ALTER TABLE "public"."posts" ADD CONSTRAINT "posts_pkey" PRIMARY KEY ("id_posts");

-- ----------------------------
-- Uniques structure for table roles
-- ----------------------------
ALTER TABLE "public"."roles" ADD CONSTRAINT "roles_name_key" UNIQUE ("name");

-- ----------------------------
-- Primary Key structure for table roles
-- ----------------------------
ALTER TABLE "public"."roles" ADD CONSTRAINT "roles_pkey" PRIMARY KEY ("id_roles");

-- ----------------------------
-- Triggers structure for table users
-- ----------------------------
CREATE TRIGGER "t_format_username" BEFORE INSERT OR UPDATE ON "public"."users"
FOR EACH ROW
EXECUTE PROCEDURE "public"."f_format_user_data"();

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_email_key" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id_users");

-- ----------------------------
-- Foreign Keys structure for table posts
-- ----------------------------
ALTER TABLE "public"."posts" ADD CONSTRAINT "fk_posts_users" FOREIGN KEY ("author") REFERENCES "public"."users" ("id_users") ON DELETE SET NULL ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table users
-- ----------------------------
ALTER TABLE "public"."users" ADD CONSTRAINT "fk_users_roles" FOREIGN KEY ("role") REFERENCES "public"."roles" ("id_roles") ON DELETE RESTRICT ON UPDATE CASCADE;
