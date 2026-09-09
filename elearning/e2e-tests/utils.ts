import { posix } from 'path';
import { Page } from '@playwright/test';

/**
 * Creates a full URL by joining the base URL, a WP path and an optional query string.
 *
 * @param {string} WPPath String to be serialized as pathname.
 * @param {string} query  String to be serialized as the query portion of the URL.
 * @return {string} The full URL.
 */
export function createURL( WPPath: string, query = '' ) {
	const currentUrl = process.env.baseURL || 'http://localhost:8889';
	const url = new URL( currentUrl );

	url.pathname = posix.join( url.pathname, WPPath );
	url.search = query;
	return url.href;
}

/**
 * Checks whether the page's current URL matches the given WP path.
 *
 * @param {Page}   page   Playwright page.
 * @param {string} WPPath String to be serialized as pathname.
 * @param {string} query  String to be serialized as the query portion of the URL.
 * @return {boolean} Whether the current URL matches.
 */
export function isCurrentURL( page: Page, WPPath: string, query = '' ) {
	const currentURL = new URL( page.url() );

	currentURL.search = query;

	return createURL( WPPath, query ) === currentURL.href;
}

/**
 * Regular expression matching a displayed PHP error within a markup string.
 *
 * @see https://github.com/php/php-src/blob/598175e/main/main.c#L1257-L1297
 */
const REGEXP_PHP_ERROR =
	/(<b>)?(Fatal error|Recoverable fatal error|Warning|Parse error|Notice|Strict Standards|Deprecated|Unknown error)(<\/b>)?: (.*?) in (.*?) on line (<b>)?\d+(<\/b>)?/;

/**
 * Returns a string if a PHP error is present in the page content, or null otherwise.
 *
 * @param {Page} page Playwright page.
 * @return {Promise<string|null>} The matched error, or null.
 */
export async function getPageError( page: Page ): Promise< string | null > {
	const content = await page.content();
	const match = content.match( REGEXP_PHP_ERROR );
	return match ? match[ 0 ] : null;
}

/**
 * Navigates to an admin page, following a login redirect if necessary.
 *
 * @param {Page}   page      Playwright page.
 * @param {string} adminPath Path relative to /wp-admin/.
 * @param {string} query     Query string.
 */
export async function visitAdminPage(
	page: Page,
	adminPath = '',
	query = ''
) {
	const url = createURL( posix.join( 'wp-admin', adminPath ), query );
	await page.goto( url );

	if ( isCurrentURL( page, 'wp-login.php' ) ) {
		throw new Error(
			'Not authenticated: expected an authenticated session (did the auth setup project run?)'
		);
	}

	const error = await getPageError( page );
	if ( error ) {
		throw new Error( 'Unexpected error in page content: ' + error );
	}
}
