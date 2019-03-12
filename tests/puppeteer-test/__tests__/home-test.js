const puppeteer = require('puppeteer');
const HEADLESS = true;
describe('Test UberKidz Home Page', () => {
	var browser, page;
    var url = 'http://localhost/index.php';
	let width = 1920;
	let height = 1080;
	beforeEach(async () => {
		browser = await puppeteer.launch({
            headless: HEADLESS
		});
		page = await browser.newPage();
		await page.setViewport({ width, height });
	})
	afterEach(() => {
		browser.close()
    });
	test('Title == Welcome to UberKidz!', async () => {
		await page.goto(url);
		const title = await page.title();
		expect(title).toBe("Welcome to UberKidz!");
	});
    test("Navbar Exist", async () => {
        await page.goto(url);
        const navbar = await page.$eval(".navbar", el => (el ? true : false));
        expect(navbar).toBe(true);
	});
	test("Get Started Redirection to Login", async () => {
		await page.goto(url);
		const GETSTARTED_SELECTOR = '#get_started';
		await page.click(GETSTARTED_SELECTOR);
		await page.waitForSelector('.navbar');

		const title = await page.title();
		expect(title).toBe("Login");

    });
})