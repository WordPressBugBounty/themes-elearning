import { execSync } from 'child_process';

/**
 * Runs a `wp` command inside the wp-env CLI container used for e2e tests
 * and returns its trimmed stdout. wp-env prints its own status lines
 * ("Starting '...'", "Success: ..." etc.) alongside the command's real
 * output, so wrap output-producing commands with `--format=ids`, `--field`,
 * `--porcelain`, etc. and pick the last non-empty, non-status line.
 *
 * @param {string} command wp-cli command, without the leading "wp".
 * @return {string} Trimmed output of the command.
 */
export function wpCli( command: string ): string {
	const output = execSync( `npx wp-env run tests-cli -- wp ${ command }`, {
		encoding: 'utf8',
	} );

	const lines = output
		.split( '\n' )
		.map( ( line ) => line.trim() )
		.filter( Boolean )
		.filter( ( line ) => ! /^(ℹ|✔|✖)/.test( line ) );

	return lines.length ? lines[ lines.length - 1 ] : '';
}

/**
 * Sets a theme_mod on the elearning theme for the duration of a test.
 *
 * @param {string} name  Theme mod name.
 * @param {string} value Theme mod value.
 */
export function setThemeMod( name: string, value: string ) {
	wpCli( `theme mod set ${ name } ${ JSON.stringify( value ) }` );
}

/**
 * Removes a theme_mod, restoring the theme's default value for it.
 *
 * @param {string} name Theme mod name.
 */
export function removeThemeMod( name: string ) {
	wpCli( `theme mod remove ${ name }` );
}
