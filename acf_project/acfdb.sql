CREATE SCHEMA acf_tpbuilder;

CREATE TABLE acf_tpbuilder.contact_information ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	rank                 varchar(15)    ,
	first_name           varchar(100)    ,
	second_name          varchar(100)    ,
	affiliation          varchar(100)    ,
	address_1            varchar(100)    ,
	address_2            varchar(100)    ,
	address_3            varchar(100)    ,
	city                 varchar(50)    ,
	region               varchar(100)    ,
	country              varchar(50)    ,
	postcode             varchar(10)    ,
	primary_phone        varchar(15)    ,
	secondary_phone      varchar(15)    ,
	CONSTRAINT pk_battalion PRIMARY KEY ( id )
 ) engine=InnoDB;

CREATE TABLE acf_tpbuilder.lesson_type ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	name                 varchar(100)  NOT NULL  ,
	url                  varchar(100)    ,
	CONSTRAINT pk_lesson_type PRIMARY KEY ( id )
 ) engine=InnoDB;

CREATE TABLE acf_tpbuilder.permission_type ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	name                 varchar(100)    ,
	CONSTRAINT pk_permission_type UNIQUE ( id ) ,
	CONSTRAINT pk_permission_type_0 PRIMARY KEY ( id )
 ) engine=InnoDB;

CREATE TABLE acf_tpbuilder.qualifications ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	name                 varchar(100)  NOT NULL  ,
	qualificaiton_type_id int  NOT NULL  ,
	CONSTRAINT pk_qualifications PRIMARY KEY ( id ),
	CONSTRAINT pk_qualifications_0 UNIQUE ( qualificaiton_type_id ) 
 );

CREATE TABLE acf_tpbuilder.syllabus ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	name                 char(25)    ,
	drill_periods        int    ,
	mk_periods           int    ,
	saa_periods          int    ,
	nav_periods          int    ,
	fieldcraft           int    ,
	fa_periods           int    ,
	exped_periods        int    ,
	pt_periods           int    ,
	admin_periods        int    ,
	shooting_periods     int    ,
	cadet_com_periods    int    ,
	revision_periods     int    ,
	total_periods        int    ,
	CONSTRAINT pk_syllabus PRIMARY KEY ( id )
 );

CREATE TABLE acf_tpbuilder.battalion ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	name                 varchar(100)  NOT NULL  ,
	affiliation          varchar(100)    ,
	contact_information_id int    ,
	CONSTRAINT pk_battalion_0 PRIMARY KEY ( id ),
	CONSTRAINT fk_battalion FOREIGN KEY ( contact_information_id ) REFERENCES acf_tpbuilder.contact_information( id ) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) engine=InnoDB;

CREATE INDEX idx_battalion ON acf_tpbuilder.battalion ( contact_information_id );

CREATE TABLE acf_tpbuilder.company ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	name                 varchar(100)    ,
	battalion_id         int  NOT NULL  ,
	contact_information_id int  NOT NULL  ,
	CONSTRAINT pk_company PRIMARY KEY ( id ),
	CONSTRAINT fk_company FOREIGN KEY ( contact_information_id ) REFERENCES acf_tpbuilder.contact_information( id ) ON DELETE NO ACTION ON UPDATE NO ACTION,
	CONSTRAINT fk_company_0 FOREIGN KEY ( battalion_id ) REFERENCES acf_tpbuilder.battalion( id ) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) engine=InnoDB;

CREATE INDEX idx_company ON acf_tpbuilder.company ( contact_information_id );

CREATE INDEX idx_company_0 ON acf_tpbuilder.company ( battalion_id );

CREATE TABLE acf_tpbuilder.lesson ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	lesson_type_id       int    ,
	ser                  int    ,
	title                char(125)    ,
	chapter              char(10)    ,
	section              char(10)    ,
	no_of_periods        int    ,
	syllabus_id          int    ,
	sub_title            char(125)    ,
	CONSTRAINT pk_fieldcraft_lesson PRIMARY KEY ( id ),
	CONSTRAINT fieldcraft_lessons_syllabus_id_fk FOREIGN KEY ( syllabus_id ) REFERENCES acf_tpbuilder.syllabus( id ) ON DELETE NO ACTION ON UPDATE NO ACTION,
	CONSTRAINT fk_lesson FOREIGN KEY ( lesson_type_id ) REFERENCES acf_tpbuilder.lesson_type( id ) ON DELETE NO ACTION ON UPDATE NO ACTION
 );

CREATE INDEX fieldcraft_lessons_syllabus_id_fk ON acf_tpbuilder.lesson ( syllabus_id );

CREATE INDEX idx_lesson ON acf_tpbuilder.lesson ( lesson_type_id );

CREATE TABLE acf_tpbuilder.qualification_type ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	name                 varchar(100)    ,
	CONSTRAINT pk_qualification_type PRIMARY KEY ( id ),
	CONSTRAINT fk_qualification_type FOREIGN KEY ( id ) REFERENCES acf_tpbuilder.qualifications( qualificaiton_type_id ) ON DELETE NO ACTION ON UPDATE NO ACTION
 ) engine=InnoDB;

CREATE TABLE acf_tpbuilder.cadet ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	first_name           char(25)    ,
	last_name            char(25)    ,
	rank                 char(25)    ,
	cdt_fc_matrix_id     int    ,
	syllabus_id          int    ,
	detachment_id        int    ,
	contact_information_id int    ,
	CONSTRAINT pk_cadet PRIMARY KEY ( id ),
	CONSTRAINT cadets_cdt_fc_matrix_id_uindex UNIQUE ( cdt_fc_matrix_id ) ,
	CONSTRAINT pk_cadet_0 UNIQUE ( contact_information_id ) 
 );

CREATE INDEX idx_cadet ON acf_tpbuilder.cadet ( detachment_id );

CREATE INDEX idx_cadet_0 ON acf_tpbuilder.cadet ( syllabus_id );

CREATE TABLE acf_tpbuilder.cdt_fieldcraft_matrix ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	ser1                 int    ,
	ser2                 int    ,
	ser3                 int    ,
	ser4                 int    ,
	ser5                 int    ,
	ser6                 int    ,
	ser7                 int    ,
	ser8                 int    ,
	ser9                 int    ,
	ser10                int    ,
	ser11                int    ,
	ser12                int    ,
	ser13                int    ,
	ser14                int    ,
	ser15                int    ,
	ser16                int    ,
	ser17                int    ,
	ser18                int    ,
	ser19                int    ,
	ser20                int    ,
	ser21                int    ,
	ser22                int    ,
	ser23                int    ,
	ser24                int    ,
	ser25                int    ,
	ser26                int    ,
	ser27                int    ,
	ser28                int    ,
	ser29                int    ,
	ser30                int    ,
	ser31                int    ,
	ser32                int    ,
	ser33                int    ,
	ser34                int    ,
	ser35                int    ,
	ser36                int    ,
	ser37                int    ,
	ser38                int    ,
	ser39                int    ,
	ser40                int    ,
	ser41                int    ,
	ser42                int    ,
	ser43                int    ,
	ser45                int    ,
	ser46                int    ,
	CONSTRAINT pk_cdt_fieldcraft_matrix PRIMARY KEY ( id )
 );

CREATE TABLE acf_tpbuilder.detachment ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	name                 varchar(100)    ,
	affiliation          varchar(100)    ,
	contact_information_id int    ,
	detachment_commander_id int    ,
	second_in_command_id int    ,
	company_id           int    ,
	CONSTRAINT pk_detachment PRIMARY KEY ( id ),
	CONSTRAINT pk_detachment_0 PRIMARY KEY ( id )
 ) engine=InnoDB;

CREATE INDEX idx_detachment ON acf_tpbuilder.detachment ( company_id );

CREATE INDEX idx_detachment_0 ON acf_tpbuilder.detachment ( contact_information_id );

CREATE INDEX idx_detachment_1 ON acf_tpbuilder.detachment ( detachment_commander_id );

CREATE INDEX idx_detachment_2 ON acf_tpbuilder.detachment ( second_in_command_id );

CREATE TABLE acf_tpbuilder.instructor ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	number               int UNSIGNED NOT NULL  ,
	first_name           varchar(45)  NOT NULL  ,
	last_name            varchar(45)  NOT NULL  ,
	rank                 varchar(45)  NOT NULL  ,
	instructor_qualifications_id int    ,
	detachment_id        int    ,
	contact_infomration_id int    ,
	CONSTRAINT pk_instructor PRIMARY KEY ( id )
 );

CREATE INDEX idx_instructor ON acf_tpbuilder.instructor ( instructor_qualifications_id );

CREATE INDEX idx_instructor_0 ON acf_tpbuilder.instructor ( detachment_id );

CREATE INDEX idx_instructor_1 ON acf_tpbuilder.instructor ( contact_infomration_id );

CREATE TABLE acf_tpbuilder.instructor_qualifications ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	instructor_id        int  NOT NULL  ,
	qualification_id     int  NOT NULL  ,
	awarded              int  NOT NULL  ,
	expires              int    ,
	grade                varchar(25)    ,
	CONSTRAINT pk_instructor_qualifications PRIMARY KEY ( id )
 ) engine=InnoDB;

CREATE INDEX idx_instructor_qualifications ON acf_tpbuilder.instructor_qualifications ( qualification_id );

CREATE INDEX idx_instructor_qualifications_0 ON acf_tpbuilder.instructor_qualifications ( instructor_id );

CREATE TABLE acf_tpbuilder.lesson_plan ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	lesson_id            int  NOT NULL  ,
	instructor_id        int    ,
	start                long varchar    ,
	middle               long varchar    ,
	end                  long varchar    ,
	timestamp            int    ,
	period_count         int    ,
	length               int    ,
	permission_type_id   int    ,
	CONSTRAINT pk_lesson_plan PRIMARY KEY ( id )
 ) engine=InnoDB;

CREATE INDEX idx_lesson_plan ON acf_tpbuilder.lesson_plan ( permission_type_id );

CREATE INDEX idx_lesson_plan_0 ON acf_tpbuilder.lesson_plan ( lesson_id );

CREATE INDEX idx_lesson_plan_1 ON acf_tpbuilder.lesson_plan ( instructor_id );

CREATE TABLE acf_tpbuilder.roles ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	user_id              int  NOT NULL  ,
	name                 varchar(100)    ,
	CONSTRAINT pk_roles PRIMARY KEY ( id )
 ) engine=InnoDB;

CREATE INDEX idx_roles ON acf_tpbuilder.roles ( user_id );

CREATE TABLE acf_tpbuilder.`user` ( 
	id                   int  NOT NULL  AUTO_INCREMENT,
	user_name            varchar(45)  NOT NULL  ,
	password             char(125)    ,
	instructor_id        int    ,
	det_commander        int    ,
	det_2ic              int    ,
	CONSTRAINT pk_user PRIMARY KEY ( id ),
	CONSTRAINT `user_name_UNIQUE` UNIQUE ( user_name ) 
 );

CREATE INDEX users_instructors_id_fk ON acf_tpbuilder.`user` ( instructor_id );

ALTER TABLE acf_tpbuilder.cadet ADD CONSTRAINT fk_cadet_0 FOREIGN KEY ( contact_information_id ) REFERENCES acf_tpbuilder.contact_information( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.cadet ADD CONSTRAINT fk_cadet FOREIGN KEY ( detachment_id ) REFERENCES acf_tpbuilder.detachment( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.cadet ADD CONSTRAINT fk_cadet_1 FOREIGN KEY ( syllabus_id ) REFERENCES acf_tpbuilder.syllabus( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.cdt_fieldcraft_matrix ADD CONSTRAINT fk_cdt_fieldcraft_matrix FOREIGN KEY ( id ) REFERENCES acf_tpbuilder.cadet( cdt_fc_matrix_id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.detachment ADD CONSTRAINT fk_detachment FOREIGN KEY ( company_id ) REFERENCES acf_tpbuilder.company( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.detachment ADD CONSTRAINT fk_detachment_0 FOREIGN KEY ( contact_information_id ) REFERENCES acf_tpbuilder.contact_information( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.detachment ADD CONSTRAINT fk_detachment_1 FOREIGN KEY ( second_in_command_id ) REFERENCES acf_tpbuilder.instructor( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.detachment ADD CONSTRAINT fk_detachment_2 FOREIGN KEY ( detachment_commander_id ) REFERENCES acf_tpbuilder.instructor( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.instructor ADD CONSTRAINT fk_instructor FOREIGN KEY ( instructor_qualifications_id ) REFERENCES acf_tpbuilder.contact_information( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.instructor ADD CONSTRAINT fk_instructor_1 FOREIGN KEY ( contact_infomration_id ) REFERENCES acf_tpbuilder.contact_information( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.instructor ADD CONSTRAINT fk_instructor_0 FOREIGN KEY ( detachment_id ) REFERENCES acf_tpbuilder.detachment( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.instructor_qualifications ADD CONSTRAINT fk_instructor_qualifications FOREIGN KEY ( qualification_id ) REFERENCES acf_tpbuilder.qualifications( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.instructor_qualifications ADD CONSTRAINT fk_instructor_qualifications_0 FOREIGN KEY ( instructor_id ) REFERENCES acf_tpbuilder.instructor( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.lesson_plan ADD CONSTRAINT fk_lesson_plan FOREIGN KEY ( permission_type_id ) REFERENCES acf_tpbuilder.permission_type( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.lesson_plan ADD CONSTRAINT fk_lesson_plan_0 FOREIGN KEY ( lesson_id ) REFERENCES acf_tpbuilder.lesson( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.lesson_plan ADD CONSTRAINT fk_lesson_plan_1 FOREIGN KEY ( instructor_id ) REFERENCES acf_tpbuilder.instructor( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.roles ADD CONSTRAINT fk_roles FOREIGN KEY ( user_id ) REFERENCES acf_tpbuilder.`user`( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

ALTER TABLE acf_tpbuilder.`user` ADD CONSTRAINT fk_user FOREIGN KEY ( instructor_id ) REFERENCES acf_tpbuilder.instructor( id ) ON DELETE NO ACTION ON UPDATE NO ACTION;

INSERT INTO acf_tpbuilder.contact_information( id, rank, first_name, second_name, affiliation, address_1, address_2, address_3, city, region, country, postcode, primary_phone, secondary_phone ) VALUES ( 1, 'Maj', 'Nancy', 'Thorne', 'AGC', 'Drumshorland House', '7 Illieston Castle Steadings', 'Broxburn', 'Edinburgh', 'Midlothian', 'UK', 'EH52 5PD', '01506 856698', null ); 
INSERT INTO acf_tpbuilder.contact_information( id, rank, first_name, second_name, affiliation, address_1, address_2, address_3, city, region, country, postcode, primary_phone, secondary_phone ) VALUES ( 2, 'Captian', 'Peter', 'Macdonald', 'Royal Regiment Of Scotland', 'Drumshorland House', '7 Illieston Castle Steadings', 'Broxburn', 'Edinburgh', 'Midlothian', 'UK', 'EH52 5PD', '01506 856698', null ); 
INSERT INTO acf_tpbuilder.contact_information( id, rank, first_name, second_name, affiliation, address_1, address_2, address_3, city, region, country, postcode, primary_phone, secondary_phone ) VALUES ( 3, 'SSI', 'Jennifer', 'Bush', 'Royal Signals', null, null, null, null, null, null, null, null, null ); 

INSERT INTO acf_tpbuilder.lesson_type( id, name, url ) VALUES ( 1, 'Fieldcraft', 'fieldcraft' ); 
INSERT INTO acf_tpbuilder.lesson_type( id, name, url ) VALUES ( 2, 'Foot Drill', 'footDrill' ); 
INSERT INTO acf_tpbuilder.lesson_type( id, name, url ) VALUES ( 3, 'Military Knowledge', 'militaryKnowledge' ); 

INSERT INTO acf_tpbuilder.qualifications( id, name, qualificaiton_type_id ) VALUES ( 1, '', 0 ); 

INSERT INTO acf_tpbuilder.syllabus( id, name, drill_periods, mk_periods, saa_periods, nav_periods, fieldcraft, fa_periods, exped_periods, pt_periods, admin_periods, total_periods, shooting_periods, cadet_com_periods, revision_periods ) VALUES ( 1, 'Basic', 9, 3, 10, 6, 2, 1, 1, 6, 5, 42, 0, 0, 9 ); 
INSERT INTO acf_tpbuilder.syllabus( id, name, drill_periods, mk_periods, saa_periods, nav_periods, fieldcraft, fa_periods, exped_periods, pt_periods, admin_periods, total_periods, shooting_periods, cadet_com_periods, revision_periods ) VALUES ( 2, '1 Star', 7, 1, 15, 9, 30, 8, 6, 12, 0, 100, 10, 2, 25 ); 
INSERT INTO acf_tpbuilder.syllabus( id, name, drill_periods, mk_periods, saa_periods, nav_periods, fieldcraft, fa_periods, exped_periods, pt_periods, admin_periods, total_periods, shooting_periods, cadet_com_periods, revision_periods ) VALUES ( 3, '2 Star', 12, 1, 12, 15, 38, 20, 12, 0, 0, 138, 12, 4, 27 ); 
INSERT INTO acf_tpbuilder.syllabus( id, name, drill_periods, mk_periods, saa_periods, nav_periods, fieldcraft, fa_periods, exped_periods, pt_periods, admin_periods, total_periods, shooting_periods, cadet_com_periods, revision_periods ) VALUES ( 4, '3 Star', 12, 10, 0, 12, 35, 16, 12, 12, 0, 176, 10, 31, 25 ); 

INSERT INTO acf_tpbuilder.battalion( id, name, affiliation, contact_information_id ) VALUES ( 2, 'Lothian And Borders', 'Royal Regiment Of Scotland', 1 ); 

INSERT INTO acf_tpbuilder.company( id, battalion_id, contact_information_id, name ) VALUES ( 3, 2, 2, 'Tangier' ); 

INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 1, 'Intorduction to Cadet Fieldcraft', '0', '1C', 1, 1, null, 1, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 2, 'Preparation and Packing of Personal Equipment', '1', 'Lesson 1', 1, 1, null, 2, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 3, 'Administration in The Field', '1', 'Lesson 2', 3, 2, '', 3, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 4, 'Administration in The Field', '1', 'Lesson 2A', 1, 2, 'Maintaining Weapons, Clothing And Equipment', 4, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 5, 'Administration in The Field', '1', 'Lesson 2B', 1, 2, 'Maintaining Standards Of Personal Hygiene', 5, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 6, 'Administration in The Field', '1', 'Lesson 2A', 1, 2, 'Feeding in the Field', 6, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 7, 'Two Man Shelter', '1', 'Lesson 3', 1, 2, null, 7, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 8, 'Why Things Are Seen', '1', 'Lesson 4', 1, 2, null, 8, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 9, 'Personal Camouflage And Concealment', '1', 'Lesson 5', 1, 2, null, 9, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 10, 'judging Distance', '1', 'Lesson 7', 3, 2, null, 10, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 11, 'judging Distance', '1', 'Lesson 7A', 1, 2, 'Judging Distance By Unit Of Measure', 11, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 12, 'judging Distance', '1', 'Lesson 7B', 1, 2, 'Judging Distance By Appearance', 12, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 13, 'judging Distance', '1', 'Lesson 7C', 1, 2, 'Aids To Judging Distance', 13, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 14, 'Indication Of Targets', '1', 'Lesson 8', 1, 2, null, 14, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 15, 'Range Cards', '1', 'Lesson 9', 1, 2, null, 15, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 16, 'Duties Of A Sentry', '1', 'Lesson 10', 1, 2, null, 16, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 17, 'Moving With Or Without Personal Weapon', '1', 'Lesson 11', 1, 2, null, 17, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 18, 'Field Signals', '1', 'Lesson 12', 1, 2, null, 18, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 19, 'Elementary Obstacle Crossing', '1', 'Lesson 13', 1, 2, null, 19, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 20, 'Selecting A Route Across country', '1', 'Lesson 14', 1, 2, null, 20, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 21, 'Introduction To Night Training', '1', 'Lesson 15', 1, 2, null, 21, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 22, 'Elementary Night Movement', '1', 'Lesson 16', 1, 2, null, 22, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 23, 'Stalking', '1', 'Lesson 17', 1, 2, null, 23, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 24, 'Reaction to fire Control Orders', '1', 'Lesson 18', 1, 2, null, 24, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 25, 'Keeping Direction At Night', '1', 'lesson 19', 1, 3, null, 25, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 26, 'Individual Fire And Movement (F & M)', '1', 'Lesson 20', 1, 3, null, 26, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 27, 'Operating As A Member Of A Fire Team', '1', 'Lesson 21', 1, 3, null, 27, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 28, 'Organisation and Grouping', '2', 'Section 2', 1, 3, null, 28, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 29, 'Patrolling', '2', 'Sectoin 3', 10, 3, null, 29, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 30, 'Patrolling', '2', 'Section 3A', null, 3, 'Planning and Preparation', 30, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 31, 'Patrolling', '2', 'Section 3B', null, 3, 'Conduct', 31, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 32, 'Battle Procedure, Functional Group And Orders', '2', 'Section 9', 2, 3, null, 32, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 33, 'Patrol Harbours', '2', 'Section 4', 4, 3, null, 33, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 34, 'Observation Posts', '2', 'Section 6', 2, 3, null, 34, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 35, 'Defence and Delay Operations', '2', 'Section 5', 1, 4, null, 35, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 36, 'Ambushes', '2', 'Section 7', 10, 4, null, 36, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 37, 'Ambushes', '2', 'Section 7A', null, 4, 'Organisation', 37, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 38, 'Ambushes', '2', 'Section 7B', null, 4, 'Planning and Preparation', 38, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 39, 'Ambushes', '2', 'Section 7C', null, 4, 'Conduct', 39, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 40, 'The Attack', '2', 'Section 8', 10, 4, null, 40, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 41, 'The Attack', '2', 'Section 8A', null, 4, 'Principles', 41, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 42, 'The Attack', '2', 'Section 8B', null, 4, 'Fire and Manoeuvre', 42, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 43, 'The Attack', '2', 'Section 8C', null, 4, 'Hasty Attack: Section Battle Drills', 43, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 44, 'The Attack', '2', 'Section 8E', null, 4, 'The Deliberate Attack', 44, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 45, 'The Attack', '2', 'Section 8F', null, 4, 'Advance to Contact', 45, 1 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 46, 'Ranks and Badges of Rank', '3', 'Section 1', 1, 1, null, 1, 3 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 47, 'History of ACF to Present Day', '3', 'Section 5', 1, 1, null, 2, 3 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 48, 'Enrolment Ceremony', '3', 'Section 6', 1, 1, null, 3, 3 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 49, 'Turnout', '1', 'Section 1', 2, 1, null, 1, 2 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 50, 'The Aim and Purpose of Drill', '2', 'Section 1', 1, 1, null, 2, 2 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 51, 'Positions of Attention, Stand Easy and Stand at Ease', '2', 'Section 2', 1, 1, null, 3, 2 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 52, 'Turnings at the Halt', '2', 'Section 3', 1, 1, null, 4, 2 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 53, 'Compliments - Reason, Origin & Information', '2', 'Section 4', 1, 1, null, 5, 2 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 54, 'Saluting to the Front', '2', 'Section 5', 1, 1, null, 6, 2 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 55, 'Introduction to Marching', '2', 'Section 6', 1, 1, null, 7, 2 ); 
INSERT INTO acf_tpbuilder.lesson( id, title, chapter, section, no_of_periods, syllabus_id, sub_title, ser, lesson_type_id ) VALUES ( 56, 'Marching and Halting in Quick Time', '2', 'Section 7', 1, 1, null, 2, 2 ); 

INSERT INTO acf_tpbuilder.cadet( id, first_name, last_name, rank, cdt_fc_matrix_id, syllabus_id, detachment_id, contact_information_id ) VALUES ( 6, 'Test', 'Name', 'Test Rank', null, 2, 4, null ); 

INSERT INTO acf_tpbuilder.detachment( id, name, affiliation, contact_information_id, detachment_commander_id, company_id, second_in_command_id ) VALUES ( 4, '22 Troop', 'Royal Signals', 3, 3, 3, 1 ); 

INSERT INTO acf_tpbuilder.instructor( id, first_name, last_name, rank, instructor_qualifications_id, detachment_id, number, contact_infomration_id ) VALUES ( 1, 'Timothy', 'Hasler', '2nd Lieutenant', null, 4, 30117310, null ); 
INSERT INTO acf_tpbuilder.instructor( id, first_name, last_name, rank, instructor_qualifications_id, detachment_id, number, contact_infomration_id ) VALUES ( 3, 'Jennifer', 'Bush', 'Staff Sargent Instructor', null, 4, 30161882, null ); 

INSERT INTO acf_tpbuilder.`user`( id, user_name, password, instructor_id, det_commander, det_2ic ) VALUES ( 2, 'timmy_hasler@hotmail.com', '$2y$10$DbZT7/5Pts3rzjZIN1vIceZsnCWNIWLcO/67E27EPAAN5std3gJW6', 1, null, 1 ); 
INSERT INTO acf_tpbuilder.`user`( id, user_name, password, instructor_id, det_commander, det_2ic ) VALUES ( 3, '22troop', '$2y$10$FMhZNqdiruEHXKEd7CxP0.r1Bq.9lg.W63JQdFNDPMNNQoaMKtnu.', 3, 1, null ); 

