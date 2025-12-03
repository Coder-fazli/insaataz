-- Add "Fırat" keyword to Dubleks PVC products in category 121 for search
-- This will make these products appear when searching for "firat" or "fırat"

UPDATE products
SET `desc` = JSON_SET(
    COALESCE(`desc`, '{}'),
    '$.az',
    CONCAT(
        COALESCE(JSON_UNQUOTE(JSON_EXTRACT(`desc`, '$.az')), ''),
        ' Fırat'
    )
)
WHERE category_id = 121
AND status = 1
AND (
    JSON_EXTRACT(`desc`, '$.az') NOT LIKE '%Fırat%'
    OR `desc` IS NULL
);

UPDATE products
SET `desc` = JSON_SET(
    COALESCE(`desc`, '{}'),
    '$.en',
    CONCAT(
        COALESCE(JSON_UNQUOTE(JSON_EXTRACT(`desc`, '$.en')), ''),
        ' Firat'
    )
)
WHERE category_id = 121
AND status = 1
AND (
    JSON_EXTRACT(`desc`, '$.en') NOT LIKE '%Firat%'
    OR `desc` IS NULL
);

UPDATE products
SET `desc` = JSON_SET(
    COALESCE(`desc`, '{}'),
    '$.ru',
    CONCAT(
        COALESCE(JSON_UNQUOTE(JSON_EXTRACT(`desc`, '$.ru')), ''),
        ' Фират'
    )
)
WHERE category_id = 121
AND status = 1
AND (
    JSON_EXTRACT(`desc`, '$.ru') NOT LIKE '%Фират%'
    OR `desc` IS NULL
);
