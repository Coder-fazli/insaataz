-- Add 5 new partner logos to the database
-- Run this in phpMyAdmin or import via command line

-- Insert new partners (with links)
INSERT INTO `partners` (`title`, `image`, `slug`, `link`, `created_at`, `updated_at`) VALUES
('Apamet Boyler', 'partners/apamet-logo.webp', 'apamet-boyler', 'https://www.apamet.com.tr/', NOW(), NOW()),
('Giacomini', 'partners/giacomini-logo.png', 'giacomini', 'https://www.giacomini.com/', NOW(), NOW()),
('SIRA Industrie', 'partners/sira-industrie-logo.png', 'sira-industrie', 'https://www.siraindustrie.com/en-gb/', NOW(), NOW()),
('General Fittings', 'partners/general-fittings-logo.jpg', 'general-fittings', 'https://www.generalfittings.it/en', NOW(), NOW()),
('ETS VANA', 'partners/ets-vana-logo.jpg', 'ets-vana', 'https://www.etsvana.com.tr/', NOW(), NOW());

-- Show all partners after insert
SELECT * FROM `partners` ORDER BY `id` DESC LIMIT 10;
