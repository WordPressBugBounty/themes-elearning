import { test as setup } from '@playwright/test';
import { createURL, isCurrentURL } from './utils';

const authFile = 'playwright/.auth/user.json';

setup( 'authenticate', async ( { page } ) => {
	let isLoggedIn = false;
	await page
		.context()
		.cookies()
		.then( ( cookies ) => {
			isLoggedIn = cookies.some( ( cookie ) =>
				cookie.name.startsWith( 'wordpress_logged_in_' )
			);
		} );

	if ( ! isLoggedIn ) {
		if ( ! isCurrentURL( page, 'wp-login.php' ) ) {
			await page.goto( createURL( 'wp-login.php' ) );
		}

		await page.fill( '#user_login', process.env.WP_USERNAME || 'admin' );
		await page.fill(
			'#user_pass',
			process.env.WP_PASSWORD || 'password'
		);

		// Don't wait for an exact '**/wp-admin/' URL: a plugin (e.g. Masteriyo,
		// right after its own activation) can redirect the post-login landing
		// page elsewhere, which would hang this wait indefinitely. Instead,
		// just wait for the login form to navigate away, then confirm we
		// actually ended up authenticated by re-visiting /wp-admin/ directly.
		await Promise.all( [
			page.waitForURL( ( url ) => ! url.pathname.includes( 'wp-login.php' ) ),
			page.click( '#wp-submit' ),
		] );

		if ( ! isCurrentURL( page, 'wp-admin/' ) ) {
			await page.goto( createURL( 'wp-admin/' ) );
		}

		if ( isCurrentURL( page, 'wp-login.php' ) ) {
			throw new Error(
				'Authentication failed: still on wp-login.php after submitting credentials.'
			);
		}
	}

	await page.context().storageState( { path: authFile } );
} );
