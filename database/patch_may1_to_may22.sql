-- ============================================================
-- PATCH: New data from May 1 to May 22, 2026
-- Appointments start at ID 131, Tasks continue after existing
-- Run: mysql -u root -p vehicle_maintenance_db < patch_may1_to_may22.sql
-- ============================================================
USE vehicle_maintenance_db;

-- ============================================================
-- APPOINTMENTS (May 1 – May 22, 2026)
-- ============================================================
INSERT INTO appointments (customer_id, vehicle_id, appointment_date, appointment_time, status, total_amount, notes, created_by) VALUES

-- ── MAY 1 (completed) ──
(41, 29, '2026-05-01', '08:00:00', 'completed', 49.99,  'Oil change',                   1),   -- 131
(42, 30, '2026-05-01', '09:30:00', 'completed', 149.99, 'Brake pad replacement',         2),   -- 132
(43, 31, '2026-05-01', '11:00:00', 'completed', 89.99,  'Wheel alignment',               1),   -- 133
(44, 32, '2026-05-01', '13:30:00', 'completed', 29.99,  'Tire rotation',                 NULL), -- 134

-- ── MAY 2 (completed) ──
(45, 33, '2026-05-02', '08:30:00', 'completed', 129.99, 'Battery replacement',           1),   -- 135
(46, 34, '2026-05-02', '10:00:00', 'completed', 99.99,  'Coolant flush',                 2),   -- 136
(47, 35, '2026-05-02', '13:00:00', 'completed', 119.99, 'Spark plug replacement',        1),   -- 137
(48, 36, '2026-05-02', '15:00:00', 'completed', 79.99,  'Headlight restoration',         NULL), -- 138

-- ── MAY 3 (completed) ──
(49, 37, '2026-05-03', '08:00:00', 'completed', 49.99,  'Oil change',                   2),   -- 139
(50, 38, '2026-05-03', '10:30:00', 'completed', 89.99,  'Engine diagnostic',             1),   -- 140
(51, 39, '2026-05-03', '13:00:00', 'completed', 149.99, 'AC system service',             NULL), -- 141
(52, 40, '2026-05-03', '15:00:00', 'completed', 39.99,  'Air filter replacement',        1),   -- 142

-- ── MAY 4 (completed) ──
(53, 41, '2026-05-04', '08:30:00', 'completed', 179.99, 'Transmission fluid change',     2),   -- 143
(54, 42, '2026-05-04', '10:00:00', 'completed', 69.99,  'Full vehicle inspection',       1),   -- 144
(55, 43, '2026-05-04', '13:00:00', 'completed', 49.99,  'Oil change',                   NULL), -- 145
(56, 44, '2026-05-04', '15:00:00', 'completed', 59.99,  'Brake inspection',              1),   -- 146

-- ── MAY 5 (completed) ──
(57, 45, '2026-05-05', '08:00:00', 'completed', 149.99, 'Brake pad replacement',         2),   -- 147
(58, 46, '2026-05-05', '10:30:00', 'completed', 129.99, 'Battery replacement',           1),   -- 148
(59, 47, '2026-05-05', '13:00:00', 'completed', 29.99,  'Wiper blade replacement',       NULL), -- 149
(60, 48, '2026-05-05', '15:00:00', 'completed', 89.99,  'Wheel alignment',               1),   -- 150

-- ── MAY 6 (completed) ──
(61, 49, '2026-05-06', '08:30:00', 'completed', 99.99,  'Coolant flush',                2),   -- 151
(62, 50, '2026-05-06', '10:00:00', 'completed', 119.99, 'Spark plug replacement',        1),   -- 152
(63, 51, '2026-05-06', '13:30:00', 'completed', 49.99,  'Oil change',                   NULL), -- 153
(64, 52, '2026-05-06', '15:00:00', 'completed', 79.99,  'Headlight restoration',         1),   -- 154

-- ── MAY 7 TODAY (in-progress) ──
(65, 53, '2026-05-07', '08:00:00', 'in-progress', 49.99,  'Oil change',                 1),   -- 155
(66, 54, '2026-05-07', '09:30:00', 'in-progress', 149.99, 'Brake pad replacement',       2),   -- 156
(67, 55, '2026-05-07', '11:00:00', 'in-progress', 89.99,  'Engine diagnostic',           1),   -- 157
(68, 56, '2026-05-07', '13:00:00', 'in-progress', 119.99, 'Spark plug replacement',      NULL), -- 158
(69, 57, '2026-05-07', '14:30:00', 'in-progress', 39.99,  'Air filter replacement',      1),   -- 159

-- ── MAY 8 (confirmed) ──
(70, 58, '2026-05-08', '08:30:00', 'confirmed', 79.98,  'Oil change and tire rotation',  2),   -- 160
(71, 59, '2026-05-08', '10:00:00', 'confirmed', 129.99, 'Battery replacement',           1),   -- 161
(72, 60, '2026-05-08', '13:00:00', 'confirmed', 99.99,  'Coolant flush',                 NULL), -- 162
(73, 61, '2026-05-08', '15:00:00', 'confirmed', 149.99, 'AC system service',             1),   -- 163

-- ── MAY 9 (confirmed) ──
(74, 62, '2026-05-09', '08:00:00', 'confirmed', 89.99,  'Wheel alignment',              2),   -- 164
(75, 63, '2026-05-09', '10:30:00', 'confirmed', 49.99,  'Oil change',                   1),   -- 165
(76, 64, '2026-05-09', '13:00:00', 'confirmed', 179.99, 'Transmission fluid change',     NULL), -- 166
(77, 65, '2026-05-09', '15:00:00', 'confirmed', 69.99,  'Full vehicle inspection',       1),   -- 167

-- ── MAY 10 (confirmed) ──
(78, 66, '2026-05-10', '08:30:00', 'confirmed', 149.99, 'Brake pad replacement',         2),   -- 168
(79, 67, '2026-05-10', '10:00:00', 'confirmed', 49.99,  'Oil change',                   1),   -- 169
(80, 68, '2026-05-10', '13:30:00', 'confirmed', 89.99,  'Engine diagnostic',             NULL), -- 170

-- ── MAY 12 (confirmed) ──
(81, 69, '2026-05-12', '09:00:00', 'confirmed', 119.99, 'Spark plug replacement',        1),   -- 171
(82, 70, '2026-05-12', '11:00:00', 'confirmed', 129.99, 'Battery replacement',           2),   -- 172
(83, 71, '2026-05-12', '14:00:00', 'confirmed', 59.99,  'Brake inspection',              NULL), -- 173

-- ── MAY 13 (pending) ──
(84, 72, '2026-05-13', '08:30:00', 'pending', 49.99,  'Oil change',                     1),   -- 174
(85, 73, '2026-05-13', '10:00:00', 'pending', 99.99,  'Coolant flush',                  NULL), -- 175
(86, 74, '2026-05-13', '13:00:00', 'pending', 149.99, 'AC system service',               2),   -- 176
(87, 75, '2026-05-13', '15:00:00', 'pending', 39.99,  'Air filter replacement',          1),   -- 177

-- ── MAY 14 (pending) ──
(88, 76, '2026-05-14', '09:00:00', 'pending', 89.99,  'Wheel alignment',                2),   -- 178
(89, 77, '2026-05-14', '10:30:00', 'pending', 179.99, 'Transmission fluid change',       1),   -- 179
(90, 78, '2026-05-14', '13:00:00', 'pending', 149.99, 'Brake pad replacement',           NULL), -- 180
(91, 79, '2026-05-14', '15:00:00', 'pending', 129.99, 'Battery replacement',             1),   -- 181

-- ── MAY 15 (pending) ──
(92, 80, '2026-05-15', '08:30:00', 'pending', 79.98,  'Oil change and tire rotation',    2),   -- 182
(93, 81, '2026-05-15', '10:00:00', 'pending', 69.99,  'Full vehicle inspection',         1),   -- 183
(94, 82, '2026-05-15', '13:30:00', 'pending', 119.99, 'Spark plug replacement',          NULL), -- 184

-- ── MAY 16 (pending) ──
(95, 83, '2026-05-16', '09:00:00', 'pending', 49.99,  'Oil change',                     1),   -- 185
(96, 84, '2026-05-16', '11:00:00', 'pending', 89.99,  'Engine diagnostic',              2),   -- 186
(97, 85, '2026-05-16', '14:00:00', 'pending', 149.99, 'AC system service',               1),   -- 187

-- ── MAY 19 (pending) ──
(98,  86, '2026-05-19', '09:00:00', 'pending', 99.99,  'Coolant flush',                 NULL), -- 188
(99,  87, '2026-05-19', '10:30:00', 'pending', 149.99, 'Brake pad replacement',          1),   -- 189
(100, 88, '2026-05-19', '13:00:00', 'pending', 89.99,  'Wheel alignment',               2),   -- 190

-- ── MAY 20 (pending) ──
(101, 89, '2026-05-20', '08:30:00', 'pending', 179.99, 'Transmission fluid change',      1),   -- 191
(102, 90, '2026-05-20', '10:00:00', 'pending', 49.99,  'Oil change',                    NULL), -- 192
(103, 91, '2026-05-20', '13:00:00', 'pending', 129.99, 'Battery replacement',            2),   -- 193
(104, 92, '2026-05-20', '15:00:00', 'pending', 69.99,  'Full vehicle inspection',        1),   -- 194

-- ── MAY 21 (pending) ──
(105, 93, '2026-05-21', '09:00:00', 'pending', 119.99, 'Spark plug replacement',         NULL), -- 195
(106, 94, '2026-05-21', '10:30:00', 'pending', 39.99,  'Air filter replacement',         1),   -- 196
(107, 95, '2026-05-21', '13:00:00', 'pending', 149.99, 'Brake pad replacement',          2),   -- 197

-- ── MAY 22 (pending) ──
(108, 96, '2026-05-22', '09:00:00', 'pending', 49.99,  'Oil change',                    1),   -- 198
(109, 97, '2026-05-22', '10:30:00', 'pending', 89.99,  'Wheel alignment',               NULL), -- 199
(110, 98, '2026-05-22', '13:00:00', 'pending', 99.99,  'Coolant flush',                 2),   -- 200
(111, 99, '2026-05-22', '15:00:00', 'pending', 129.99, 'Battery replacement',            1);   -- 201
-- ============================================================


-- ============================================================
-- APPOINTMENT_SERVICES
-- ============================================================
INSERT INTO appointment_services (appointment_id, service_id, price) VALUES
-- May 1
(131, 1,  49.99),
(132, 4,  149.99),
(133, 6,  89.99),
(134, 2,  29.99),
-- May 2
(135, 5,  129.99),
(136, 9,  99.99),
(137, 10, 119.99),
(138, 14, 79.99),
-- May 3
(139, 1,  49.99),
(140, 11, 89.99),
(141, 12, 149.99),
(142, 7,  39.99),
-- May 4
(143, 8,  179.99),
(144, 15, 69.99),
(145, 1,  49.99),
(146, 3,  59.99),
-- May 5
(147, 4,  149.99),
(148, 5,  129.99),
(149, 13, 29.99),
(150, 6,  89.99),
-- May 6
(151, 9,  99.99),
(152, 10, 119.99),
(153, 1,  49.99),
(154, 14, 79.99),
-- May 7 in-progress
(155, 1,  49.99),
(156, 4,  149.99),
(157, 11, 89.99),
(158, 10, 119.99),
(159, 7,  39.99),
-- May 8
(160, 1,  49.99),
(160, 2,  29.99),
(161, 5,  129.99),
(162, 9,  99.99),
(163, 12, 149.99),
-- May 9
(164, 6,  89.99),
(165, 1,  49.99),
(166, 8,  179.99),
(167, 15, 69.99),
-- May 10
(168, 4,  149.99),
(169, 1,  49.99),
(170, 11, 89.99),
-- May 12
(171, 10, 119.99),
(172, 5,  129.99),
(173, 3,  59.99),
-- May 13
(174, 1,  49.99),
(175, 9,  99.99),
(176, 12, 149.99),
(177, 7,  39.99),
-- May 14
(178, 6,  89.99),
(179, 8,  179.99),
(180, 4,  149.99),
(181, 5,  129.99),
-- May 15
(182, 1,  49.99),
(182, 2,  29.99),
(183, 15, 69.99),
(184, 10, 119.99),
-- May 16
(185, 1,  49.99),
(186, 11, 89.99),
(187, 12, 149.99),
-- May 19
(188, 9,  99.99),
(189, 4,  149.99),
(190, 6,  89.99),
-- May 20
(191, 8,  179.99),
(192, 1,  49.99),
(193, 5,  129.99),
(194, 15, 69.99),
-- May 21
(195, 10, 119.99),
(196, 7,  39.99),
(197, 4,  149.99),
-- May 22
(198, 1,  49.99),
(199, 6,  89.99),
(200, 9,  99.99),
(201, 5,  129.99);
-- ============================================================


-- ============================================================
-- TASKS
-- ============================================================
INSERT INTO tasks (appointment_id, mechanic_id, service_id, status, assigned_by, started_at, completed_at, notes, work_description) VALUES

-- ── MAY 1 (completed) ──
(131, 4,  1,  'completed', 1, '2026-05-01 08:05:00', '2026-05-01 08:35:00', 'Oil change done',            'Synthetic oil, new filter'),
(132, 5,  4,  'completed', 2, '2026-05-01 09:35:00', '2026-05-01 11:00:00', 'Brake pads replaced',        'Ceramic pads front and rear'),
(133, 6,  6,  'completed', 1, '2026-05-01 11:05:00', '2026-05-01 12:00:00', 'Alignment complete',         'All four wheels aligned'),
(134, 7,  2,  'completed', 1, '2026-05-01 13:35:00', '2026-05-01 14:00:00', 'Tires rotated',              'Cross rotation pattern'),

-- ── MAY 2 (completed) ──
(135, 8,  5,  'completed', 1, '2026-05-02 08:35:00', '2026-05-02 09:00:00', 'Battery replaced',           '700 CCA installed, tested'),
(136, 9,  9,  'completed', 2, '2026-05-02 10:05:00', '2026-05-02 11:00:00', 'Coolant flushed',            'Fresh 50/50 coolant mix'),
(137, 10, 10, 'completed', 1, '2026-05-02 13:05:00', '2026-05-02 14:20:00', 'Spark plugs replaced',       'Iridium plugs, all 4 done'),
(138, 4,  14, 'completed', 1, '2026-05-02 15:05:00', '2026-05-02 15:50:00', 'Headlights restored',        'Both lenses polished clear'),

-- ── MAY 3 (completed) ──
(139, 5,  1,  'completed', 2, '2026-05-03 08:05:00', '2026-05-03 08:35:00', 'Oil service done',           'Standard synthetic oil'),
(140, 6,  11, 'completed', 1, '2026-05-03 10:35:00', '2026-05-03 11:15:00', 'Diagnostic complete',        'No fault codes found'),
(141, 7,  12, 'completed', 1, '2026-05-03 13:05:00', '2026-05-03 14:00:00', 'AC recharged',               'System pressure normal'),
(142, 8,  7,  'completed', 2, '2026-05-03 15:05:00', '2026-05-03 15:20:00', 'Air filter replaced',        'OEM filter installed'),

-- ── MAY 4 (completed) ──
(143, 9,  8,  'completed', 1, '2026-05-04 08:35:00', '2026-05-04 09:30:00', 'Trans fluid changed',        'Full synthetic ATF'),
(144, 10, 15, 'completed', 1, '2026-05-04 10:05:00', '2026-05-04 11:00:00', 'Full inspection done',       'All 50 points checked'),
(145, 4,  1,  'completed', 2, '2026-05-04 13:05:00', '2026-05-04 13:35:00', 'Oil change complete',        'Conventional oil used'),
(146, 5,  3,  'completed', 1, '2026-05-04 15:05:00', '2026-05-04 15:45:00', 'Brakes inspected',           'Pads at 50%, OK to go'),

-- ── MAY 5 (completed) ──
(147, 6,  4,  'completed', 2, '2026-05-05 08:05:00', '2026-05-05 09:30:00', 'Brake pads replaced',        'Front pads, new rotors'),
(148, 7,  5,  'completed', 1, '2026-05-05 10:35:00', '2026-05-05 11:00:00', 'Battery replaced',           '650 CCA, charging tested'),
(149, 8,  13, 'completed', 1, '2026-05-05 13:05:00', '2026-05-05 13:20:00', 'Wipers replaced',            'Premium silicone blades'),
(150, 9,  6,  'completed', 2, '2026-05-05 15:05:00', '2026-05-05 16:00:00', 'Alignment done',             'Camber and toe corrected'),

-- ── MAY 6 (completed) ──
(151, 10, 9,  'completed', 1, '2026-05-06 08:35:00', '2026-05-06 09:30:00', 'Coolant flush done',         'Clean system, no leaks'),
(152, 4,  10, 'completed', 1, '2026-05-06 10:05:00', '2026-05-06 11:20:00', 'Spark plugs done',           'All plugs replaced'),
(153, 5,  1,  'completed', 2, '2026-05-06 13:35:00', '2026-05-06 14:05:00', 'Oil changed',                'Synthetic blend oil'),
(154, 6,  14, 'completed', 1, '2026-05-06 15:05:00', '2026-05-06 15:50:00', 'Headlights restored',        'Clear finish achieved'),

-- ── MAY 7 TODAY (in-progress) ──
(155, 7,  1,  'in-progress', 1, '2026-05-07 08:05:00', NULL, 'Oil change in progress',     'Draining old oil now'),
(156, 8,  4,  'in-progress', 2, '2026-05-07 09:35:00', NULL, 'Brake job started',          'Front pads removed'),
(157, 9,  11, 'in-progress', 1, '2026-05-07 11:05:00', NULL, 'Running diagnostics',        'Scanning all ECU modules'),
(158, 10, 10, 'in-progress', 1, '2026-05-07 13:05:00', NULL, 'Replacing spark plugs',      '2 of 4 plugs done'),
(159, 4,  7,  'in-progress', 2, '2026-05-07 14:35:00', NULL, 'Air filter replacement',     'Removing old filter'),

-- ── MAY 8 (assigned - confirmed) ──
(160, 5,  1,  'assigned', 1, NULL, NULL, NULL, NULL),
(160, 6,  2,  'assigned', 1, NULL, NULL, NULL, NULL),
(161, 7,  5,  'assigned', 2, NULL, NULL, NULL, NULL),
(162, 8,  9,  'assigned', 1, NULL, NULL, NULL, NULL),
(163, 9,  12, 'assigned', 1, NULL, NULL, NULL, NULL),

-- ── MAY 9 (assigned - confirmed) ──
(164, 10, 6,  'assigned', 2, NULL, NULL, NULL, NULL),
(165, 4,  1,  'assigned', 1, NULL, NULL, NULL, NULL),
(166, 5,  8,  'assigned', 1, NULL, NULL, NULL, NULL),
(167, 6,  15, 'assigned', 1, NULL, NULL, NULL, NULL),

-- ── MAY 10 (assigned - confirmed) ──
(168, 7,  4,  'assigned', 2, NULL, NULL, NULL, NULL),
(169, 8,  1,  'assigned', 1, NULL, NULL, NULL, NULL),
(170, 9,  11, 'assigned', 1, NULL, NULL, NULL, NULL),

-- ── MAY 12 (assigned - confirmed) ──
(171, 10, 10, 'assigned', 1, NULL, NULL, NULL, NULL),
(172, 4,  5,  'assigned', 2, NULL, NULL, NULL, NULL),
(173, 5,  3,  'assigned', 1, NULL, NULL, NULL, NULL),

-- ── MAY 13 (assigned - pending) ──
(174, 6,  1,  'assigned', 1, NULL, NULL, NULL, NULL),
(175, 7,  9,  'assigned', 2, NULL, NULL, NULL, NULL),
(176, 8,  12, 'assigned', 1, NULL, NULL, NULL, NULL),
(177, 9,  7,  'assigned', 1, NULL, NULL, NULL, NULL),

-- ── MAY 14 (assigned - pending) ──
(178, 10, 6,  'assigned', 2, NULL, NULL, NULL, NULL),
(179, 4,  8,  'assigned', 1, NULL, NULL, NULL, NULL),
(180, 5,  4,  'assigned', 1, NULL, NULL, NULL, NULL),
(181, 6,  5,  'assigned', 2, NULL, NULL, NULL, NULL),

-- ── MAY 15 (assigned - pending) ──
(182, 7,  1,  'assigned', 1, NULL, NULL, NULL, NULL),
(182, 8,  2,  'assigned', 1, NULL, NULL, NULL, NULL),
(183, 9,  15, 'assigned', 2, NULL, NULL, NULL, NULL),
(184, 10, 10, 'assigned', 1, NULL, NULL, NULL, NULL),

-- ── MAY 16 (assigned - pending) ──
(185, 4,  1,  'assigned', 1, NULL, NULL, NULL, NULL),
(186, 5,  11, 'assigned', 2, NULL, NULL, NULL, NULL),
(187, 6,  12, 'assigned', 1, NULL, NULL, NULL, NULL),

-- ── MAY 19 (assigned - pending) ──
(188, 7,  9,  'assigned', 1, NULL, NULL, NULL, NULL),
(189, 8,  4,  'assigned', 2, NULL, NULL, NULL, NULL),
(190, 9,  6,  'assigned', 1, NULL, NULL, NULL, NULL),

-- ── MAY 20 (assigned - pending) ──
(191, 10, 8,  'assigned', 1, NULL, NULL, NULL, NULL),
(192, 4,  1,  'assigned', 2, NULL, NULL, NULL, NULL),
(193, 5,  5,  'assigned', 1, NULL, NULL, NULL, NULL),
(194, 6,  15, 'assigned', 1, NULL, NULL, NULL, NULL),

-- ── MAY 21 (assigned - pending) ──
(195, 7,  10, 'assigned', 2, NULL, NULL, NULL, NULL),
(196, 8,  7,  'assigned', 1, NULL, NULL, NULL, NULL),
(197, 9,  4,  'assigned', 1, NULL, NULL, NULL, NULL),

-- ── MAY 22 (assigned - pending) ──
(198, 10, 1,  'assigned', 2, NULL, NULL, NULL, NULL),
(199, 4,  6,  'assigned', 1, NULL, NULL, NULL, NULL),
(200, 5,  9,  'assigned', 1, NULL, NULL, NULL, NULL),
(201, 6,  5,  'assigned', 2, NULL, NULL, NULL, NULL);
-- ============================================================


-- ============================================================
-- VERIFICATION SUMMARY
-- ============================================================
SELECT 'Patch applied successfully! May 1-22 data added.' AS status;

SELECT
    'Appointments May 1-22'             AS metric, COUNT(*) AS count
FROM appointments WHERE appointment_date BETWEEN '2026-05-01' AND '2026-05-22'
UNION ALL
SELECT 'Completed (May 1-6)',           COUNT(*) FROM appointments WHERE status = 'completed'   AND appointment_date BETWEEN '2026-05-01' AND '2026-05-06'
UNION ALL
SELECT 'In-Progress (May 7)',           COUNT(*) FROM appointments WHERE status = 'in-progress' AND appointment_date = '2026-05-07'
UNION ALL
SELECT 'Upcoming confirmed+pending',    COUNT(*) FROM appointments WHERE status IN ('confirmed','pending') AND appointment_date > CURDATE()
UNION ALL
SELECT 'Assigned Tasks (Upcoming Maint)', COUNT(*) FROM tasks WHERE status = 'assigned'
UNION ALL
SELECT 'In-Progress Tasks',             COUNT(*) FROM tasks WHERE status = 'in-progress'
UNION ALL
SELECT 'Completed Tasks',               COUNT(*) FROM tasks WHERE status = 'completed';
-- ============================================================
