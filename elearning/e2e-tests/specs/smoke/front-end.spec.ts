import { test, expect } from '@playwright/test';
import { getPageError } from '../../utils';

test.describe( 'Front end', () => {
	test( 'homepage loads without PHP errors', async ( { page } ) => {
		const response = await page.goto( '/' );

		expect( response?.ok() ).toBeTruthy();
		expect( await getPageError( page ) ).toBeNull();
	} );

	test( 'homepage is served by the elearning theme', async ( { page } ) => {
		await page.goto( '/' );

		// Sanity check the theme's stylesheet is actually enqueued.
		const themeStylesheet = page.locator(
			'link[rel="stylesheet"][href*="/wp-content/themes/elearning/"]'
		);
		await expect( themeStylesheet.first() ).toHaveCount( 1 );
	} );

	test( 'a sample page renders without PHP errors', async ( { page, request, baseURL } ) => {
		const pages = await request
			.get( `${ baseURL }/wp-json/wp/v2/pages?per_page=1` )
			.then( ( res ) => res.json() );

		test.skip( ! pages?.length, 'No published pages to test against.' );

		const response = await page.goto( pages[ 0 ].link );

		expect( response?.ok() ).toBeTruthy();
		expect( await getPageError( page ) ).toBeNull();
	} );
} );
