DROP TABLE IF EXISTS guests CASCADE;

CREATE TABLE guests (
  guestId         SERIAL       NOT NULL,
  guestUsername   VARCHAR(20)  NOT NULL,
  guestPassword   VARCHAR(255) NOT NULL,
  CONSTRAINT      pk_guest_id  PRIMARY KEY (guestId)
);
