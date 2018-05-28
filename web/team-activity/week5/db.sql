DROP TABLE IF EXISTS scriptures CASCADE;
DROP TABLE IF EXISTS topics CASCADE;
DROP TABLE IF EXISTS scriptures_topics CASCADE;

CREATE TABLE scriptures (
  scripture_id  SERIAL        NOT NULL,
  book          VARCHAR(30)   NOT NULL,
  chapter       INT           NOT NULL,
  verse         INT           NOT NULL,
  content       VARCHAR(1000) NOT NULL,
  CONSTRAINT pk_scripture_id PRIMARY KEY (scripture_id)
);

CREATE TABLE topics (
  topic_id      SERIAL        NOT NULL,
  topic_name    VARCHAR(50)   NOT NULL,
  CONSTRAINT pk_topic_id PRIMARY KEY (topic_id)
);

CREATE TABLE scriptures_topics (
  scripture_id  INT           NOT NULL,
  topic_id      INT           NOT NULL,
  CONSTRAINT fk_scriptures_topics_scripture_id FOREIGN KEY (scripture_id) REFERENCES scriptures(scripture_id),
  CONSTRAINT fk_scriptures_topics_topic_id FOREIGN KEY (topic_id) REFERENCES topics(topic_id)
);

INSERT INTO scriptures (book, chapter, verse, content) VALUES ('John', '1', '5', 'And the light shineth in darkness; and the darkness comprehended it not.');

INSERT INTO scriptures (book, chapter, verse, content) VALUES ('Doctrine and Covenants', '88', '49', 'The light shineth in darkness, and the darkness comprehendeth it not; nevertheless, the day shall come when you shall comprehend even God, being quickened in him and by him.');

INSERT INTO scriptures (book, chapter, verse, content) VALUES ('Doctrine and Covenants', '93', '28', 'He that keepeth his commandments receiveth truth and light, until he is glorified in truth and knoweth all things.');

INSERT INTO scriptures (book, chapter, verse, content) VALUES ('Mosiah', '16', '9', 'He is the light and the life of the world; yea, a light that is endless, that can never be darkened; yea, and also a life which is endless, that there can be no more death.');

INSERT INTO topics (topic_name) VALUES ('Faith');
INSERT INTO topics (topic_name) VALUES ('Sacrifice');
INSERT INTO topics (topic_name) VALUES ('Charity');
