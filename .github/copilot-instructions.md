# AI Agent Instructions for Disdukcapil Project

This guide provides essential knowledge for AI agents working with this CodeIgniter-based web application.

## Project Architecture

- **Framework**: CodeIgniter 3.x with MVC architecture
- **Entry Point**: `index.php` in root directory
- **Key Directories**:
  - `/application`: Core application code (controllers, models, views)
  - `/system`: CodeIgniter framework files (don't modify)
  - `/assets`: Static resources (CSS, JS, images)
  - `/upload`: User-uploaded content with specific subdirectories for different types

## Core Patterns

1. **Controller Convention**:
   - Extend `CI_Controller`
   - File/class names start with uppercase (e.g., `Home.php` -> `class Home`)
   - Methods map to URLs (e.g., `function index()` -> `/home/index`)

2. **View Template System**:
   ```php
   $this->template->load(template().'/template', template().'/view_name', $data);
   ```

3. **Database Access**:
   - Use Model classes extending `CI_Model`
   - Prefer using `model_utama` for common queries
   - Custom models for specific functionality

4. **URL/Route Management**:
   - URL format: `base_url/controller/method/param1/param2`
   - Routes configured in `application/config/routes.php`
   - Clean URLs enabled (no index.php)

## Development Workflow

1. **Local Setup**:
   - Requires XAMPP (Apache + MySQL)
   - Database config in `application/config/database.php`
   - Import `disdukca_master.sql` for initial database

2. **Key Integration Points**:
   - User authentication in `application/controllers/Auth.php`
   - File uploads handled through `/upload` directory
   - External API integrations configured in respective controllers

## Common Tasks

- **Adding New Pages**:
  1. Create controller in `application/controllers/`
  2. Create corresponding view in `application/views/`
  3. Add routes if needed in `routes.php`

- **File Upload Handling**:
  - Use appropriate upload directory under `/upload/`
  - Follow existing naming conventions in target directories

- **Database Operations**:
  - Use CI's Query Builder for consistency
  - Follow existing transaction patterns for data integrity

## Security Notes

- All controller files must include the BASEPATH check:
  ```php
  defined('BASEPATH') or exit('No direct script access allowed');
  ```
- Form validation should use CI's form validation library
- XSS protection enabled by default in `config.php`