use ucode_web;

SELECT summa as power, name
FROM
    (
    SELECT heroes.name as name, sum(powers.points) AS summa
    FROM heroes
    JOIN powers ON powers.hero_id = heroes.id
    GROUP by heroes.id
    )
ORDER BY summa DESC limit 1;

SELECT summa as power, name
FROM
(
    SELECT heroes.name as name, sum(table1.points) AS summa
    FROM heroes
    JOIN (
        SELECT hero_id, points
        FROM powers
        where type = 'defense'
    ) table1 ON table1.hero_id = heroes.id
    GROUP by heroes.id
)
ORDER BY power ASC limit 1;

SELECT summa as power, name
FROM
    (
        SELECT heroes.name as name, sum(powers.points) AS summa
        FROM heroes
        JOIN
        (
            SELECT hero_id
            FROM teams
            where name = 'Avengers'
        ) table1 ON table1.hero_id = heroes.id
        JOIN powers ON powers.hero_id = heroes.id
        GROUP by heroes.id
    )
ORDER BY power DESC;

SELECT summa as power, name
FROM
    (
        SELECT teams.name as name, sum(powers.points) AS summa
        FROM teams
        JOIN powers ON powers.hero_id = teams.hero_id
        GROUP by name
    )
ORDER BY power ASC;