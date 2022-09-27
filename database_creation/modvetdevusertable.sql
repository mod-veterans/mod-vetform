-- -------------------------------------------------------------
-- TablePlus 4.8.0(432)
--
-- https://tableplus.com/
--
-- Database: defaultdb
-- Generation Time: 2022-08-30 14:27:26.7330
-- -------------------------------------------------------------


DROP TABLE IF EXISTS "public"."modvetdevusertable";
-- This script only contains the table creation statements and does not fully represent the table in the database. It's still missing: indices, triggers. Do not use it as a backup.

-- Sequence and defined type
CREATE SEQUENCE IF NOT EXISTS modvetdevusertable_id_seq;

-- Table Definition
CREATE TABLE "public"."modvetdevusertable" (
    "id" int4 NOT NULL DEFAULT nextval('modvetdevusertable_id_seq'::regclass),
    "datetimeadded" timestamp,
    "datelastaccessed" timestamp DEFAULT now(),
    "data" varchar,
    "surnamehash" text,
    "emailhash" text,
    "nihash" text,
    "userid" varchar,
    "userref" text,
    "accesscode" text,
    "accessuseby" timestamp,
    PRIMARY KEY ("id")
);

