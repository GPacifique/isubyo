<?php

/**
 * Security Configuration Guide for isubyo
 * 
 * This file documents essential security practices for your Laravel application
 */

return [
    /*
    |--------------------------------------------------------------------------
    | Password Security
    |--------------------------------------------------------------------------
    |
    | Password requirements and validation rules
    |
    */
    'password' => [
        'min_length' => 8,
        'require_uppercase' => true,
        'require_numbers' => true,
        'require_special_chars' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Session Security
    |--------------------------------------------------------------------------
    |
    | Session configuration for secure cookie handling
    |
    */
    'session' => [
        'secure' => env('SESSION_SECURE', true), // HTTPS only
        'http_only' => true, // Prevent JavaScript access to session cookies
        'same_site' => 'lax', // CSRF protection
    ],

    /*
    |--------------------------------------------------------------------------
    | Rate Limiting
    |--------------------------------------------------------------------------
    |
    | Protect against brute force and DoS attacks
    |
    */
    'rate_limiting' => [
        'login_attempts' => 5, // Max login attempts
        'login_window' => 1, // Time window in minutes
        'api_requests' => 60, // Max API requests
        'api_window' => 1, // Time window in minutes
    ],

    /*
    |--------------------------------------------------------------------------
    | File Upload Security
    |--------------------------------------------------------------------------
    |
    | Restrict file uploads to safe types and sizes
    |
    */
    'uploads' => [
        'max_size' => 10 * 1024 * 1024, // 10MB
        'allowed_types' => [
            'image' => ['jpg', 'jpeg', 'png', 'gif', 'webp'],
            'document' => ['pdf', 'doc', 'docx', 'xls', 'xlsx'],
        ],
        'scan_for_malware' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | API Security
    |--------------------------------------------------------------------------
    |
    | Secure API endpoints
    |
    */
    'api' => [
        'require_authentication' => true,
        'token_expiry' => 24 * 60, // Minutes
        'refresh_token_expiry' => 30 * 24 * 60, // Minutes
    ],

    /*
    |--------------------------------------------------------------------------
    | Audit Logging
    |--------------------------------------------------------------------------
    |
    | Log security-sensitive actions
    |
    */
    'audit' => [
        'enabled' => true,
        'log_logins' => true,
        'log_failed_attempts' => true,
        'log_permission_changes' => true,
        'log_data_access' => true,
    ],
];
