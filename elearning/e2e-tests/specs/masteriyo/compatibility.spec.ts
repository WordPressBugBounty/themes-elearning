import { test, expect } from '@playwright/test';
import { getPageError } from '../../utils';
import { removeThemeMod, setThemeMod, wpCli } from '../../wp-cli';
import { SAMPLE_COURSE_SLUG, SAMPLE_COURSE_TITLE } from '../../global-setup';

const COURSE_URL = `/course/${ SAMPLE_COURSE_SLUG }/`;

test.describe( 'Masteriyo LMS compatibility', () => {
	test( 'Masteriyo LMS plugin is active', async ( { request, baseURL } ) => {
		const response = await request.get( `${ baseURL }/wp-json/` );
		const body = await response.json();

		expect( Object.keys( body.namespaces || {} ).length ).toBeGreaterThan(
			0
		);
		expect( body.namespaces ).toContain( 'masteriyo/v1' );
	} );

	test( 'courses archive page loads without PHP errors and lists the course', async ( {
		page,
	} ) => {
		const response = await page.goto( '/courses/' );

		expect( response?.ok() ).toBeTruthy();
		expect( await getPageError( page ) ).toBeNull();
		await expect( page.getByText( SAMPLE_COURSE_TITLE ) ).toBeVisible();
	} );

	test( 'single course page loads without PHP errors', async ( {
		page,
	} ) => {
		const response = await page.goto( COURSE_URL );

		expect( response?.ok() ).toBeTruthy();
		expect( await getPageError( page ) ).toBeNull();
	} );

	test( "onboarding pages ('account', 'checkout') load without PHP errors", async ( {
		page,
		request,
		baseURL,
	} ) => {
		for ( const slug of [ 'account', 'checkout' ] ) {
			const pages = await request
				.get( `${ baseURL }/wp-json/wp/v2/pages?slug=${ slug }` )
				.then( ( res ) => res.json() );

			test.skip(
				! pages?.length,
				`No '${ slug }' page found — has Masteriyo::Activation::create_pages() run?`
			);

			const response = await page.goto( pages[ 0 ].link );
			expect( response?.ok() ).toBeTruthy();
			expect( await getPageError( page ) ).toBeNull();
		}
	} );

	test.describe( 'single course title de-duplication', () => {
		// These tests mutate a shared theme_mod on the one WordPress instance
		// backing the whole suite; run them one at a time to avoid one test's
		// setup/teardown racing another's.
		test.describe.configure( { mode: 'serial' } );

		// Regression coverage for a real bug: the theme used to remove
		// Masteriyo's own course title with a hardcoded action priority
		// (`remove_action( ..., 'masteriyo_single_course_title', 30 )`), but
		// Masteriyo has changed that priority across versions (25 in the
		// currently installed release), so the removal silently failed and
		// the title rendered twice whenever the theme's own page title was
		// enabled. See inc/compatibility/masteriyo/class-elearning-masteriyo.php.
		const themeTitle = ( page: import( '@playwright/test' ).Page ) =>
			page.locator( 'h1.tg-page-header__title' );
		const pluginTitle = ( page: import( '@playwright/test' ).Page ) =>
			page.locator( 'h1.masteriyo-course-title' );

		test( "theme's page title enabled: shows the course title exactly once (from the theme, not duplicated by Masteriyo)", async ( {
			page,
		} ) => {
			setThemeMod( 'elearning_enable_page_title', '1' );
			setThemeMod( 'elearning_page_title', 'page-header' );

			try {
				await page.goto( COURSE_URL );

				await expect( themeTitle( page ) ).toHaveCount( 1 );
				await expect( themeTitle( page ) ).toHaveText(
					SAMPLE_COURSE_TITLE
				);
				await expect( pluginTitle( page ) ).toHaveCount( 0 );
			} finally {
				removeThemeMod( 'elearning_enable_page_title' );
				removeThemeMod( 'elearning_page_title' );
			}
		} );

		test( "theme's page title disabled: falls back to Masteriyo's own course title", async ( {
			page,
		} ) => {
			setThemeMod( 'elearning_enable_page_title', '0' );

			try {
				await page.goto( COURSE_URL );

				await expect( themeTitle( page ) ).toHaveCount( 0 );
				await expect( pluginTitle( page ) ).toHaveCount( 1 );
				await expect( pluginTitle( page ) ).toHaveText(
					SAMPLE_COURSE_TITLE
				);
			} finally {
				removeThemeMod( 'elearning_enable_page_title' );
			}
		} );
	} );
} );

test.afterAll( () => {
	// Leave theme mods at their defaults for any other spec that runs after this one.
	wpCli( 'theme mod remove elearning_enable_page_title' );
	wpCli( 'theme mod remove elearning_page_title' );
} );
