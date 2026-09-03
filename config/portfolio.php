<?php

// All portfolio content lives here, sourced from Mohamed Shaban's CV.
// Edit this file to update the site — every view pulls from this single source.

return [

    'name' => 'Mohamed Shaban',
    'initials' => 'MS',
    'roles' => [
        'Senior Software Engineer',
        'Backend / Full-Stack Engineer',
        'Application Security',
    ],
    'location' => 'Giza, Egypt',
    'email' => 'mohamedgmshaban@gmail.com',
    'phone' => '+20 114 310 4499',
    'resume' => 'Mohamed-Shaban-CV.pdf',
    'available' => true,

    'social' => [
        [
            'label' => 'LinkedIn',
            'url' => 'https://linkedin.com/in/mohamed-shaban-581ba9274',
            'handle' => 'in/mohamed-shaban',
        ],
        [
            'label' => 'GitHub',
            'url' => 'https://github.com/mohamedgitshaban',
            'handle' => 'mohamedgitshaban',
        ],
    ],

    'summary' => "Senior Software Engineer with 4+ years of experience building scalable backend and full-stack applications using PHP, Laravel, React, REST APIs, MySQL, and Redis, across ERP, insurance, payment, e-commerce, HR, logistics, and real-time systems. Hands-on application-security practitioner: independently investigated and remediated a full gray-box penetration test covering both the Tenant and Super Admin portals of an insurance platform, fixing multiple Critical and High findings spanning broken access control, business logic, session management, and rate limiting. Currently deepening expertise in Java, Spring Boot, distributed systems, system design, and cloud engineering (IBM-certified in Java).",

    'stats' => [
        ['value' => 4, 'suffix' => '+', 'label' => 'Years of Experience'],
        ['value' => 7, 'suffix' => '', 'label' => 'Pentest Findings Fixed'],
        ['value' => 7, 'suffix' => '', 'label' => 'Flagship Projects Shipped'],
        ['value' => 3, 'suffix' => '', 'label' => 'Certifications Earned'],
    ],

    'skills' => [
        [
            'group' => 'Backend',
            'items' => ['PHP', 'Laravel', 'Java', 'Spring Boot', 'REST APIs', 'Queues', 'Webhooks', 'Authentication', 'Authorization'],
        ],
        [
            'group' => 'Frontend',
            'items' => ['React.js', 'Next.js', 'JavaScript', 'HTML5', 'CSS3', 'Tailwind CSS', 'Bootstrap', 'Material UI'],
        ],
        [
            'group' => 'Database',
            'items' => ['MySQL', 'SQL', 'Database Design', 'Query Optimization', 'Redis', 'Caching', 'Transactions'],
        ],
        [
            'group' => 'Architecture',
            'items' => ['OOP', 'SOLID', 'Design Patterns', 'System Design', 'Distributed Systems', 'Microservices', 'Idempotency'],
        ],
        [
            'group' => 'Cloud & DevOps',
            'items' => ['AWS S3', 'Docker', 'Linux', 'CI/CD', 'Object Storage', 'Deployment'],
        ],
        [
            'group' => 'Application Security',
            'items' => ['OWASP Top 10', 'Broken Access Control', 'RBAC', 'API Security', 'JWT & Session Hardening', 'Rate-Limiting Design', 'Secrets Management', 'Vulnerability Triage'],
        ],
        [
            'group' => 'Tools',
            'items' => ['Git/GitHub', 'Composer', 'npm', 'PHPUnit', 'Fawry', 'BayMob', 'Google Routes', 'Firebase', 'Twilio'],
        ],
    ],

    // Flat, de-duplicated list used for the marquee ticker.
    'stack_ticker' => [
        'PHP', 'Laravel', 'Java', 'Spring Boot', 'React.js', 'Next.js', 'MySQL', 'Redis',
        'AWS S3', 'Docker', 'REST APIs', 'OWASP Top 10', 'RBAC', 'JWT',
        'System Design', 'Distributed Systems', 'Microservices',
    ],

    'experience' => [
        [
            'role' => 'Senior PHP Developer',
            'company' => 'Dafa',
            'location' => 'Cairo, Egypt',
            'period' => 'Oct 2024 – Present',
            'current' => true,
            'points' => [
                'Lead backend development using PHP, Laravel, MySQL, Redis, REST APIs, queues, and third-party integrations for insurance, payment, wallet, logistics, and digital-asset workflows.',
                'Served as the primary developer responding to an external gray-box penetration test of the Tenant and Super Admin portals; triaged and remediated 2 Critical, 2 High, 3 Medium and multiple Low/Informational findings.',
                'Closed a Critical broken-access-control gap exposing payment-gateway credentials by enforcing server-side, role-based authorization and removing secrets from API responses.',
                'Fixed a High-severity self-role-modification flaw, closing a privilege-escalation path to Super Admin.',
                'Resolved a High-severity business-logic flaw that let negative claim amounts bypass annual coverage limits.',
                'Secured a publicly-listable object storage bucket (Critical) by disabling directory listing and enforcing authenticated, time-limited access.',
                'Redesigned rate-limiting to fix a shared-IP/proxy misconfiguration and an IP-rotation bypass, moving to per-account throttling.',
                'Hardened session management: shortened JWT lifetimes, added HttpOnly/Secure/SameSite cookies, enforced session invalidation on password change.',
                'Manage AWS S3/object storage and Dockerized environments; optimize queries, indexing, caching, and async processing.',
            ],
        ],
        [
            'role' => 'PHP Developer',
            'company' => 'STARON Egypt',
            'location' => 'Cairo, Egypt',
            'period' => 'Jul 2023 – Sep 2024',
            'current' => false,
            'points' => [
                'Developed ERP, e-commerce, payment, and logistics systems using Laravel, PHP, MySQL, and React.',
                'Built dashboards, REST APIs, payment workflows, and real-time mobile synchronization.',
            ],
        ],
        [
            'role' => 'Full Stack Developer',
            'company' => 'RSTAR',
            'location' => 'Cairo, Egypt',
            'period' => 'Jun 2022 – Jun 2023',
            'current' => false,
            'points' => [
                'Developed Laravel backend systems and REST APIs with optimized MySQL database schemas.',
                'Built React interfaces and integrated frontend applications with backend services.',
            ],
        ],
        [
            'role' => 'Software Instructor',
            'company' => 'ITSHARE',
            'location' => 'Cairo, Egypt',
            'period' => 'Dec 2021 – Jun 2022',
            'current' => false,
            'points' => [
                'Delivered practical training in HTML, CSS, JavaScript, React, PHP, Laravel, and Spring Boot.',
                'Guided students in developing full-stack applications and applying OOP, databases, REST APIs, and debugging practices.',
            ],
        ],
    ],

    // A dedicated spotlight on the penetration-test remediation work.
    'security' => [
        'title' => 'Wathiqaty — Insurance Platform',
        'subtitle' => 'End-to-end remediation of an external gray-box penetration test',
        'description' => 'Owned end-to-end remediation of a gray-box penetration test covering the Tenant Dashboard and Super Admin Portal — insurance providers, tenants, admins, customers, policies, claims, payments, eKYC, documents, and e-signatures. Coordinated verification with the security vendor and tracked remediation status per finding.',
        'counters' => [
            ['value' => 2, 'label' => 'Critical'],
            ['value' => 2, 'label' => 'High'],
            ['value' => 3, 'label' => 'Medium'],
        ],
        'findings' => [
            [
                'title' => 'Broken Access Control',
                'detail' => 'Low-privileged users could view third-party payment-gateway credentials — fixed with server-side, role-based authorization and secret removal from client responses.',
            ],
            [
                'title' => 'Privilege Escalation',
                'detail' => 'A self-role-modification flaw allowed elevation to Super Admin — closed with server-side role/permission checks.',
            ],
            [
                'title' => 'Business Logic Flaw',
                'detail' => 'Negative claim amounts could bypass annual coverage limits — resolved with strict server-side validation.',
            ],
            [
                'title' => 'Exposed Object Storage',
                'detail' => 'A publicly-listable S3 bucket — secured by disabling directory listing and enforcing authenticated, time-limited access.',
            ],
            [
                'title' => 'Unauthenticated Endpoints',
                'detail' => 'APIs exposing PII, financial data, and an unauthenticated delete endpoint — locked down with auth and object-level authorization.',
            ],
            [
                'title' => 'Rate-Limiting Bypass',
                'detail' => 'Shared-IP/proxy misconfiguration enabling DoS and IP-rotation bypass — redesigned to per-account throttling.',
            ],
            [
                'title' => 'Session Hardening',
                'detail' => 'Shortened JWT lifetimes, added HttpOnly/Secure/SameSite cookies, enforced invalidation on password change.',
            ],
        ],
    ],

    // 'link' is left null for client/enterprise projects with no public URL —
    // the "Visit Live Project" button only renders when one is set.
    'projects' => [
        [
            'slug' => 'wathiqaty',
            'name' => 'Wathiqaty',
            'subtitle' => 'Insurance Platform — Application Security Remediation',
            'summary' => 'Owned remediation of a full gray-box pentest across an insurance platform\'s Tenant and Super Admin portals.',
            'description' => "Wathiqaty is a multi-tenant insurance platform spanning a Tenant Dashboard and a Super Admin Portal, covering insurance providers, tenants, admins, customers, policies, claims, payments, eKYC, documents, and e-signatures. When an external security vendor ran a gray-box penetration test across both portals, I was the primary engineer responsible for triaging and remediating every finding — from broken access control and privilege escalation to business-logic flaws, exposed object storage, and session-management gaps. I coordinated verification with the vendor and tracked remediation status finding-by-finding until sign-off.",
            'link' => 'https://sandbox.wathiqaty.com/ar/auth/login/individual',
            // Add real screenshot paths here (e.g. 'projects/wathiqaty/dashboard.png',
            // saved under public/) to replace the placeholder preview on the project page.
            'screenshots' => [],
            'stack' => ['Laravel', 'PHP', 'MySQL', 'REST APIs', 'RBAC', 'JWT', 'Rate Limiting'],
            'points' => [
                'Owned end-to-end remediation of an external gray-box penetration test across Tenant and Super Admin portals.',
                'Fixed Critical/High findings in authorization, object storage, business logic, session security, and rate limiting.',
                'Coordinated verification with the security vendor and tracked remediation status per finding through to sign-off.',
            ],
        ],
        [
            'slug' => 'maqsafy',
            'name' => 'Maqsafy',
            'subtitle' => 'Electronic Payment Platform · Saudi Arabia',
            'summary' => 'Wallet and payment-gateway platform integrating Moyasar, HyperPay, Mastercard, Apple Pay, and MADA.',
            'description' => 'Maqsafy is an electronic payment platform built for the Saudi market, handling wallets, transfers, deposits, withdrawals, commissions, refunds, reconciliation, school-fee collection, and order management. I integrated Moyasar, HyperPay, Mastercard, Apple Pay, and MADA for secure payment handling, and layered in scoped RBAC, background jobs, Laravel Excel exports, Firebase notifications, and AWS S3 storage — with ongoing database optimization to keep financial workflows fast and reliable at scale.',
            'link' => 'https://maqsafy.com/',
            'screenshots' => [],
            'stack' => ['Laravel', 'MySQL', 'Redis', 'Laravel Nova', 'Payment Gateways'],
            'points' => [
                'Built wallet and financial workflows: transfers, deposits, withdrawals, commissions, refunds, reconciliation.',
                'Integrated Moyasar, HyperPay, Mastercard, Apple Pay, and MADA with secure payment handling.',
                'Implemented scoped RBAC, background jobs, Laravel Excel exports, Firebase notifications, AWS S3 storage.',
            ],
        ],
        [
            'slug' => 'goway',
            'name' => 'Goway',
            'subtitle' => 'Ride-Hailing Platform',
            'summary' => 'Ride-hailing platform with real-time driver discovery and dynamic, surge-aware pricing.',
            'description' => 'Goway is a ride-hailing platform covering the full trip lifecycle — matching, live tracking, pricing, cancellation, wallets, and payments — built on Laravel 10. I implemented real-time driver discovery using geohashing with Redis and Ably/Reverb, and a dynamic pricing engine that factors in distance, traffic, tolls, coupons, and surge conditions.',
            'link' => 'https://www.gowayapps.com/',
            'screenshots' => [],
            'stack' => ['Laravel 10', 'Redis', 'Ably/Reverb', 'Google Routes', 'Payments'],
            'points' => [
                'Developed REST APIs and full trip lifecycle: matching, live tracking, pricing, cancellation, wallets, payments.',
                'Real-time driver discovery via geohashing, Redis, and Ably/Reverb; dynamic pricing with surge factors.',
            ],
        ],
        [
            'slug' => 'rox-custody',
            'name' => 'ROX Custody Integration',
            'subtitle' => 'Secure Custody & Wallet Sync',
            'summary' => 'Secure wallet-sync integration with ROX Custody via webhooks and background jobs.',
            'description' => 'A secure REST API integration with ROX Custody, authenticated via API keys through reusable HTTP clients. Wallet state is kept in sync through inbound webhooks, with event logging, caching, optimized queries, and background jobs handling the asynchronous side of every transaction.',
            'link' => null,
            'screenshots' => [],
            'stack' => ['Laravel', 'REST APIs', 'Webhooks', 'Background Jobs'],
            'points' => [
                'Built secure REST API integration using API-key authentication and reusable HTTP clients.',
                'Implemented wallet synchronization through webhooks, event logging, caching, and background jobs.',
            ],
        ],
        [
            'slug' => 'staron-erp',
            'name' => 'STARON Egypt ERP',
            'subtitle' => 'ERP & E-Commerce System',
            'summary' => 'ERP and e-commerce system with real-time dashboards and mobile synchronization.',
            'description' => 'An ERP and e-commerce system for STARON Egypt covering payments, logistics, and internal dashboards, with real-time synchronization to a companion mobile app. Built on Laravel, React, and MySQL with a REST API at its core.',
            'link' => null,
            'screenshots' => [],
            'stack' => ['Laravel', 'React', 'MySQL', 'REST APIs'],
            'points' => [
                'Developed ERP and e-commerce functionality covering payments, logistics, dashboards, mobile sync.',
            ],
        ],
        [
            'slug' => 'staron-egypt-web',
            'name' => 'STARON Egypt',
            'subtitle' => 'Corporate Website — Full Frontend Build',
            'summary' => "STARON Egypt's public corporate website — designed and built the complete frontend.",
            'description' => "The public corporate website for STARON Egypt. I built the full frontend end to end — responsive layout, component structure, and styling — independently of the internal ERP system above, which is a separate, non-public admin platform.",
            'link' => 'https://staronegypt.com.eg/',
            'screenshots' => [],
            'stack' => ['HTML5', 'CSS3', 'JavaScript', 'Responsive Design'],
            'points' => [
                'Designed and built the complete public-facing frontend for STARON Egypt\'s corporate website.',
                'Implemented responsive, cross-device layouts and componentized, maintainable front-end structure.',
            ],
        ],
        [
            'slug' => 'agrigroup-hr',
            'name' => 'Agrigroup HR & Payroll',
            'subtitle' => 'HR & Payroll System',
            'summary' => 'HR and payroll system with QR-based employee lookup and automated payroll runs.',
            'description' => 'An HR and payroll system for Agrigroup covering employee management, attendance, deductions and additions, vacation and warning logs, and automated monthly payroll generation. QR-based employee lookup speeds up daily check-ins, backed by secure APIs, structured logging, and robust error handling.',
            'link' => null,
            'screenshots' => [],
            'stack' => ['Laravel', 'MySQL', 'REST APIs'],
            'points' => [
                'Built employee management, attendance, deductions/additions, vacation/warning logs, monthly payroll.',
                'Implemented QR-based employee lookup, secure APIs, logging, and error handling.',
            ],
        ],
    ],

    'education' => [
        [
            'degree' => 'Bachelor of Computer Science and Information',
            'school' => 'Cairo University',
            'location' => 'Cairo, Egypt',
            'period' => 'Nov 2017 – Jan 2022',
        ],
    ],

    'certifications' => [
        ['name' => 'IBM Java Programming Certificate', 'issuer' => 'IBM'],
        ['name' => 'Spring Boot', 'issuer' => 'Mahara-Tech'],
        ['name' => 'Mathematics for Machine Learning: Linear Algebra', 'issuer' => 'Imperial College London'],
    ],

    'languages' => [
        ['name' => 'Arabic', 'level' => 'Native'],
        ['name' => 'English', 'level' => 'Professional Working Proficiency'],
    ],

];
