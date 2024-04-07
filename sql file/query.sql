SELECT d.dishID, d.dishName, d.summary, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
FROM `dishs` d 
JOIN `dishingredients` di ON d.dishID = di.dishID
JOIN `ingredients` i ON di.ingredientID = i.ingredientID
JOIN `dishtypes` dt ON d.dishID = dt.dishID
JOIN `typedishs` t ON dt.typeID = t.typeID
GROUP BY d.dishID
HAVING d.dishName LIKE "%sườn%" 
and d.dishID IN 
(SELECT dishID FROM `dishingredients` WHERE ingredientID IN (14,63) GROUP BY dishID HAVING COUNT(DISTINCT ingredientID) = 2)
and EXISTS (SELECT 1 FROM `dishtypes` WHERE dishID = d.dishID AND typeID IN (1,2))
-- and d.dishID IN
-- (SELECT dishID FROM `dishtypes` WHERE typeID IN (1,2))


SELECT d.dishID, d.dishName, d.summary, GROUP_CONCAT(DISTINCT i.ingredientName) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types
FROM `dishs` d 
JOIN `dishingredients` di ON d.dishID = di.dishID
JOIN `ingredients` i ON di.ingredientID = i.ingredientID
JOIN `dishtypes` dt ON d.dishID = dt.dishID
JOIN `typedishs` t ON dt.typeID = t.typeID
GROUP BY d.dishID
HAVING d.dishName LIKE "%bún%" 
and d.dishID IN 
(SELECT dishID FROM `dishingredients` WHERE ingredientID IN (14,53) GROUP BY dishID HAVING COUNT(DISTINCT ingredientID) = 2)
and EXISTS (SELECT 1 FROM `dishtypes` WHERE dishID = d.dishID AND typeID IN (21,2))



SELECT d.dishID, d.dishName, d.summary, GROUP_CONCAT(DISTINCT i.ingredientName ,'@', di.amount,'@', di.unit) as ingredients, GROUP_CONCAT(DISTINCT t.typeName) as types, r.content
FROM `dishs` d 
JOIN `dishingredients` di ON d.dishID = di.dishID
JOIN `ingredients` i ON di.ingredientID = i.ingredientID
JOIN `dishtypes` dt ON d.dishID = dt.dishID
JOIN `typedishs` t ON dt.typeID = t.typeID
JOIN `recipes` r ON d.dishID = r.dishID
GROUP BY d.dishID
HAVING d.dishID = "Test01" 

-- cách 1
SELECT      u.email, d.dishName, r.rating
FROM        users u
CROSS JOIN  dishs d
LEFT JOIN ratings r ON r.userID = u.userID AND r.dishID = d.dishID

SELECT dishID, AVG(rating) as avgRating FROM ratings GROUP BY dishID

-- cách 2
SELECT      
    u.email, 
    d.dishName, 
    COALESCE(r.rating, (SELECT AVG(rating) FROM ratings r2 WHERE d.dishID = r2.dishID)) AS avgRating
FROM        
    users u
CROSS JOIN  
    dishs d
LEFT JOIN 
    ratings r ON r.userID = u.userID AND r.dishID = d.dishID;

-- cách 3
UPDATE dishs d
LEFT JOIN (
    SELECT dishID, AVG(rating) AS avgRating
    FROM ratings
    GROUP BY dishID
) AS avg_ratings ON d.dishID = avg_ratings.dishID
SET d.avgRating = avg_ratings.avgRating, d.updated_at = NOW();

SELECT u.userID, d.dishID, COALESCE(r.rating, d.avgRating) AS avgRating
FROM users u
CROSS JOIN dishs d
LEFT JOIN ratings r ON r.userID = u.userID AND r.dishID = d.dishID
ORDER BY d.dishID, u.userID