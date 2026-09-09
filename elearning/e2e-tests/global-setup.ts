import { wpCli } from './wp-cli';

const SAMPLE_COURSE_TITLE = 'E2E Sample Course';
const SAMPLE_COURSE_SLUG = 'e2e-sample-course';

/**
 * One-time setup that runs before the whole Playwright suite.
 *
 * Activates the elearning theme and the Masteriyo LMS plugin, switches to
 * pretty permalinks (wp-env defaults to plain ones, which breaks the REST
 * API and Masteriyo's course routes), creates Masteriyo's default pages
 * (Courses, Account, Checkout, ...), and makes sure a sample course exists
 * so specs have real Masteriyo content to test against.
 */
export default function globalSetup() {
	wpCli( 'theme activate elearning' );
	wpCli( 'plugin activate learning-management-system' );

	// Masteriyo redirects the very next admin page load after a fresh
	// activation to its own onboarding wizard (index.php?page=masteriyo-onboard),
	// via a short-lived `_masteriyo_activation_redirect` transient (see
	// Masteriyo::admin_redirects()). That hijacks auth.setup.ts's post-login
	// navigation to /wp-admin/, so clear it out immediately after activation
	// to keep the environment deterministic for the rest of the suite.
	wpCli( 'transient delete _masteriyo_activation_redirect' );
	wpCli( 'option update masteriyo_first_time_activation_flag 1' );

	wpCli( "rewrite structure '/%postname%/' --hard" );

	// Masteriyo only creates its default pages (Courses, Account, Checkout, ...)
	// through its onboarding wizard/REST endpoints, not on plain activation.
	wpCli( 'eval "Masteriyo\\\\Activation::create_pages();"' );

	const existingCourseId = wpCli(
		`post list --post_type=mto-course --name=${ SAMPLE_COURSE_SLUG } --field=ID --format=ids`
	);

	if ( ! existingCourseId ) {
		wpCli(
			`post create --post_type=mto-course --post_title=${ JSON.stringify(
				SAMPLE_COURSE_TITLE
			) } --post_status=publish --post_excerpt=${ JSON.stringify(
				'Sample course created for e2e tests.'
			) }`
		);
	}

	wpCli( 'rewrite flush --hard' );
}

export { SAMPLE_COURSE_TITLE, SAMPLE_COURSE_SLUG };
