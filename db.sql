truncate quizz.questions_lv1;
truncate quizz.questions_lv2;
truncate quizz.questions_lv3;
truncate quizz.answers_lv1;
truncate quizz.answers_lv2;
truncate quizz.answers_lv3;

insert into quizz.questions_lv1 (Q) values ("Dans quel pays peut-on trouver la Catalogne, l’Andalousie et la Castille ?");
insert into quizz.answers_lv1 (R, result, idquestions_lv1) values("Italie", "Désolé, mauvaise réponse", 1);
insert into quizz.answers_lv1 (R, result, idquestions_lv1) values("Espagne", "Bravo ! Bonne réponse", 1);
insert into quizz.answers_lv1 (R, result, idquestions_lv1) values("France", "Désolé, mauvaise réponse", 1);
insert into quizz.answers_lv1 (R, result, idquestions_lv1) values("Portugal", "Désolé, mauvaise réponse", 1);

SELECT * FROM quizz.questions_lv1;