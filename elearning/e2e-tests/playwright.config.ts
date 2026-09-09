import { defineConfig, devices } from '@playwright/test';

export default defineConfig( {
	globalSetup: require.resolve( './global-setup' ),
	testDir: '.',
	reporter: process.env.CI ? 'github' : 'list',
	forbidOnly: !! process.env.CI,
	workers: process.env.CI ? 2 : undefined,
	retries: process.env.CI ? 1 : 0,
	timeout: parseInt( process.env.TIMEOUT || '', 10 ) || 60_000,
	fullyParallel: true,
	projects: [
		// Setup project: authenticates once and stores the session for the other projects.
		{ name: 'setup', testMatch: /.*\.setup\.ts/ },

		{
			name: 'chromium',
			testMatch: /.*\.spec\.ts/,
			use: {
				...devices[ 'Desktop Chrome' ],
				storageState: 'playwright/.auth/user.json',
			},
			dependencies: [ 'setup' ],
		},
	],
	use: {
		baseURL: process.env.baseURL || 'http://localhost:8889',
		headless: true,
		ignoreHTTPSErrors: true,
		trace: 'retain-on-failure',
		screenshot: 'only-on-failure',
	},
} );
