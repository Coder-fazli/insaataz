-- First, add the link column if it doesn't exist (run migration first, or use this ALTER)
-- ALTER TABLE `partners` ADD COLUMN `link` VARCHAR(500) NULL AFTER `slug`;

-- Update partner links
UPDATE `partners` SET `link` = 'https://www.apamet.com.tr/' WHERE `title` = 'Apamet Boyler' OR `slug` = 'apamet-boyler';
UPDATE `partners` SET `link` = 'https://www.giacomini.com/' WHERE `title` = 'Giacomini' OR `slug` = 'giacomini';
UPDATE `partners` SET `link` = 'https://www.siraindustrie.com/en-gb/' WHERE `title` = 'SIRA Industrie' OR `slug` = 'sira-industrie';
UPDATE `partners` SET `link` = 'https://www.generalfittings.it/en' WHERE `title` = 'General Fittings' OR `slug` = 'general-fittings';
UPDATE `partners` SET `link` = 'https://www.etsvana.com.tr/' WHERE `title` = 'ETS VANA' OR `slug` = 'ets-vana';

-- Verify updates
SELECT id, title, slug, link FROM `partners` WHERE `link` IS NOT NULL;
