import { test, expect } from '@playwright/test';
import { visitAdminPage } from '../../utils';

test.describe( 'Admin', () => {
	test( 'admin can access the dashboard', async ( { page } ) => {
		await visitAdminPage( page );

		await expect( page.locator( '#wpadminbar' ) ).toBeVisible();
	} );

	test( 'elearning theme is listed as active', async ( { page } ) => {
		await visitAdminPage( page, 'themes.php' );

		const activeTheme = page.locator( '.theme.active' );
		await expect( activeTheme ).toHaveCount( 1 );
		await expect( activeTheme ).toContainText( /eLearning/i );
	} );

	test( 'Customizer loads for the elearning theme without errors', async ( {
		page,
	} ) => {
		await visitAdminPage( page, 'customize.php' );

		await expect(
			page.locator( '#customize-controls' )
		).toBeVisible( { timeout: 30_000 } );
		await expect( page.locator( '#customize-preview iframe' ) ).toBeVisible();
	} );
} );
