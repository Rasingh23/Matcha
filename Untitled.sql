DROP TABLE IF EXISTS test;
CREATE TABLE test
SELECT users.*,
    GROUP_CONCAT(gallery.img_name) AS 'images',
    CAST(JSON_EXTRACT(`profile`, '$.age') AS int) AS 'age',
    CAST(JSON_EXTRACT(`profile`, '$.fame') AS int) AS 'fame', CAST('0' AS int) AS 'interestCount',
    CAST('0' AS int) AS 'distance'
FROM `users
` JOIN gallery ON gallery.user_id = users.user_id  
WHERE `users`.`user_id` != 10
AND
(SELECT JSON_SEARCH(`blocked
`, 'all', 'Black_Cupid')) IS NULL
AND JSON_EXTRACT
(`profile`, '$.location') = "Johannesburg"
AND JSON_EXTRACT
(`profile`, '$.gender') = 'Male' AND
(JSON_EXTRACT
(`profile`, '$.preference') = 'Male' OR
JSON_EXTRACT
(`profile`, '$.preference') = 'BI-SEXUAL')
AND CAST
(JSON_EXTRACT
(`profile`, '$.age') AS int) BETWEEN 18 AND 100
GROUP BY users.user_id