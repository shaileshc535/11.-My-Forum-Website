ALTER TABLE threads ADD FULLTEXT (`thread_title`,`thread_desc`);

SELECT * FROM threads WHERE MATCH (thread_title, thread_desc) against ('not able');