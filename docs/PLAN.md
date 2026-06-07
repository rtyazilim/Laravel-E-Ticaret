# E-Commerce Backend Engine Plan

## DONE
- Database Migration for Products, Categories, Images, Carts, CartItems, Orders, OrderItems, Payments.
- Domain Models created for all entities.
- Product Module (Service, Controller, API Routes).
- Cart Module (Service, Controller, API Routes).
- Order Module (Service, Controller, API Routes).
- Payment Module (Service, Controller, API Routes).
- Modular Monolith architecture setup (app/Modules folder).
- Standardizing API JSON responses via `ApiResponse` wrapper class.
- Refactored all existing controllers to use standardized JSON response format.
- Implementing Auth Module (Sanctum based API login/register).
- Admin Module implementations (Dashboard stats endpoint).

## IN PROGRESS
- Database seeding and mock data generation for manual testing and UI connection.

## TODO
- Add Role-based authorization middleware usage across controllers (Admin vs Customer).
- Connect frontend Blade UI directly to API endpoints via internal calls or hydrate them via Blade directly.

## DATABASE CHANGES
- Added `categories`, `products`, `product_images`, `carts`, `cart_items`, `orders`, `order_items`, `payments` tables with foreign keys and soft deletes.

## API CHANGES
- Standardized JSON response structure implemented on all endpoints: `{ "success": true, "data": {}, "message": null }`
- Added `/api/auth/register`, `/api/auth/login`, `/api/auth/logout`.
- Added `/api/admin/stats` for overview KPIs.

## RISK ANALYSIS
- Payment init currently uses mock 90% logic, will need real provider integration later.
- UI layer (Blade components) currently not connected to the real DB. It needs to consume the Services or API endpoints.
