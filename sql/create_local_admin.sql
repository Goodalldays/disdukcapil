-- SQL script to create or update a local admin user
-- Run this on your local database (phpMyAdmin or mysql CLI)

-- Replace the password hash below if you want a different password
-- Generated bcrypt hash for password123:
-- $2y$10$Kxp9Hx.J9ZnrnqZN.TjsGOWWBY1DQg.HI7T7pEhsh3Xk4uzfChaGC

START TRANSACTION;

-- Update existing admin password if user exists
UPDATE `users`
SET `password` = '$2y$10$Kxp9Hx.J9ZnrnqZN.TjsGOWWBY1DQg.HI7T7pEhsh3Xk4uzfChaGC',
    `nama_lengkap` = 'administrator',
    `email` = 'admin@local',
    `no_telp` = '08123456789',
    `foto` = 'undraw_profile.svg',
    `level` = 'admin',
    `blokir` = 'N',
    `id_session` = 'dev'
WHERE `username` = 'admin';

-- If the admin user does not exist, insert it
INSERT INTO `users` (`username`,`password`,`nama_lengkap`,`email`,`no_telp`,`foto`,`level`,`blokir`,`id_session`,`alamat`)
SELECT 'admin', '$2y$10$Kxp9Hx.J9ZnrnqZN.TjsGOWWBY1DQg.HI7T7pEhsh3Xk4uzfChaGC', 'administrator', 'admin@local', '08123456789', 'undraw_profile.svg', 'admin', 'N', 'dev', 'Local admin'
FROM DUAL
WHERE NOT EXISTS (SELECT 1 FROM `users` WHERE `username` = 'admin');

COMMIT;

-- After running this, you should be able to login on localhost with:
-- username: admin
-- password: password123
