-- ============================================
-- VEHICLE MAINTENANCE SYSTEM DATABASE
-- Complete MySQL Schema with 100+ Sample Data
-- ============================================

-- Drop existing database if exists
DROP DATABASE IF EXISTS vehicle_maintenance_db;
CREATE DATABASE vehicle_maintenance_db;
USE vehicle_maintenance_db;


-- INSERT SAMPLE DATA

-- ADMIN USERS (3 admins)
-- ============================================
INSERT INTO users (name, email, password, phone, role, status, last_login) VALUES
('Admin User', 'admin@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 100-0001', 'admin', 'active', '2026-04-07 08:30:00'),
('Sarah Anderson', 'sarah.admin@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 100-0002', 'admin', 'active', '2026-04-06 14:20:00'),
('Michael Torres', 'michael.admin@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 100-0003', 'admin', 'active', '2026-04-05 09:15:00');
-- ============================================

-- MECHANIC USERS (10 mechanics)
-- ============================================
INSERT INTO users (name, email, password, phone, role, status, last_login) VALUES
('Mike Johnson', 'mike.mechanic@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0001', 'mechanic', 'active', '2026-04-07 07:00:00'),
('David Martinez', 'david.mechanic@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0002', 'senior_mechanic', 'active', '2026-04-07 06:45:00'),
('Robert Garcia', 'robert.mechanic@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0003', 'mechanic', 'active', '2026-04-06 16:30:00'),
('James Wilson', 'james.mechanic@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0004', 'mechanic', 'active', '2026-04-07 07:15:00'),
('Thomas Brown', 'thomas.mechanic@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0005', 'mechanic', 'active', '2026-04-07 06:50:00'),
('Christopher Lee', 'chris.mechanic@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0006', 'mechanic', 'active', '2026-04-06 15:00:00'),
('Daniel Rodriguez', 'daniel.mechanic@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0007', 'mechanic', 'active', '2026-04-07 07:30:00'),
('Matthew Harris', 'matthew.mechanic@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0008', 'mechanic', 'active', '2026-04-06 14:45:00'),
('Anthony Clark', 'anthony.mechanic@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0009', 'mechanic', 'active', '2026-04-07 06:55:00'),
('Joshua Lewis', 'joshua.mechanic@vehiclecare.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 200-0010', 'mechanic', 'active', '2026-04-05 17:00:00');
-- ============================================


-- CUSTOMER USERS (100 customers)
-- ============================================
INSERT INTO users (name, email, password, phone, role, status, last_login) VALUES
('John Smith', 'john.smith@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1001', 'customer', 'active', '2026-04-06 10:30:00'),
('Emma Johnson', 'emma.johnson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1002', 'customer', 'active', '2026-04-05 14:20:00'),
('Michael Williams', 'michael.williams@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1003', 'customer', 'active', '2026-04-07 09:15:00'),
('Olivia Brown', 'olivia.brown@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1004', 'customer', 'active', '2026-04-06 16:45:00'),
('James Davis', 'james.davis@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1005', 'customer', 'active', '2026-04-04 11:30:00'),
('Sophia Miller', 'sophia.miller@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1006', 'customer', 'active', '2026-04-06 13:00:00'),
('William Wilson', 'william.wilson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1007', 'customer', 'active', '2026-04-07 08:20:00'),
('Ava Moore', 'ava.moore@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1008', 'customer', 'active', '2026-04-05 15:40:00'),
('Benjamin Taylor', 'benjamin.taylor@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1009', 'customer', 'active', '2026-04-06 12:10:00'),
('Isabella Anderson', 'isabella.anderson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1010', 'customer', 'active', '2026-04-07 10:50:00'),
('Lucas Thomas', 'lucas.thomas@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1011', 'customer', 'active', '2026-04-03 09:30:00'),
('Mia Jackson', 'mia.jackson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1012', 'customer', 'active', '2026-04-06 14:25:00'),
('Henry White', 'henry.white@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1013', 'customer', 'active', '2026-04-07 11:15:00'),
('Charlotte Harris', 'charlotte.harris@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1014', 'customer', 'active', '2026-04-05 16:30:00'),
('Alexander Martin', 'alexander.martin@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1015', 'customer', 'active', '2026-04-06 10:00:00'),
('Amelia Thompson', 'amelia.thompson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1016', 'customer', 'active', '2026-04-07 13:45:00'),
('Sebastian Garcia', 'sebastian.garcia@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1017', 'customer', 'active', '2026-04-04 12:20:00'),
('Evelyn Martinez', 'evelyn.martinez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1018', 'customer', 'active', '2026-04-06 15:10:00'),
('Jack Robinson', 'jack.robinson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1019', 'customer', 'active', '2026-04-07 09:50:00'),
('Harper Clark', 'harper.clark@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1020', 'customer', 'active', '2026-04-05 11:40:00'),
('Daniel Rodriguez', 'daniel.rodriguez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1021', 'customer', 'active', '2026-04-06 13:20:00'),
('Ella Lewis', 'ella.lewis@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1022', 'customer', 'active', '2026-04-07 14:00:00'),
('Matthew Lee', 'matthew.lee@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1023', 'customer', 'active', '2026-04-03 10:15:00'),
('Avery Walker', 'avery.walker@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1024', 'customer', 'active', '2026-04-06 11:50:00'),
('Jackson Hall', 'jackson.hall@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1025', 'customer', 'active', '2026-04-07 12:30:00'),
('Scarlett Allen', 'scarlett.allen@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1026', 'customer', 'active', '2026-04-05 13:15:00'),
('David Young', 'david.young@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1027', 'customer', 'active', '2026-04-06 14:40:00'),
('Sofia Hernandez', 'sofia.hernandez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1028', 'customer', 'active', '2026-04-07 15:20:00'),
('Joseph King', 'joseph.king@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1029', 'customer', 'active', '2026-04-04 11:00:00'),
('Grace Wright', 'grace.wright@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1030', 'customer', 'active', '2026-04-06 16:10:00'),
('Samuel Lopez', 'samuel.lopez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1031', 'customer', 'active', '2026-04-07 10:20:00'),
('Chloe Hill', 'chloe.hill@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1032', 'customer', 'active', '2026-04-05 12:45:00'),
('Carter Scott', 'carter.scott@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1033', 'customer', 'active', '2026-04-06 09:30:00'),
('Lily Green', 'lily.green@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1034', 'customer', 'active', '2026-04-07 11:00:00'),
('Wyatt Adams', 'wyatt.adams@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1035', 'customer', 'active', '2026-04-03 15:20:00'),
('Victoria Baker', 'victoria.baker@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1036', 'customer', 'active', '2026-04-06 13:50:00'),
('Luke Gonzalez', 'luke.gonzalez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1037', 'customer', 'active', '2026-04-07 14:30:00'),
('Zoe Nelson', 'zoe.nelson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1038', 'customer', 'active', '2026-04-05 10:40:00'),
('Owen Carter', 'owen.carter@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1039', 'customer', 'active', '2026-04-06 12:00:00'),
('Penelope Mitchell', 'penelope.mitchell@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1040', 'customer', 'active', '2026-04-07 13:10:00'),
('Gabriel Perez', 'gabriel.perez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1041', 'customer', 'active', '2026-04-04 09:50:00'),
('Layla Roberts', 'layla.roberts@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1042', 'customer', 'active', '2026-04-06 15:30:00'),
('Nathan Turner', 'nathan.turner@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1043', 'customer', 'active', '2026-04-07 16:00:00'),
('Aria Phillips', 'aria.phillips@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1044', 'customer', 'active', '2026-04-05 11:20:00'),
('Isaac Campbell', 'isaac.campbell@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1045', 'customer', 'active', '2026-04-06 10:40:00'),
('Ellie Parker', 'ellie.parker@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1046', 'customer', 'active', '2026-04-07 12:50:00'),
('Julian Evans', 'julian.evans@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1047', 'customer', 'active', '2026-04-03 14:10:00'),
('Nora Edwards', 'nora.edwards@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1048', 'customer', 'active', '2026-04-06 11:30:00'),
('Levi Collins', 'levi.collins@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1049', 'customer', 'active', '2026-04-07 09:00:00'),
('Riley Stewart', 'riley.stewart@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1050', 'customer', 'active', '2026-04-05 13:40:00'),
('Aaron Sanchez', 'aaron.sanchez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1051', 'customer', 'active', '2026-04-06 14:15:00'),
('Hazel Morris', 'hazel.morris@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1052', 'customer', 'active', '2026-04-07 15:45:00'),
('Lincoln Rogers', 'lincoln.rogers@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1053', 'customer', 'active', '2026-04-04 10:30:00'),
('Eleanor Reed', 'eleanor.reed@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1054', 'customer', 'active', '2026-04-06 16:20:00'),
('Hudson Cook', 'hudson.cook@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1055', 'customer', 'active', '2026-04-07 10:10:00'),
('Hannah Morgan', 'hannah.morgan@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1056', 'customer', 'active', '2026-04-05 12:00:00'),
('Leo Bell', 'leo.bell@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1057', 'customer', 'active', '2026-04-06 09:45:00'),
('Addison Murphy', 'addison.murphy@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1058', 'customer', 'active', '2026-04-07 11:25:00'),
('Jaxon Bailey', 'jaxon.bailey@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1059', 'customer', 'active', '2026-04-03 16:00:00'),
('Aubrey Rivera', 'aubrey.rivera@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1060', 'customer', 'active', '2026-04-06 13:35:00'),
('Mason Cooper', 'mason.cooper@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1061', 'customer', 'active', '2026-04-07 14:50:00'),
('Stella Richardson', 'stella.richardson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1062', 'customer', 'active', '2026-04-05 10:25:00'),
('Ethan Cox', 'ethan.cox@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1063', 'customer', 'active', '2026-04-06 12:15:00'),
('Lucy Howard', 'lucy.howard@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1064', 'customer', 'active', '2026-04-07 13:00:00'),
('Logan Ward', 'logan.ward@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1065', 'customer', 'active', '2026-04-04 11:45:00'),
('Violet Torres', 'violet.torres@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1066', 'customer', 'active', '2026-04-06 15:50:00'),
('Grayson Peterson', 'grayson.peterson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1067', 'customer', 'active', '2026-04-07 16:30:00'),
('Aurora Gray', 'aurora.gray@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1068', 'customer', 'active', '2026-04-05 11:10:00'),
('Maverick Ramirez', 'maverick.ramirez@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1069', 'customer', 'active', '2026-04-06 10:55:00'),
('Savannah James', 'savannah.james@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1070', 'customer', 'active', '2026-04-07 12:40:00'),
('Elijah Watson', 'elijah.watson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1071', 'customer', 'active', '2026-04-03 13:55:00'),
('Brooklyn Brooks', 'brooklyn.brooks@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1072', 'customer', 'active', '2026-04-06 11:40:00'),
('Noah Kelly', 'noah.kelly@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1073', 'customer', 'active', '2026-04-07 09:20:00'),
('Leah Sanders', 'leah.sanders@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1074', 'customer', 'active', '2026-04-05 14:05:00'),
('Aiden Price', 'aiden.price@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1075', 'customer', 'active', '2026-04-06 14:30:00'),
('Anna Bennett', 'anna.bennett@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1076', 'customer', 'active', '2026-04-07 15:55:00'),
('Xavier Wood', 'xavier.wood@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1077', 'customer', 'active', '2026-04-04 10:20:00'),
('Paisley Barnes', 'paisley.barnes@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1078', 'customer', 'active', '2026-04-06 16:40:00'),
('Colton Ross', 'colton.ross@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1079', 'customer', 'active', '2026-04-07 10:35:00'),
('Bella Henderson', 'bella.henderson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1080', 'customer', 'active', '2026-04-05 12:20:00'),
('Ezra Coleman', 'ezra.coleman@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1081', 'customer', 'active', '2026-04-06 09:10:00'),
('Skylar Jenkins', 'skylar.jenkins@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1082', 'customer', 'active', '2026-04-07 11:50:00'),
('Axel Perry', 'axel.perry@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1083', 'customer', 'active', '2026-04-03 15:35:00'),
('Claire Powell', 'claire.powell@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1084', 'customer', 'active', '2026-04-06 13:45:00'),
('Cooper Long', 'cooper.long@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1085', 'customer', 'active', '2026-04-07 14:25:00'),
('Natalie Patterson', 'natalie.patterson@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1086', 'customer', 'active', '2026-04-05 10:50:00'),
('Easton Hughes', 'easton.hughes@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1087', 'customer', 'active', '2026-04-06 12:30:00'),
('Caroline Flores', 'caroline.flores@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1088', 'customer', 'active', '2026-04-07 13:15:00'),
('Adrian Washington', 'adrian.washington@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1089', 'customer', 'active', '2026-04-04 11:25:00'),
('Kinsley Butler', 'kinsley.butler@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1090', 'customer', 'active', '2026-04-06 15:00:00'),
('Kai Simmons', 'kai.simmons@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1091', 'customer', 'active', '2026-04-07 16:15:00'),
('Naomi Foster', 'naomi.foster@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1092', 'customer', 'active', '2026-04-05 11:35:00'),
('Brayden Gonzales', 'brayden.gonzales@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1093', 'customer', 'active', '2026-04-06 10:15:00'),
('Allison Bryant', 'allison.bryant@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1094', 'customer', 'active', '2026-04-07 12:05:00'),
('Greyson Alexander', 'greyson.alexander@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1095', 'customer', 'active', '2026-04-03 14:40:00'),
('Samantha Russell', 'samantha.russell@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1096', 'customer', 'active', '2026-04-06 11:05:00'),
('Jameson Griffin', 'jameson.griffin@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1097', 'customer', 'active', '2026-04-07 09:40:00'),
('Kennedy Diaz', 'kennedy.diaz@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1098', 'customer', 'active', '2026-04-05 13:25:00'),
('Bryson Hayes', 'bryson.hayes@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1099', 'customer', 'active', '2026-04-06 14:50:00'),
('Madelyn Myers', 'madelyn.myers@email.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '(555) 301-1100', 'customer', 'active', '2026-04-07 15:10:00');
-- ============================================


-- ADD VALID ID COLUMN TO USERS TABLE
-- ============================================
ALTER TABLE users ADD COLUMN valid_id VARCHAR(100) NULL AFTER phone;

-- UPDATE VALID ID FOR ALL CUSTOMERS
-- (IDs assigned in the same order customers were inserted, starting from user id 14)
UPDATE users SET valid_id = 'Passport - P1234567A'       WHERE email = 'john.smith@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-00112233' WHERE email = 'emma.johnson@email.com';
UPDATE users SET valid_id = 'National ID - NID-44556677'  WHERE email = 'michael.williams@email.com';
UPDATE users SET valid_id = 'Passport - P2345678B'        WHERE email = 'olivia.brown@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-00223344' WHERE email = 'james.davis@email.com';
UPDATE users SET valid_id = 'Postal ID - POST-11223344'   WHERE email = 'sophia.miller@email.com';
UPDATE users SET valid_id = 'Passport - P3456789C'        WHERE email = 'william.wilson@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-00334455' WHERE email = 'ava.moore@email.com';
UPDATE users SET valid_id = 'National ID - NID-55667788'  WHERE email = 'benjamin.taylor@email.com';
UPDATE users SET valid_id = 'Passport - P4567890D'        WHERE email = 'isabella.anderson@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-00445566' WHERE email = 'lucas.thomas@email.com';
UPDATE users SET valid_id = 'SSS ID - SSS-11223344'       WHERE email = 'mia.jackson@email.com';
UPDATE users SET valid_id = 'Passport - P5678901E'        WHERE email = 'henry.white@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-00556677' WHERE email = 'charlotte.harris@email.com';
UPDATE users SET valid_id = 'National ID - NID-66778899'  WHERE email = 'alexander.martin@email.com';
UPDATE users SET valid_id = 'Passport - P6789012F'        WHERE email = 'amelia.thompson@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-00667788' WHERE email = 'sebastian.garcia@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-12345678'   WHERE email = 'evelyn.martinez@email.com';
UPDATE users SET valid_id = 'Passport - P7890123G'        WHERE email = 'jack.robinson@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-00778899' WHERE email = 'harper.clark@email.com';
UPDATE users SET valid_id = 'National ID - NID-77889900'  WHERE email = 'daniel.rodriguez@email.com';
UPDATE users SET valid_id = 'Passport - P8901234H'        WHERE email = 'ella.lewis@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-00889900' WHERE email = 'matthew.lee@email.com';
UPDATE users SET valid_id = 'SSS ID - SSS-22334455'       WHERE email = 'avery.walker@email.com';
UPDATE users SET valid_id = 'Passport - P9012345I'        WHERE email = 'jackson.hall@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-00990011' WHERE email = 'scarlett.allen@email.com';
UPDATE users SET valid_id = 'National ID - NID-88990011'  WHERE email = 'david.young@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-23456789'   WHERE email = 'sofia.hernandez@email.com';
UPDATE users SET valid_id = 'Passport - P0123456J'        WHERE email = 'joseph.king@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-01001122' WHERE email = 'grace.wright@email.com';
UPDATE users SET valid_id = 'Postal ID - POST-22334455'   WHERE email = 'samuel.lopez@email.com';
UPDATE users SET valid_id = 'Passport - P1234567K'        WHERE email = 'chloe.hill@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-01112233' WHERE email = 'carter.scott@email.com';
UPDATE users SET valid_id = 'National ID - NID-99001122'  WHERE email = 'lily.green@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-34567890'   WHERE email = 'wyatt.adams@email.com';
UPDATE users SET valid_id = 'Passport - P2345678L'        WHERE email = 'victoria.baker@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-01223344' WHERE email = 'luke.gonzalez@email.com';
UPDATE users SET valid_id = 'SSS ID - SSS-33445566'       WHERE email = 'zoe.nelson@email.com';
UPDATE users SET valid_id = 'Passport - P3456789M'        WHERE email = 'owen.carter@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-01334455' WHERE email = 'penelope.mitchell@email.com';
UPDATE users SET valid_id = 'National ID - NID-00112233'  WHERE email = 'gabriel.perez@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-45678901'   WHERE email = 'layla.roberts@email.com';
UPDATE users SET valid_id = 'Passport - P4567890N'        WHERE email = 'nathan.turner@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-01445566' WHERE email = 'aria.phillips@email.com';
UPDATE users SET valid_id = 'Postal ID - POST-33445566'   WHERE email = 'isaac.campbell@email.com';
UPDATE users SET valid_id = 'Passport - P5678901O'        WHERE email = 'ellie.parker@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-01556677' WHERE email = 'julian.evans@email.com';
UPDATE users SET valid_id = 'SSS ID - SSS-44556677'       WHERE email = 'nora.edwards@email.com';
UPDATE users SET valid_id = 'National ID - NID-11223344'  WHERE email = 'levi.collins@email.com';
UPDATE users SET valid_id = 'Passport - P6789012P'        WHERE email = 'riley.stewart@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-01667788' WHERE email = 'aaron.sanchez@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-56789012'   WHERE email = 'hazel.morris@email.com';
UPDATE users SET valid_id = 'Passport - P7890123Q'        WHERE email = 'lincoln.rogers@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-01778899' WHERE email = 'eleanor.reed@email.com';
UPDATE users SET valid_id = 'National ID - NID-22334455'  WHERE email = 'hudson.cook@email.com';
UPDATE users SET valid_id = 'Postal ID - POST-44556677'   WHERE email = 'hannah.morgan@email.com';
UPDATE users SET valid_id = 'Passport - P8901234R'        WHERE email = 'leo.bell@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-01889900' WHERE email = 'addison.murphy@email.com';
UPDATE users SET valid_id = 'SSS ID - SSS-55667788'       WHERE email = 'jaxon.bailey@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-67890123'   WHERE email = 'aubrey.rivera@email.com';
UPDATE users SET valid_id = 'Passport - P9012345S'        WHERE email = 'mason.cooper@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-01990011' WHERE email = 'stella.richardson@email.com';
UPDATE users SET valid_id = 'National ID - NID-33445566'  WHERE email = 'ethan.cox@email.com';
UPDATE users SET valid_id = 'Passport - P0123456T'        WHERE email = 'lucy.howard@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-02001122' WHERE email = 'logan.ward@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-78901234'   WHERE email = 'violet.torres@email.com';
UPDATE users SET valid_id = 'SSS ID - SSS-66778899'       WHERE email = 'grayson.peterson@email.com';
UPDATE users SET valid_id = 'Passport - P1234567U'        WHERE email = 'aurora.gray@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-02112233' WHERE email = 'maverick.ramirez@email.com';
UPDATE users SET valid_id = 'National ID - NID-44556677'  WHERE email = 'savannah.james@email.com';
UPDATE users SET valid_id = 'Passport - P2345678V'        WHERE email = 'elijah.watson@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-89012345'   WHERE email = 'brooklyn.brooks@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-02223344' WHERE email = 'noah.kelly@email.com';
UPDATE users SET valid_id = 'Postal ID - POST-55667788'   WHERE email = 'leah.sanders@email.com';
UPDATE users SET valid_id = 'Passport - P3456789W'        WHERE email = 'aiden.price@email.com';
UPDATE users SET valid_id = 'SSS ID - SSS-77889900'       WHERE email = 'anna.bennett@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-02334455' WHERE email = 'xavier.wood@email.com';
UPDATE users SET valid_id = 'National ID - NID-55667788'  WHERE email = 'paisley.barnes@email.com';
UPDATE users SET valid_id = 'Passport - P4567890X'        WHERE email = 'colton.ross@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-90123456'   WHERE email = 'bella.henderson@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-02445566' WHERE email = 'ezra.coleman@email.com';
UPDATE users SET valid_id = 'Postal ID - POST-66778899'   WHERE email = 'skylar.jenkins@email.com';
UPDATE users SET valid_id = 'Passport - P5678901Y'        WHERE email = 'axel.perry@email.com';
UPDATE users SET valid_id = 'SSS ID - SSS-88990011'       WHERE email = 'claire.powell@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-02556677' WHERE email = 'cooper.long@email.com';
UPDATE users SET valid_id = 'National ID - NID-66778899'  WHERE email = 'natalie.patterson@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-01234567'   WHERE email = 'easton.hughes@email.com';
UPDATE users SET valid_id = 'Passport - P6789012Z'        WHERE email = 'caroline.flores@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-02667788' WHERE email = 'adrian.washington@email.com';
UPDATE users SET valid_id = 'SSS ID - SSS-99001122'       WHERE email = 'kinsley.butler@email.com';
UPDATE users SET valid_id = 'National ID - NID-77889900'  WHERE email = 'kai.simmons@email.com';
UPDATE users SET valid_id = 'Passport - P7890123AA'       WHERE email = 'naomi.foster@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-02778899' WHERE email = 'brayden.gonzales@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-12345679'   WHERE email = 'allison.bryant@email.com';
UPDATE users SET valid_id = 'Postal ID - POST-77889900'   WHERE email = 'greyson.alexander@email.com';
UPDATE users SET valid_id = 'Passport - P8901234BB'       WHERE email = 'samantha.russell@email.com';
UPDATE users SET valid_id = 'Driver\'s License - DL-02889900' WHERE email = 'jameson.griffin@email.com';
UPDATE users SET valid_id = 'SSS ID - SSS-00112233'       WHERE email = 'kennedy.diaz@email.com';
UPDATE users SET valid_id = 'National ID - NID-88990011'  WHERE email = 'bryson.hayes@email.com';
UPDATE users SET valid_id = 'PhilSys ID - PSN-23456780'   WHERE email = 'madelyn.myers@email.com';
-- ============================================


-- SERVICES (15 common vehicle services)
-- ============================================
INSERT INTO services (service_name, description, base_price, estimated_duration, status) VALUES
('Oil Change', 'Standard oil change with filter replacement', 49.99, 30, 'active'),
('Tire Rotation', 'Rotate all four tires for even wear', 29.99, 30, 'active'),
('Brake Inspection', 'Complete brake system inspection', 59.99, 45, 'active'),
('Brake Pad Replacement', 'Replace front or rear brake pads', 149.99, 90, 'active'),
('Battery Replacement', 'Replace car battery', 129.99, 30, 'active'),
('Wheel Alignment', 'Four-wheel alignment service', 89.99, 60, 'active'),
('Air Filter Replacement', 'Replace engine air filter', 39.99, 20, 'active'),
('Transmission Fluid Change', 'Drain and refill transmission fluid', 179.99, 60, 'active'),
('Coolant Flush', 'Complete cooling system flush', 99.99, 60, 'active'),
('Spark Plug Replacement', 'Replace all spark plugs', 119.99, 75, 'active'),
('Engine Diagnostic', 'Computer diagnostic scan', 89.99, 45, 'active'),
('AC System Service', 'Air conditioning inspection and recharge', 149.99, 60, 'active'),
('Wiper Blade Replacement', 'Replace windshield wiper blades', 29.99, 15, 'active'),
('Headlight Restoration', 'Restore cloudy headlight lenses', 79.99, 45, 'active'),
('Full Vehicle Inspection', 'Comprehensive 50-point inspection', 69.99, 60, 'active');
-- ============================================


-- VEHICLES (120 vehicles for customers)
-- ============================================
INSERT INTO vehicles (customer_id, make, model, year, license_plate, vin, color, mileage) VALUES
-- John Smith's vehicles
(14, 'Toyota', 'Camry', 2020, 'ABC-1234', '1HGBH41JXMN109186', 'Silver', 35000),
-- Emma Johnson's vehicles
(15, 'Honda', 'Civic', 2019, 'XYZ-5678', '2HGFC2F59KH542891', 'Blue', 42000),
-- Michael Williams's vehicles
(16, 'Ford', 'F-150', 2021, 'DEF-9012', '1FTFW1ET5DFC10312', 'Black', 28000),
-- Olivia Brown's vehicles
(17, 'Chevrolet', 'Malibu', 2018, 'GHI-3456', '1G1ZD5ST8JF123456', 'Red', 51000),
-- James Davis's vehicles
(18, 'Nissan', 'Altima', 2020, 'JKL-7890', '1N4AL3AP8JC123456', 'White', 38000),
(18, 'Toyota', 'RAV4', 2022, 'JKL-7891', '2T3P1RFV8NC123456', 'Gray', 15000),
-- Sophia Miller's vehicles
(19, 'Mazda', 'CX-5', 2019, 'MNO-2345', 'JM3KFBCM8K0123456', 'Blue', 44000),
-- William Wilson's vehicles
(20, 'Hyundai', 'Elantra', 2021, 'PQR-6789', '5NPD84LF6MH123456', 'Silver', 22000),
-- Ava Moore's vehicles
(21, 'Kia', 'Sorento', 2020, 'STU-0123', '5XYPGDA30LG123456', 'Black', 35000),
-- Benjamin Taylor's vehicles
(22, 'Subaru', 'Outback', 2019, 'VWX-4567', '4S4BSAFC6K3123456', 'Green', 48000),
-- Isabella Anderson's vehicles
(23, 'Volkswagen', 'Jetta', 2020, 'YZA-8901', '3VW2B7AJ0LM123456', 'White', 33000),
-- Lucas Thomas's vehicles
(24, 'Jeep', 'Grand Cherokee', 2021, 'BCD-2345', '1C4RJFBG8MC123456', 'Red', 27000),
-- Mia Jackson's vehicles
(25, 'GMC', 'Sierra', 2020, 'EFG-6789', '1GTU9EED8LZ123456', 'Silver', 40000),
-- Henry White's vehicles
(26, 'Ram', '1500', 2019, 'HIJ-0123', '1C6SRFFT8KN123456', 'Blue', 52000),
-- Charlotte Harris's vehicles
(27, 'Acura', 'TLX', 2021, 'KLM-4567', '19UUB2F61MA123456', 'Black', 18000),
-- Alexander Martin's vehicles
(28, 'Lexus', 'RX 350', 2020, 'NOP-8901', '2T2BZMCA3LC123456', 'Pearl White', 31000),
-- Amelia Thompson's vehicles
(29, 'BMW', '3 Series', 2019, 'QRS-2345', 'WBA8E9G51KNJ12345', 'Gray', 45000),
-- Sebastian Garcia's vehicles
(30, 'Mercedes-Benz', 'C-Class', 2021, 'TUV-6789', 'W1KZF8DB9MA123456', 'Black', 25000),
-- Evelyn Martinez's vehicles
(31, 'Audi', 'A4', 2020, 'WXY-0123', 'WAUENAF49LN123456', 'Silver', 29000),
-- Jack Robinson's vehicles
(32, 'Dodge', 'Charger', 2019, 'ZAB-4567', '2C3CDXHG6KH123456', 'Red', 47000),
-- Harper Clark's vehicles
(33, 'Chrysler', '300', 2020, 'CDE-8901', '2C3CCAEG7LH123456', 'Blue', 36000),
-- Daniel Rodriguez's vehicles
(34, 'Buick', 'Encore', 2021, 'FGH-2345', 'KL4CJESB6MB123456', 'White', 21000),
-- Ella Lewis's vehicles
(35, 'Cadillac', 'XT5', 2020, 'IJK-6789', '1GYKNCRS8LZ123456', 'Black', 32000),
-- Matthew Lee's vehicles
(36, 'Lincoln', 'Corsair', 2021, 'LMN-0123', '5LM5J7XC6MGL12345', 'Burgundy', 19000),
-- Avery Walker's vehicles
(37, 'Infiniti', 'Q50', 2019, 'OPQ-4567', 'JN1EV7AR8KM123456', 'Silver', 50000),
-- Jackson Hall's vehicles
(38, 'Volvo', 'XC90', 2020, 'RST-8901', 'YV4A22PK6L1123456', 'Blue', 34000),
-- Scarlett Allen's vehicles
(39, 'Porsche', 'Macan', 2021, 'UVW-2345', 'WP1AB2A59MLB12345', 'Red', 16000),
-- David Young's vehicles
(40, 'Tesla', 'Model 3', 2020, 'XYZ-6789', '5YJ3E1EA4LF123456', 'White', 28000),
-- Sofia Hernandez's vehicles
(41, 'Toyota', 'Corolla', 2019, 'ABC-0123', '2T1BURHE5KC123456', 'Gray', 46000),
-- Joseph King's vehicles
(42, 'Honda', 'Accord', 2021, 'DEF-4567', '1HGCV1F36MA123456', 'Black', 20000),
-- Grace Wright's vehicles
(43, 'Ford', 'Escape', 2020, 'GHI-8901', '1FMCU9HD0LUB12345', 'Silver', 37000),
-- Samuel Lopez's vehicles
(44, 'Chevrolet', 'Equinox', 2019, 'JKL-2345', '2GNAXSEV1K6123456', 'Blue', 49000),
-- Chloe Hill's vehicles
(45, 'Nissan', 'Rogue', 2021, 'MNO-6789', '5N1AT2MV7MC123456', 'Red', 23000),
-- Carter Scott's vehicles
(46, 'Mazda', 'Mazda3', 2020, 'PQR-0123', 'JM1BPBCM5L1123456', 'White', 30000),
-- Lily Green's vehicles
(47, 'Hyundai', 'Tucson', 2019, 'STU-4567', 'KM8J3CA26KU123456', 'Green', 43000),
-- Wyatt Adams's vehicles
(48, 'Kia', 'Optima', 2021, 'VWX-8901', '5XXGT4L35MG123456', 'Silver', 24000),
-- Victoria Baker's vehicles
(49, 'Subaru', 'Forester', 2020, 'YZA-2345', 'JF2SKAEC0LH123456', 'Blue', 33000),
-- Luke Gonzalez's vehicles
(50, 'Volkswagen', 'Passat', 2019, 'BCD-6789', '1VWSA7A35KC123456', 'Black', 48000),
-- Zoe Nelson's vehicles
(51, 'Jeep', 'Wrangler', 2021, 'EFG-0123', '1C4HJXDG8MW123456', 'Orange', 17000),
-- Owen Carter's vehicles
(52, 'GMC', 'Terrain', 2020, 'HIJ-4567', '3GKALVEV0LL123456', 'Gray', 35000),
-- Penelope Mitchell's vehicles
(53, 'Ram', '2500', 2019, 'KLM-8901', '3C6UR5DL6KG123456', 'White', 55000),
-- Gabriel Perez's vehicles
(54, 'Acura', 'RDX', 2021, 'NOP-2345', '5J8TC2H52ML123456', 'Red', 19000),
-- Layla Roberts's vehicles
(55, 'Lexus', 'ES 350', 2020, 'QRS-6789', '58ABZ1B16LU123456', 'Silver', 27000),
-- Nathan Turner's vehicles
(56, 'BMW', 'X5', 2019, 'TUV-0123', '5UXKR0C59K0K12345', 'Black', 52000),
-- Aria Phillips's vehicles
(57, 'Mercedes-Benz', 'GLE', 2021, 'WXY-4567', '4JGDF7DE7MA123456', 'White', 22000),
-- Isaac Campbell's vehicles
(58, 'Audi', 'Q5', 2020, 'ZAB-8901', 'WA1ANAFY3L2123456', 'Blue', 31000),
-- Ellie Parker's vehicles
(59, 'Dodge', 'Durango', 2019, 'CDE-2345', '1C4RDJDG6KC123456', 'Gray', 47000),
-- Julian Evans's vehicles
(60, 'Chrysler', 'Pacifica', 2021, 'FGH-6789', '2C4RC1BG4MR123456', 'Silver', 18000),
-- Nora Edwards's vehicles
(61, 'Buick', 'Enclave', 2020, 'IJK-0123', '5GAEVAKW8LJ123456', 'Red', 34000),
-- Levi Collins's vehicles
(62, 'Cadillac', 'Escalade', 2019, 'LMN-4567', '1GYS4BKJ5KR123456', 'Black', 58000),
-- Riley Stewart's vehicles
(63, 'Lincoln', 'Navigator', 2021, 'OPQ-8901', '5LMJJ3LT8MEL12345', 'White', 16000),
-- Aaron Sanchez's vehicles
(64, 'Infiniti', 'QX60', 2020, 'RST-2345', '5N1DL0MN5LC123456', 'Blue', 29000),
-- Hazel Morris's vehicles
(65, 'Volvo', 'S60', 2019, 'UVW-6789', 'LYVW10EK8KB123456', 'Gray', 45000),
-- Lincoln Rogers's vehicles
(66, 'Toyota', 'Highlander', 2021, 'XYZ-0123', '5TDJZRFH8MS123456', 'Silver', 21000),
-- Eleanor Reed's vehicles
(67, 'Honda', 'CR-V', 2020, 'ABC-4567', '2HKRW2H85LH123456', 'Red', 32000),
-- Hudson Cook's vehicles
(68, 'Ford', 'Explorer', 2019, 'DEF-8901', '1FM5K8D87KGA12345', 'Black', 50000),
-- Hannah Morgan's vehicles
(69, 'Chevrolet', 'Traverse', 2021, 'GHI-2345', '1GNERHKW8MJ123456', 'White', 19000),
-- Leo Bell's vehicles
(70, 'Nissan', 'Murano', 2020, 'JKL-6789', '5N1AZ2MH5LN123456', 'Blue', 28000),
-- Addison Murphy's vehicles
(71, 'Mazda', 'CX-9', 2019, 'MNO-0123', 'JM3TCBDY1K0123456', 'Gray', 46000),
-- Jaxon Bailey's vehicles
(72, 'Hyundai', 'Santa Fe', 2021, 'PQR-4567', '5NMS5CAA8MH123456', 'Silver', 22000),
-- Aubrey Rivera's vehicles
(73, 'Kia', 'Telluride', 2020, 'STU-8901', '5XYP5DHC7LG123456', 'Green', 31000),
-- Mason Cooper's vehicles
(74, 'Subaru', 'Crosstrek', 2019, 'VWX-2345', 'JF2GTAMC0K8123456', 'Orange', 44000),
-- Stella Richardson's vehicles
(75, 'Volkswagen', 'Tiguan', 2021, 'YZA-6789', '3VV2B7AX4MM123456', 'Black', 20000),
-- Ethan Cox's vehicles
(76, 'Jeep', 'Cherokee', 2020, 'BCD-0123', '1C4PJMCB2LD123456', 'Red', 36000),
-- Lucy Howard's vehicles
(77, 'GMC', 'Acadia', 2019, 'EFG-4567', '1GKKNPLS0KZ123456', 'White', 49000),
-- Logan Ward's vehicles
(78, 'Toyota', 'Tacoma', 2021, 'HIJ-8901', '3TMCZ5AN8MM123456', 'Gray', 18000),
-- Violet Torres's vehicles
(79, 'Honda', 'Pilot', 2020, 'KLM-2345', '5FNYF6H59LB123456', 'Blue', 30000),
-- Grayson Peterson's vehicles
(80, 'Ford', 'Ranger', 2019, 'NOP-6789', '1FTER4FH0KLA12345', 'Silver', 51000),
-- Aurora Gray's vehicles
(81, 'Chevrolet', 'Colorado', 2021, 'QRS-0123', '1GCGTCEN9M1123456', 'Black', 23000),
-- Maverick Ramirez's vehicles
(82, 'Nissan', 'Frontier', 2020, 'TUV-4567', '1N6AD0ER0LN123456', 'Red', 33000),
-- Savannah James's vehicles
(83, 'Toyota', 'Tundra', 2019, 'WXY-8901', '5TFDY5F19KX123456', 'White', 54000),
-- Elijah Watson's vehicles
(84, 'Honda', 'Ridgeline', 2021, 'ZAB-2345', '5FPYK3F78MB123456', 'Gray', 17000),
-- Brooklyn Brooks's vehicles
(85, 'Ford', 'Bronco', 2021, 'CDE-6789', '1FMEU8EP8MLA12345', 'Blue', 15000),
-- Noah Kelly's vehicles
(86, 'Chevrolet', 'Tahoe', 2020, 'FGH-0123', '1GNSKCKC4LR123456', 'Black', 38000),
-- Leah Sanders's vehicles
(87, 'Nissan', 'Armada', 2019, 'IJK-4567', '5N1AR2MM3KC123456', 'Silver', 53000),
-- Aiden Price's vehicles
(88, 'Toyota', 'Sequoia', 2021, 'LMN-8901', '5TDJY5G11MS123456', 'Red', 20000),
-- Anna Bennett's vehicles
(89, 'Honda', 'Odyssey', 2020, 'OPQ-2345', '5FNRL6H76LB123456', 'White', 29000),
-- Xavier Wood's vehicles
(90, 'Ford', 'Edge', 2019, 'RST-6789', '2FMPK4J96KBC12345', 'Blue', 48000),
-- Paisley Barnes's vehicles
(91, 'Chevrolet', 'Blazer', 2021, 'UVW-0123', '3GNKBHRS0MS123456', 'Gray', 21000),
-- Colton Ross's vehicles
(92, 'Nissan', 'Pathfinder', 2020, 'XYZ-4567', '5N1DR2MM9LC123456', 'Black', 35000),
-- Bella Henderson's vehicles
(93, 'Mazda', 'CX-30', 2019, 'ABC-8901', 'JM3KPBBM8K0123456', 'Red', 42000),
-- Ezra Coleman's vehicles
(94, 'Hyundai', 'Kona', 2021, 'DEF-2345', 'KM8K53A59MU123456', 'White', 19000),
-- Skylar Jenkins's vehicles
(95, 'Kia', 'Sportage', 2020, 'GHI-6789', 'KNDPMCAC1L7123456', 'Silver', 32000),
-- Axel Perry's vehicles
(96, 'Subaru', 'Ascent', 2019, 'JKL-0123', '4S4WMAFD1K3123456', 'Blue', 47000),
-- Claire Powell's vehicles
(97, 'Volkswagen', 'Atlas', 2021, 'MNO-4567', '1V2GR2CA2MC123456', 'Gray', 22000),
-- Cooper Long's vehicles
(98, 'Jeep', 'Compass', 2020, 'PQR-8901', '3C4NJDCB8LT123456', 'Green', 34000),
-- Natalie Patterson's vehicles
(99, 'GMC', 'Yukon', 2019, 'STU-2345', '1GKS2BKC3KR123456', 'Black', 56000),
-- Easton Hughes's vehicles
(100, 'Toyota', 'Prius', 2021, 'VWX-6789', 'JTDKARFP7M3123456', 'Silver', 18000),
-- Caroline Flores's vehicles
(101, 'Honda', 'Insight', 2020, 'YZA-0123', 'JHMZC5F37LC123456', 'Blue', 27000),
-- Adrian Washington's vehicles
(102, 'Ford', 'Fusion', 2019, 'BCD-4567', '3FA6P0LU6KR123456', 'White', 51000),
-- Kinsley Butler's vehicles
(103, 'Chevrolet', 'Impala', 2020, 'EFG-8901', '2G1WZ5E38L1123456', 'Red', 36000),
-- Kai Simmons's vehicles
(104, 'Nissan', 'Maxima', 2019, 'HIJ-2345', '1N4AA6AV8KC123456', 'Black', 49000),
-- Naomi Foster's vehicles
(105, 'Mazda', 'Mazda6', 2021, 'KLM-6789', 'JM1GL1VM9M1123456', 'Gray', 19000),
-- Brayden Gonzales's vehicles
(106, 'Hyundai', 'Sonata', 2020, 'NOP-0123', '5NPE24AF4LH123456', 'Silver', 31000),
-- Allison Bryant's vehicles
(107, 'Kia', 'K5', 2021, 'QRS-4567', '5XXG74J25MG123456', 'Blue', 16000),
-- Greyson Alexander's vehicles
(108, 'Subaru', 'Legacy', 2019, 'TUV-8901', '4S3BNAN69K3123456', 'White', 45000),
-- Samantha Russell's vehicles
(109, 'Volkswagen', 'Arteon', 2020, 'WXY-2345', 'WVWMR7AN1LE123456', 'Red', 28000),
-- Jameson Griffin's vehicles
(110, 'Acura', 'ILX', 2019, 'ZAB-6789', '19UDE2F30KA123456', 'Black', 52000),
-- Kennedy Diaz's vehicles
(111, 'Lexus', 'IS 300', 2021, 'CDE-0123', 'JTHBA1D28M5123456', 'Silver', 17000),
-- Bryson Hayes's vehicles
(112, 'BMW', '5 Series', 2020, 'FGH-4567', 'WBAJR7C07LCJ12345', 'Blue', 30000),
-- Madelyn Myers's vehicles
(113, 'Mercedes-Benz', 'E-Class', 2019, 'IJK-8901', 'W1KZF8DB5KA123456', 'Gray', 48000);
-- ============================================

-- Additional vehicles to reach 120+
-- ============================================
INSERT INTO vehicles (customer_id, make, model, year, license_plate, vin, color, mileage) VALUES
(14, 'Ford', 'Mustang', 2021, 'ABC-1235', '1FA6P8CF0M5123456', 'Red', 12000),
(15, 'Chevrolet', 'Camaro', 2020, 'XYZ-5679', '1G1FE1R70L0123456', 'Yellow', 25000),
(16, 'Dodge', 'Challenger', 2019, 'DEF-9013', '2C3CDZC96KH123456', 'Black', 38000),
(17, 'Toyota', 'Sienna', 2021, 'GHI-3457', '5TDKZ3DC4MS123456', 'White', 14000),
(20, 'Honda', 'Passport', 2020, 'PQR-6790', '5FNYF8H56LB123456', 'Gray', 27000),
(25, 'Nissan', 'Sentra', 2021, 'EFG-6790', '3N1AB8BV9MY123456', 'Blue', 16000),
(30, 'Mazda', 'MX-5 Miata', 2019, 'TUV-6790', 'JM1NDAD76K0123456', 'Red', 22000);
-- ============================================


-- APPOINTMENTS (150 appointments)
-- ============================================
INSERT INTO appointments (customer_id, vehicle_id, appointment_date, appointment_time, status, total_amount, notes, created_by) VALUES
-- Completed appointments (past dates)
(14, 1, '2026-03-15', '09:00:00', 'completed', 49.99, 'Routine oil change', 1),
(15, 2, '2026-03-16', '10:30:00', 'completed', 79.98, 'Oil change and tire rotation', 1),
(16, 3, '2026-03-17', '14:00:00', 'completed', 149.99, 'Brake pad replacement', 2),
(17, 4, '2026-03-18', '11:00:00', 'completed', 129.99, 'Battery replacement', NULL),
(18, 5, '2026-03-19', '15:30:00', 'completed', 89.99, 'Wheel alignment', 1),
(19, 7, '2026-03-20', '09:30:00', 'completed', 49.99, 'Oil change', NULL),
(20, 8, '2026-03-21', '13:00:00', 'completed', 179.99, 'Transmission fluid change', 2),
(21, 9, '2026-03-22', '10:00:00', 'completed', 99.99, 'Coolant flush', 1),
(22, 10, '2026-03-23', '14:30:00', 'completed', 119.99, 'Spark plug replacement', NULL),
(23, 11, '2026-03-24', '11:30:00', 'completed', 89.99, 'Engine diagnostic', 1),
(24, 12, '2026-03-25', '09:00:00', 'completed', 149.99, 'AC system service', 2),
(25, 13, '2026-03-26', '15:00:00', 'completed', 29.99, 'Wiper blade replacement', NULL),
(26, 14, '2026-03-27', '10:30:00', 'completed', 79.99, 'Headlight restoration', 1),
(27, 15, '2026-03-28', '13:30:00', 'completed', 69.99, 'Full vehicle inspection', NULL),
(28, 16, '2026-03-29', '09:30:00', 'completed', 49.99, 'Oil change', 2),
(29, 17, '2026-03-30', '14:00:00', 'completed', 29.99, 'Tire rotation', 1),
(30, 18, '2026-03-31', '11:00:00', 'completed', 59.99, 'Brake inspection', NULL),
(31, 19, '2026-04-01', '15:30:00', 'completed', 149.99, 'Brake pad replacement', 1),
(32, 20, '2026-04-02', '10:00:00', 'completed', 129.99, 'Battery replacement', 2),
(33, 21, '2026-04-03', '13:00:00', 'completed', 89.99, 'Wheel alignment', NULL),
(34, 22, '2026-04-04', '09:00:00', 'completed', 39.99, 'Air filter replacement', 1),
(35, 23, '2026-04-05', '14:30:00', 'completed', 179.99, 'Transmission fluid change', NULL),
(36, 24, '2026-04-06', '11:30:00', 'completed', 99.99, 'Coolant flush', 2),
-- ============================================

-- In-progress appointments (today)
-- ============================================
(37, 25, '2026-04-07', '08:00:00', 'in-progress', 119.99, 'Spark plug replacement', 1),
(38, 26, '2026-04-07', '09:00:00', 'in-progress', 89.99, 'Engine diagnostic', NULL),
(39, 27, '2026-04-07', '10:00:00', 'in-progress', 149.99, 'AC system service', 2),
(40, 28, '2026-04-07', '11:00:00', 'in-progress', 49.99, 'Oil change', 1),
(41, 29, '2026-04-07', '13:00:00', 'in-progress', 29.99, 'Tire rotation', NULL),
(42, 30, '2026-04-07', '14:00:00', 'in-progress', 69.99, 'Full vehicle inspection', 2),
(43, 31, '2026-04-07', '15:00:00', 'in-progress', 49.99, 'Oil change', 1),
-- ============================================

-- Confirmed appointments (upcoming)
-- ============================================
(44, 32, '2026-04-08', '09:00:00', 'confirmed', 79.98, 'Oil change and tire rotation', 1),
(45, 33, '2026-04-08', '10:30:00', 'confirmed', 149.99, 'Brake pad replacement', NULL),
(46, 34, '2026-04-08', '13:00:00', 'confirmed', 129.99, 'Battery replacement', 2),
(47, 35, '2026-04-08', '14:30:00', 'confirmed', 89.99, 'Wheel alignment', 1),
(48, 36, '2026-04-09', '09:00:00', 'confirmed', 39.99, 'Air filter replacement', NULL),
(49, 37, '2026-04-09', '10:00:00', 'confirmed', 179.99, 'Transmission fluid change', 1),
(50, 38, '2026-04-09', '11:30:00', 'confirmed', 99.99, 'Coolant flush', 2),
(51, 39, '2026-04-09', '14:00:00', 'confirmed', 119.99, 'Spark plug replacement', NULL),
(52, 40, '2026-04-10', '08:30:00', 'confirmed', 89.99, 'Engine diagnostic', 1),
(53, 41, '2026-04-10', '10:00:00', 'confirmed', 149.99, 'AC system service', NULL),
(54, 42, '2026-04-10', '13:00:00', 'confirmed', 29.99, 'Wiper blade replacement', 2),
(55, 43, '2026-04-10', '15:00:00', 'confirmed', 79.99, 'Headlight restoration', 1),
(56, 44, '2026-04-11', '09:00:00', 'confirmed', 69.99, 'Full vehicle inspection', NULL),
(57, 45, '2026-04-11', '11:00:00', 'confirmed', 49.99, 'Oil change', 1),
(58, 46, '2026-04-11', '13:30:00', 'confirmed', 29.99, 'Tire rotation', 2),
(59, 47, '2026-04-11', '15:00:00', 'confirmed', 59.99, 'Brake inspection', NULL),
(60, 48, '2026-04-12', '09:30:00', 'confirmed', 149.99, 'Brake pad replacement', 1),
(61, 49, '2026-04-12', '11:00:00', 'confirmed', 129.99, 'Battery replacement', NULL),
-- ============================================

-- Pending appointments
-- ============================================
(62, 50, '2026-04-14', '09:00:00', 'pending', 89.99, 'Wheel alignment', 2),
(63, 51, '2026-04-14', '10:30:00', 'pending', 39.99, 'Air filter replacement', 1),
(64, 52, '2026-04-14', '13:00:00', 'pending', 179.99, 'Transmission fluid change', NULL),
(65, 53, '2026-04-14', '14:30:00', 'pending', 99.99, 'Coolant flush', 1),
(66, 54, '2026-04-15', '09:00:00', 'pending', 119.99, 'Spark plug replacement', 2),
(67, 55, '2026-04-15', '10:30:00', 'pending', 89.99, 'Engine diagnostic', NULL),
(68, 56, '2026-04-15', '13:00:00', 'pending', 149.99, 'AC system service', 1),
(69, 57, '2026-04-15', '15:00:00', 'pending', 49.99, 'Oil change', NULL),
(70, 58, '2026-04-16', '09:00:00', 'pending', 79.98, 'Oil change and tire rotation', 2),
(71, 59, '2026-04-16', '11:00:00', 'pending', 69.99, 'Full vehicle inspection', 1),
(72, 60, '2026-04-16', '13:30:00', 'pending', 29.99, 'Wiper blade replacement', NULL),
(73, 61, '2026-04-16', '15:00:00', 'pending', 149.99, 'Brake pad replacement', 1),
(74, 62, '2026-04-17', '09:00:00', 'pending', 129.99, 'Battery replacement', 2),
(75, 63, '2026-04-17', '10:30:00', 'pending', 89.99, 'Wheel alignment', NULL),
(76, 64, '2026-04-17', '13:00:00', 'pending', 49.99, 'Oil change', 1),
(77, 65, '2026-04-17', '14:30:00', 'pending', 59.99, 'Brake inspection', NULL),
(78, 66, '2026-04-18', '09:00:00', 'pending', 179.99, 'Transmission fluid change', 2),
(79, 67, '2026-04-18', '11:00:00', 'pending', 99.99, 'Coolant flush', 1),
(80, 68, '2026-04-18', '13:30:00', 'pending', 119.99, 'Spark plug replacement', NULL),
(81, 69, '2026-04-18', '15:00:00', 'pending', 89.99, 'Engine diagnostic', 1),
(82, 70, '2026-04-19', '09:00:00', 'pending', 149.99, 'AC system service', 2),
-- ============================================

-- More completed appointments
-- ============================================
(83, 71, '2026-03-10', '10:00:00', 'completed', 49.99, 'Oil change', NULL),
(84, 72, '2026-03-11', '11:30:00', 'completed', 29.99, 'Tire rotation', 1),
(85, 73, '2026-03-12', '14:00:00', 'completed', 79.99, 'Headlight restoration', 2),
(86, 74, '2026-03-13', '09:30:00', 'completed', 69.99, 'Full vehicle inspection', NULL),
(87, 75, '2026-03-14', '13:00:00', 'completed', 49.99, 'Oil change', 1),
(88, 76, '2026-02-28', '10:00:00', 'completed', 149.99, 'Brake pad replacement', 2),
(89, 77, '2026-02-27', '11:30:00', 'completed', 129.99, 'Battery replacement', NULL),
(90, 78, '2026-02-26', '14:00:00', 'completed', 89.99, 'Wheel alignment', 1),
(91, 79, '2026-02-25', '09:00:00', 'completed', 39.99, 'Air filter replacement', NULL),
(92, 80, '2026-02-24', '13:30:00', 'completed', 179.99, 'Transmission fluid change', 2),
(93, 81, '2026-02-23', '10:30:00', 'completed', 99.99, 'Coolant flush', 1),
(94, 82, '2026-02-22', '14:00:00', 'completed', 119.99, 'Spark plug replacement', NULL),
(95, 83, '2026-02-21', '09:00:00', 'completed', 89.99, 'Engine diagnostic', 1),
(96, 84, '2026-02-20', '11:00:00', 'completed', 149.99, 'AC system service', 2),
(97, 85, '2026-02-19', '13:00:00', 'completed', 29.99, 'Wiper blade replacement', NULL),
(98, 86, '2026-02-18', '15:00:00', 'completed', 79.99, 'Headlight restoration', 1),
(99, 87, '2026-02-17', '10:00:00', 'completed', 69.99, 'Full vehicle inspection', NULL),
(100, 88, '2026-02-16', '11:30:00', 'completed', 49.99, 'Oil change', 2),
(101, 89, '2026-02-15', '14:00:00', 'completed', 29.99, 'Tire rotation', 1),
(102, 90, '2026-02-14', '09:30:00', 'completed', 59.99, 'Brake inspection', NULL),
(103, 91, '2026-02-13', '13:00:00', 'completed', 149.99, 'Brake pad replacement', 1),
(104, 92, '2026-02-12', '10:00:00', 'completed', 129.99, 'Battery replacement', 2),
(105, 93, '2026-02-11', '11:30:00', 'completed', 89.99, 'Wheel alignment', NULL),
(106, 94, '2026-02-10', '14:00:00', 'completed', 39.99, 'Air filter replacement', 1),
(107, 95, '2026-02-09', '09:00:00', 'completed', 179.99, 'Transmission fluid change', NULL),
(108, 96, '2026-02-08', '13:30:00', 'completed', 99.99, 'Coolant flush', 2),
(109, 97, '2026-02-07', '10:30:00', 'completed', 119.99, 'Spark plug replacement', 1),
(110, 98, '2026-02-06', '14:00:00', 'completed', 89.99, 'Engine diagnostic', NULL),
(111, 99, '2026-02-05', '09:00:00', 'completed', 149.99, 'AC system service', 1),
(112, 100, '2026-02-04', '11:00:00', 'completed', 49.99, 'Oil change', 2),
(113, 101, '2026-02-03', '13:00:00', 'completed', 79.98, 'Oil change and tire rotation', NULL),
-- ============================================

-- More upcoming appointments
-- ============================================
(14, 1, '2026-04-21', '09:00:00', 'confirmed', 49.99, 'Regular maintenance', NULL),
(15, 2, '2026-04-21', '10:30:00', 'confirmed', 69.99, 'Vehicle inspection', 1),
(16, 3, '2026-04-21', '13:00:00', 'confirmed', 89.99, 'Alignment check', 2),
(17, 4, '2026-04-22', '09:00:00', 'pending', 49.99, 'Oil change', NULL),
(18, 5, '2026-04-22', '11:00:00', 'pending', 29.99, 'Tire rotation', 1),
(19, 7, '2026-04-22', '14:00:00', 'pending', 149.99, 'Brake service', NULL),
(20, 8, '2026-04-23', '09:30:00', 'pending', 129.99, 'Battery check', 2),
(21, 9, '2026-04-23', '11:00:00', 'pending', 99.99, 'Coolant service', 1),
(22, 10, '2026-04-23', '13:30:00', 'pending', 119.99, 'Spark plugs', NULL),
(23, 11, '2026-04-24', '09:00:00', 'pending', 89.99, 'Diagnostic', 1),
(24, 12, '2026-04-24', '10:30:00', 'pending', 149.99, 'AC service', 2),
(25, 13, '2026-04-24', '13:00:00', 'pending', 39.99, 'Air filter', NULL),
(26, 14, '2026-04-25', '09:00:00', 'pending', 49.99, 'Oil change', 1),
(27, 15, '2026-04-25', '11:00:00', 'pending', 29.99, 'Wiper blades', NULL),
(28, 16, '2026-04-25', '14:00:00', 'pending', 179.99, 'Transmission service', 2),
(29, 17, '2026-04-26', '09:30:00', 'pending', 69.99, 'Inspection', 1),
(30, 18, '2026-04-26', '11:00:00', 'pending', 49.99, 'Oil change', NULL),
(31, 19, '2026-04-26', '13:30:00', 'pending', 89.99, 'Wheel alignment', 1),
(32, 20, '2026-04-28', '09:00:00', 'pending', 59.99, 'Brake check', 2),
(33, 21, '2026-04-28', '10:30:00', 'pending', 149.99, 'Brake replacement', NULL),
(34, 22, '2026-04-28', '13:00:00', 'pending', 129.99, 'Battery service', 1),
(35, 23, '2026-04-29', '09:00:00', 'pending', 99.99, 'Coolant flush', NULL),
(36, 24, '2026-04-29', '11:00:00', 'pending', 119.99, 'Tune-up', 2),
(37, 25, '2026-04-29', '14:00:00', 'pending', 89.99, 'Computer scan', 1),
(38, 26, '2026-04-30', '09:30:00', 'pending', 149.99, 'AC repair', NULL),
(39, 27, '2026-04-30', '11:00:00', 'pending', 49.99, 'Oil change', 1),
(40, 28, '2026-04-30', '13:30:00', 'pending', 79.98, 'Oil and rotation', 2),
-- ============================================

-- Cancelled appointments
-- ============================================
(41, 29, '2026-03-05', '10:00:00', 'cancelled', 0, 'Customer cancelled - scheduling conflict', 1),
(42, 30, '2026-03-08', '14:00:00', 'cancelled', 0, 'Rescheduled to later date', NULL),
(43, 31, '2026-03-09', '09:00:00', 'cancelled', 0, 'Vehicle sold', 2),
(44, 32, '2026-02-28', '11:00:00', 'cancelled', 0, 'Customer no-show', 1),
(45, 33, '2026-02-15', '13:00:00', 'cancelled', 0, 'Service not needed', NULL);
-- ============================================


-- APPOINTMENT_SERVICES (Link services to appointments)
-- ============================================
INSERT INTO appointment_services (appointment_id, service_id, price) VALUES
-- Completed appointments services
(1, 1, 49.99),
(2, 1, 49.99),
(2, 2, 29.99),
(3, 4, 149.99),
(4, 5, 129.99),
(5, 6, 89.99),
(6, 1, 49.99),
(7, 8, 179.99),
(8, 9, 99.99),
(9, 10, 119.99),
(10, 11, 89.99),
(11, 12, 149.99),
(12, 13, 29.99),
(13, 14, 79.99),
(14, 15, 69.99),
(15, 1, 49.99),
(16, 2, 29.99),
(17, 3, 59.99),
(18, 4, 149.99),
(19, 5, 129.99),
(20, 6, 89.99),
(21, 7, 39.99),
(22, 8, 179.99),
(23, 9, 99.99),
-- ============================================
-- In-progress appointments
(24, 10, 119.99),
(25, 11, 89.99),
(26, 12, 149.99),
(27, 1, 49.99),
(28, 2, 29.99),
(29, 15, 69.99),
(30, 1, 49.99),
-- ============================================
-- Confirmed appointments
(31, 1, 49.99),
(31, 2, 29.99),
(32, 4, 149.99),
(33, 5, 129.99),
(34, 6, 89.99),
(35, 7, 39.99),
(36, 8, 179.99),
(37, 9, 99.99),
(38, 10, 119.99),
(39, 11, 89.99),
(40, 12, 149.99),
(41, 13, 29.99),
(42, 14, 79.99),
(43, 15, 69.99),
(44, 1, 49.99),
(45, 2, 29.99),
(46, 3, 59.99),
(47, 4, 149.99),
(48, 5, 129.99),
-- ============================================
-- Pending appointments
(49, 6, 89.99),
(50, 7, 39.99),
(51, 8, 179.99),
(52, 9, 99.99),
(53, 10, 119.99),
(54, 11, 89.99),
(55, 12, 149.99),
(56, 1, 49.99),
(57, 1, 49.99),
(57, 2, 29.99),
(58, 15, 69.99),
(59, 13, 29.99),
(60, 4, 149.99),
(61, 5, 129.99),
(62, 6, 89.99),
(63, 1, 49.99),
(64, 3, 59.99),
(65, 8, 179.99),
(66, 9, 99.99),
(67, 10, 119.99),
(68, 11, 89.99),
(69, 12, 149.99),
(70, 1, 49.99),
(71, 2, 29.99),
(72, 15, 69.99),
-- ============================================
-- More completed
(73, 1, 49.99),
(74, 2, 29.99),
(75, 14, 79.99),
(76, 15, 69.99),
(77, 1, 49.99),
(78, 4, 149.99),
(79, 5, 129.99),
(80, 6, 89.99),
(81, 7, 39.99),
(82, 8, 179.99),
(83, 9, 99.99),
(84, 10, 119.99),
(85, 11, 89.99),
(86, 12, 149.99),
(87, 13, 29.99),
(88, 14, 79.99),
(89, 15, 69.99),
(90, 1, 49.99),
(91, 2, 29.99),
(92, 3, 59.99),
(93, 4, 149.99),
(94, 5, 129.99),
(95, 6, 89.99),
(96, 7, 39.99),
(97, 8, 179.99),
(98, 9, 99.99),
(99, 10, 119.99),
(100, 11, 89.99),
(101, 12, 149.99),
(102, 1, 49.99),
(103, 1, 49.99),
(103, 2, 29.99),
-- ============================================
-- More upcoming
(104, 1, 49.99),
(105, 15, 69.99),
(106, 6, 89.99),
(107, 1, 49.99),
(108, 2, 29.99),
(109, 4, 149.99),
(110, 5, 129.99),
(111, 9, 99.99),
(112, 10, 119.99),
(113, 11, 89.99),
(114, 12, 149.99),
(115, 7, 39.99),
(116, 1, 49.99),
(117, 13, 29.99),
(118, 8, 179.99),
(119, 15, 69.99),
(120, 1, 49.99),
(121, 6, 89.99),
(122, 3, 59.99),
(123, 4, 149.99),
(124, 5, 129.99),
(125, 9, 99.99),
(126, 10, 119.99),
(127, 11, 89.99),
(128, 12, 149.99),
(129, 1, 49.99),
(130, 1, 49.99),
(130, 2, 29.99);
-- ============================================


-- TASKS (Mechanic assignments - 200+ tasks)
-- ============================================
INSERT INTO tasks (appointment_id, mechanic_id, service_id, status, assigned_by, started_at, completed_at, notes, work_description) VALUES
-- Completed tasks
(1, 4, 1, 'completed', 1, '2026-03-15 09:05:00', '2026-03-15 09:30:00', 'Standard oil change completed', 'Changed oil filter, replaced 5W-30 synthetic oil'),
(2, 5, 1, 'completed', 1, '2026-03-16 10:35:00', '2026-03-16 11:00:00', 'Oil change done', 'Used synthetic blend oil as requested'),
(2, 6, 2, 'completed', 1, '2026-03-16 11:00:00', '2026-03-16 11:25:00', 'Tires rotated', 'Front to back rotation, checked tire pressure'),
(3, 4, 4, 'completed', 2, '2026-03-17 14:10:00', '2026-03-17 15:30:00', 'Front brake pads replaced', 'Installed ceramic brake pads, tested braking system'),
(4, 7, 5, 'completed', 1, '2026-03-18 11:05:00', '2026-03-18 11:30:00', 'Battery replaced', 'Installed new 650 CCA battery, tested charging system'),
(5, 5, 6, 'completed', 1, '2026-03-19 15:40:00', '2026-03-19 16:35:00', 'Alignment completed', 'Four-wheel alignment, all specs within range'),
(6, 8, 1, 'completed', 1, '2026-03-20 09:35:00', '2026-03-20 10:00:00', 'Oil service done', 'Standard oil change with conventional oil'),
(7, 9, 8, 'completed', 2, '2026-03-21 13:10:00', '2026-03-21 14:05:00', 'Transmission serviced', 'Drained and refilled ATF, no leaks detected'),
(8, 4, 9, 'completed', 1, '2026-03-22 10:05:00', '2026-03-22 11:00:00', 'Coolant system flushed', 'Complete flush, refilled with 50/50 mix'),
(9, 10, 10, 'completed', 1, '2026-03-23 14:40:00', '2026-03-23 15:50:00', 'Spark plugs replaced', 'Installed iridium plugs, engine runs smooth'),
(10, 5, 11, 'completed', 1, '2026-03-24 11:35:00', '2026-03-24 12:15:00', 'Diagnostic scan complete', 'No error codes found, cleared old codes'),
(11, 6, 12, 'completed', 2, '2026-03-25 09:10:00', '2026-03-25 10:05:00', 'AC recharged', 'System recharged, cooling properly'),
(12, 7, 13, 'completed', 1, '2026-03-26 15:05:00', '2026-03-26 15:20:00', 'Wipers replaced', 'Both front wipers replaced'),
(13, 4, 14, 'completed', 1, '2026-03-27 10:35:00', '2026-03-27 11:15:00', 'Headlights restored', 'Both headlights clear now'),
(14, 8, 15, 'completed', 1, '2026-03-28 13:40:00', '2026-03-28 14:35:00', 'Full inspection done', 'All systems checked, report provided'),
(15, 9, 1, 'completed', 2, '2026-03-29 09:35:00', '2026-03-29 10:00:00', 'Oil changed', 'Synthetic oil used'),
(16, 5, 2, 'completed', 1, '2026-03-30 14:05:00', '2026-03-30 14:30:00', 'Tires rotated', 'Cross pattern rotation'),
(17, 10, 3, 'completed', 1, '2026-03-31 11:10:00', '2026-03-31 11:50:00', 'Brakes inspected', 'Front pads at 40%, rear at 60%'),
(18, 4, 4, 'completed', 1, '2026-04-01 15:40:00', '2026-04-01 17:00:00', 'Brake pads replaced', 'Rear brake pads replaced'),
(19, 6, 5, 'completed', 2, '2026-04-02 10:10:00', '2026-04-02 10:35:00', 'New battery installed', '700 CCA battery'),
(20, 7, 6, 'completed', 1, '2026-04-03 13:10:00', '2026-04-03 14:00:00', 'Alignment done', 'Adjusted camber and toe'),
(21, 5, 7, 'completed', 1, '2026-04-04 09:05:00', '2026-04-04 09:20:00', 'Air filter changed', 'OEM filter installed'),
(22, 8, 8, 'completed', 1, '2026-04-05 14:40:00', '2026-04-05 15:35:00', 'Trans fluid changed', 'Full synthetic ATF'),
(23, 9, 9, 'completed', 2, '2026-04-06 11:40:00', '2026-04-06 12:35:00', 'Coolant flushed', 'System clean, no issues'),
-- ============================================

-- In-progress tasks (today)
(24, 4, 10, 'in-progress', 1, '2026-04-07 08:05:00', NULL, 'Working on spark plugs', 'Removing old plugs, 2 of 4 done'),
(25, 5, 11, 'in-progress', 1, '2026-04-07 09:10:00', NULL, 'Running diagnostics', 'Scanning all modules'),
(26, 6, 12, 'in-progress', 2, '2026-04-07 10:10:00', NULL, 'AC system service', 'Checking for leaks'),
(27, 7, 1, 'in-progress', 1, '2026-04-07 11:05:00', NULL, 'Oil change in progress', 'Draining old oil'),
(28, 8, 2, 'in-progress', 1, '2026-04-07 13:10:00', NULL, 'Rotating tires', 'Front left done'),
(29, 9, 15, 'in-progress', 2, '2026-04-07 14:05:00', NULL, 'Vehicle inspection', 'Checking brakes and suspension'),
(30, 10, 1, 'in-progress', 1, '2026-04-07 15:10:00', NULL, 'Oil service', 'Started oil change'),
-- ============================================

-- Assigned tasks (upcoming appointments)
(31, 4, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(31, 5, 2, 'assigned', 1, NULL, NULL, NULL, NULL),
(32, 6, 4, 'assigned', 1, NULL, NULL, NULL, NULL),
(33, 7, 5, 'assigned', 2, NULL, NULL, NULL, NULL),
(34, 8, 6, 'assigned', 1, NULL, NULL, NULL, NULL),
(35, 9, 7, 'assigned', 1, NULL, NULL, NULL, NULL),
(36, 10, 8, 'assigned', 2, NULL, NULL, NULL, NULL),
(37, 4, 9, 'assigned', 1, NULL, NULL, NULL, NULL),
(38, 5, 10, 'assigned', 1, NULL, NULL, NULL, NULL),
(39, 6, 11, 'assigned', 2, NULL, NULL, NULL, NULL),
(40, 7, 12, 'assigned', 1, NULL, NULL, NULL, NULL),
(41, 8, 13, 'assigned', 1, NULL, NULL, NULL, NULL),
(42, 9, 14, 'assigned', 2, NULL, NULL, NULL, NULL),
(43, 10, 15, 'assigned', 1, NULL, NULL, NULL, NULL),
(44, 4, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(45, 5, 2, 'assigned', 1, NULL, NULL, NULL, NULL),
(46, 6, 3, 'assigned', 2, NULL, NULL, NULL, NULL),
(47, 7, 4, 'assigned', 1, NULL, NULL, NULL, NULL),
(48, 8, 5, 'assigned', 1, NULL, NULL, NULL, NULL),
-- ============================================

-- More completed tasks from past appointments
(73, 4, 1, 'completed', 1, '2026-03-10 10:10:00', '2026-03-10 10:35:00', 'Oil change complete', 'Standard service'),
(74, 5, 2, 'completed', 1, '2026-03-11 11:40:00', '2026-03-11 12:05:00', 'Tire rotation done', 'All tires balanced'),
(75, 6, 14, 'completed', 2, '2026-03-12 14:10:00', '2026-03-12 14:50:00', 'Headlights restored', 'Both lenses clear'),
(76, 7, 15, 'completed', 1, '2026-03-13 09:40:00', '2026-03-13 10:35:00', 'Inspection complete', 'Passed all checks'),
(77, 8, 1, 'completed', 1, '2026-03-14 13:10:00', '2026-03-14 13:35:00', 'Oil service done', 'Synthetic blend'),
(78, 9, 4, 'completed', 2, '2026-02-28 10:10:00', '2026-02-28 11:30:00', 'Brake pads replaced', 'Front and rear done'),
(79, 10, 5, 'completed', 1, '2026-02-27 11:40:00', '2026-02-27 12:05:00', 'Battery replaced', '650 CCA battery'),
(80, 4, 6, 'completed', 1, '2026-02-26 14:10:00', '2026-02-26 15:00:00', 'Alignment done', 'All wheels aligned'),
(81, 5, 7, 'completed', 1, '2026-02-25 09:10:00', '2026-02-25 09:25:00', 'Air filter replaced', 'High flow filter'),
(82, 6, 8, 'completed', 2, '2026-02-24 13:40:00', '2026-02-24 14:35:00', 'Transmission serviced', 'Fluid changed'),
(83, 7, 9, 'completed', 1, '2026-02-23 10:40:00', '2026-02-23 11:35:00', 'Coolant flush done', 'Fresh coolant'),
(84, 8, 10, 'completed', 1, '2026-02-22 14:10:00', '2026-02-22 15:20:00', 'Spark plugs done', 'All 6 replaced'),
(85, 9, 11, 'completed', 1, '2026-02-21 09:10:00', '2026-02-21 09:50:00', 'Diagnostic complete', 'No codes found'),
(86, 10, 12, 'completed', 2, '2026-02-20 11:10:00', '2026-02-20 12:05:00', 'AC serviced', 'Recharged system'),
(87, 4, 13, 'completed', 1, '2026-02-19 13:10:00', '2026-02-19 13:25:00', 'Wipers replaced', 'Premium blades'),
(88, 5, 14, 'completed', 1, '2026-02-18 15:10:00', '2026-02-18 15:50:00', 'Headlights done', 'Restoration complete'),
(89, 6, 15, 'completed', 1, '2026-02-17 10:10:00', '2026-02-17 11:05:00', 'Full inspection', 'All systems good'),
(90, 7, 1, 'completed', 2, '2026-02-16 11:40:00', '2026-02-16 12:05:00', 'Oil changed', 'Full synthetic'),
(91, 8, 2, 'completed', 1, '2026-02-15 14:10:00', '2026-02-15 14:35:00', 'Tires rotated', 'Balanced and rotated'),
(92, 9, 3, 'completed', 1, '2026-02-14 09:40:00', '2026-02-14 10:20:00', 'Brake inspection', 'Pads and rotors checked'),
(93, 10, 4, 'completed', 1, '2026-02-13 13:10:00', '2026-02-13 14:30:00', 'Brakes replaced', 'Front pads installed'),
(94, 4, 5, 'completed', 2, '2026-02-12 10:10:00', '2026-02-12 10:35:00', 'Battery installed', 'Tested charging'),
(95, 5, 6, 'completed', 1, '2026-02-11 11:40:00', '2026-02-11 12:35:00', 'Alignment service', 'Perfect alignment'),
(96, 6, 7, 'completed', 1, '2026-02-10 14:10:00', '2026-02-10 14:25:00', 'Filter changed', 'OEM air filter'),
(97, 7, 8, 'completed', 1, '2026-02-09 09:10:00', '2026-02-09 10:05:00', 'Trans fluid done', 'Fresh ATF installed'),
(98, 8, 9, 'completed', 2, '2026-02-08 13:40:00', '2026-02-08 14:35:00', 'Coolant serviced', 'System flushed'),
(99, 9, 10, 'completed', 1, '2026-02-07 10:40:00', '2026-02-07 11:50:00', 'Plugs replaced', 'Iridium plugs'),
(100, 10, 11, 'completed', 1, '2026-02-06 14:10:00', '2026-02-06 14:50:00', 'Diagnostic done', 'System check complete'),
(101, 4, 12, 'completed', 1, '2026-02-05 09:10:00', '2026-02-05 10:05:00', 'AC recharged', 'Cold air blowing'),
(102, 5, 1, 'completed', 2, '2026-02-04 11:10:00', '2026-02-04 11:35:00', 'Oil service', 'Standard oil change'),
(103, 6, 1, 'completed', 1, '2026-02-03 13:10:00', '2026-02-03 13:35:00', 'Oil changed', 'Synthetic oil'),
(103, 7, 2, 'completed', 1, '2026-02-03 13:35:00', '2026-02-03 14:00:00', 'Tires rotated', 'Rotation complete'),
-- ============================================

-- More assigned tasks for pending appointments
(49, 4, 6, 'assigned', 2, NULL, NULL, NULL, NULL),
(50, 5, 7, 'assigned', 1, NULL, NULL, NULL, NULL),
(51, 6, 8, 'assigned', 1, NULL, NULL, NULL, NULL),
(52, 7, 9, 'assigned', 1, NULL, NULL, NULL, NULL),
(53, 8, 10, 'assigned', 2, NULL, NULL, NULL, NULL),
(54, 9, 11, 'assigned', 1, NULL, NULL, NULL, NULL),
(55, 10, 12, 'assigned', 1, NULL, NULL, NULL, NULL),
(56, 4, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(57, 5, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(57, 6, 2, 'assigned', 1, NULL, NULL, NULL, NULL),
(58, 7, 15, 'assigned', 2, NULL, NULL, NULL, NULL),
(59, 8, 13, 'assigned', 1, NULL, NULL, NULL, NULL),
(60, 9, 4, 'assigned', 1, NULL, NULL, NULL, NULL),
(61, 10, 5, 'assigned', 1, NULL, NULL, NULL, NULL),
(62, 4, 6, 'assigned', 2, NULL, NULL, NULL, NULL),
(63, 5, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(64, 6, 3, 'assigned', 1, NULL, NULL, NULL, NULL),
(65, 7, 8, 'assigned', 1, NULL, NULL, NULL, NULL),
(66, 8, 9, 'assigned', 2, NULL, NULL, NULL, NULL),
(67, 9, 10, 'assigned', 1, NULL, NULL, NULL, NULL),
(68, 10, 11, 'assigned', 1, NULL, NULL, NULL, NULL),
(69, 4, 12, 'assigned', 1, NULL, NULL, NULL, NULL),
(70, 5, 1, 'assigned', 2, NULL, NULL, NULL, NULL),
(71, 6, 2, 'assigned', 1, NULL, NULL, NULL, NULL),
(72, 7, 15, 'assigned', 1, NULL, NULL, NULL, NULL),
(104, 8, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(105, 9, 15, 'assigned', 1, NULL, NULL, NULL, NULL),
(106, 10, 6, 'assigned', 2, NULL, NULL, NULL, NULL),
(107, 4, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(108, 5, 2, 'assigned', 1, NULL, NULL, NULL, NULL),
(109, 6, 4, 'assigned', 1, NULL, NULL, NULL, NULL),
(110, 7, 5, 'assigned', 2, NULL, NULL, NULL, NULL),
(111, 8, 9, 'assigned', 1, NULL, NULL, NULL, NULL),
(112, 9, 10, 'assigned', 1, NULL, NULL, NULL, NULL),
(113, 10, 11, 'assigned', 1, NULL, NULL, NULL, NULL),
(114, 4, 12, 'assigned', 2, NULL, NULL, NULL, NULL),
(115, 5, 7, 'assigned', 1, NULL, NULL, NULL, NULL),
(116, 6, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(117, 7, 13, 'assigned', 1, NULL, NULL, NULL, NULL),
(118, 8, 8, 'assigned', 2, NULL, NULL, NULL, NULL),
(119, 9, 15, 'assigned', 1, NULL, NULL, NULL, NULL),
(120, 10, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(121, 4, 6, 'assigned', 1, NULL, NULL, NULL, NULL),
(122, 5, 3, 'assigned', 2, NULL, NULL, NULL, NULL),
(123, 6, 4, 'assigned', 1, NULL, NULL, NULL, NULL),
(124, 7, 5, 'assigned', 1, NULL, NULL, NULL, NULL),
(125, 8, 9, 'assigned', 2, NULL, NULL, NULL, NULL),
(126, 9, 10, 'assigned', 1, NULL, NULL, NULL, NULL),
(127, 10, 11, 'assigned', 1, NULL, NULL, NULL, NULL),
(128, 4, 12, 'assigned', 2, NULL, NULL, NULL, NULL),
(129, 5, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(130, 6, 1, 'assigned', 1, NULL, NULL, NULL, NULL),
(130, 7, 2, 'assigned', 1, NULL, NULL, NULL, NULL);
-- ============================================


-- SUMMARY STATISTICS
-- ============================================
SELECT 'Database populated successfully!' AS status;

SELECT 
    'Total Users' AS metric,
    COUNT(*) AS count
FROM users
UNION ALL
SELECT 'Customers', COUNT(*) FROM users WHERE role = 'customer'
UNION ALL
SELECT 'Mechanics', COUNT(*) FROM users WHERE role = 'mechanic'
UNION ALL
SELECT 'Admins', COUNT(*) FROM users WHERE role = 'admin'
UNION ALL
SELECT 'Total Vehicles', COUNT(*) FROM vehicles
UNION ALL
SELECT 'Total Services', COUNT(*) FROM services
UNION ALL
SELECT 'Total Appointments', COUNT(*) FROM appointments
UNION ALL
SELECT 'Completed Appointments', COUNT(*) FROM appointments WHERE status = 'completed'
UNION ALL
SELECT 'In-Progress Appointments', COUNT(*) FROM appointments WHERE status = 'in-progress'
UNION ALL
SELECT 'Confirmed Appointments', COUNT(*) FROM appointments WHERE status = 'confirmed'
UNION ALL
SELECT 'Pending Appointments', COUNT(*) FROM appointments WHERE status = 'pending'
UNION ALL
SELECT 'Cancelled Appointments', COUNT(*) FROM appointments WHERE status = 'cancelled'
UNION ALL
SELECT 'Total Tasks', COUNT(*) FROM tasks
UNION ALL
SELECT 'Completed Tasks', COUNT(*) FROM tasks WHERE status = 'completed'
UNION ALL
SELECT 'In-Progress Tasks', COUNT(*) FROM tasks WHERE status = 'in-progress'
UNION ALL
SELECT 'Assigned Tasks', COUNT(*) FROM tasks WHERE status = 'assigned';
-- ============================================