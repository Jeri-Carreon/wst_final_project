# Copilot Instructions for AI Agents

## Project Overview
- This is a CodeIgniter 4 PHP web application.
- The entry point is `public/index.php`. All web requests should be routed through the `public/` directory for security.
- Application logic is in `app/` (Controllers, Models, Views, Config, etc.).
- Framework code is in `system/`. Do not modify files here.
- User-uploaded and runtime files are in `writable/`.

## Key Patterns & Conventions
- Controllers: `app/Controllers/` (e.g., `Home.php`). Each controller extends `BaseController`.
- Views: `app/Views/`. Use PHP templates for rendering.
- Models: `app/Models/`. Use for database access and business logic.
- Configuration: `app/Config/` (e.g., `Routes.php`, `App.php`).
- Routing: Define routes in `app/Config/Routes.php`.
- Session and authentication logic is typically handled in controllers using `session()` helper.
- Return types: Controller methods may return `string` (view) or a `Response` object (redirect, etc.). Remove strict return types if returning a redirect.

## Developer Workflows
- Use `composer` for dependency management (`composer.json`).
- Run tests with PHPUnit: `vendor/bin/phpunit` (config: `phpunit.xml.dist`).
- Place test files in `tests/`.
- For local development, use XAMPP or similar to serve the `public/` directory.

## Integration & External Dependencies
- Uses standard CodeIgniter 4 libraries and helpers.
- No custom external service integrations detected in the base structure.

## Examples
- Controller redirect:
  ```php
  // Remove ': string' if returning a redirect
  public function index() {
      if (session()->get('isLoggedIn')) {
          return redirect()->to('/home');
      }
      return redirect()->to('/login');
  }
  ```
- View rendering:
  ```php
  public function aboutUs() {
      return view('aboutUs');
  }
  ```

## Do Not
- Do not edit files in `system/`.
- Do not expose the project root to the web; always serve from `public/`.

## References
- See `README.md` for framework/server requirements and setup.
- See CodeIgniter 4 [User Guide](https://codeigniter.com/user_guide/) for framework details.
