DROP TABLE IF EXISTS scriptures CASCADE;

-- Core Requirement 1: Create the Scriptures Table

CREATE TABLE scriptures (
  scripture_id  SERIAL        NOT NULL, -- SERIAL or AUTO_INCREMENT?
  book          VARCHAR(30)   NOT NULL,
  chapter       INT           NOT NULL,
  verse         INT           NOT NULL,
  content       VARCHAR(1000) NOT NULL, -- https://100hourboard.org/questions/37087/  - POGP (JS-H 1:28), with 931 characters
  CONSTRAINT pk_scripture_id PRIMARY KEY (scripture_id)
);
