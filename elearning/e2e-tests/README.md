# E2E tests

End-to-end tests for the eLearning theme, built with [Playwright](https://playwright.dev/) on top of [`@wordpress/env`](https://developer.wordpress.org/block-editor/reference-guides/packages/packages-env/) (`wp-env`). The setup mirrors the approach used by [Codeinwp/neve](https://github.com/Codeinwp/neve/tree/master/e2e-tests) (Playwright + an auth setup project + a shared `utils.ts`), adapted to use `wp-env` instead of a hand-rolled docker-compose stack, since this repo already builds with `@wordpress/scripts`.

`.wp-env.json` (repo root) spins up a WordPress instance with this theme mounted and the [Masteriyo LMS](https://wordpress.org/plugins/learning-management-system/) plugin installed, since the theme is built specifically for it.

## Running locally

Requires Docker to be running.

```bash
# start the wp-env environment (first run downloads WordPress + the plugin)
pnpm wp-env start

# install Playwright's browser binaries (first run only)
pnpm exec playwright install --with-deps chromium

# run the suite
pnpm test:e2e
```

Run a single spec:

```bash
pnpm test:e2e e2e-tests/specs/smoke/admin.spec.ts
```

Run with the browser UI visible for debugging:

```bash
pnpm exec playwright test --config e2e-tests/playwright.config.ts --headed
```

Stop the environment when done:

```bash
pnpm wp-env stop
```

## How it fits together

- **`global-setup.ts`** — runs once before the whole suite; activates the elearning theme and the Masteriyo LMS plugin via `wp-env run` so every spec starts from a known state.
- **`auth.setup.ts`** — a Playwright ["setup project"](https://playwright.dev/docs/auth) that logs in as the wp-env default admin (`admin` / `password`) and stores the session in `playwright/.auth/user.json`. Every other spec depends on this project and reuses that session instead of logging in per-test.
- **`utils.ts`** — small WordPress-flavored helpers (`createURL`, `visitAdminPage`, `getPageError`, ...).
- **`specs/smoke/`** — the current coverage: the front end renders without PHP errors and serves the theme's stylesheet, and the admin dashboard/Themes screen/Customizer load correctly with the theme active.

## Adding more coverage

Group new specs by concern under `specs/<area>/`, the same way Neve splits `customizer`, `admin`, `accessibility`, etc. Reuse `utils.ts` rather than re-implementing WP-specific helpers per spec file.
