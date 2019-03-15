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
    test("Redirect to Venue", async () => {
        await page.goto(url);
        const REDIRECT_SELECTOR = '#about > div > div:nth-child(2) > div:nth-child(1) > div > a';
        await page.click(REDIRECT_SELECTOR);
        await page.waitForSelector('.navbar');

        const title = await page.title();
        expect(title).toBe("Venues");
    });
    test("Redirect to Entertainment Package", async () => {
        await page.goto(url);
        const REDIRECT_SELECTOR = '#about > div > div:nth-child(2) > div:nth-child(2) > div > a';
        await page.click(REDIRECT_SELECTOR);
        await page.waitForSelector('.navbar');

        const title = await page.title();
        expect(title).toBe("Entertainment Packages");
    });
    test("Redirect to Menu", async () => {
        await page.goto(url);
        const REDIRECT_SELECTOR = '#about > div > div:nth-child(2) > div:nth-child(3) > div > a';
        await page.click(REDIRECT_SELECTOR);
        await page.waitForSelector('.navbar');

        const title = await page.title();
        expect(title).toBe("Menus");
    });
})