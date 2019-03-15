const puppeteer = require('puppeteer');
const HEADLESS = true;
describe('Test UberKidz Navigation', () => {
    jest.setTimeout(30000);
    var browser, page;
    var url = 'http://localhost/index.php'
    let width = 1920;
    let height = 1080;
    beforeEach(async () => {
        browser = await puppeteer.launch({
            headless: HEADLESS
        });
        page = await browser.newPage();
        await page.setViewport({
            width,
            height
        });
    })
    afterEach(() => {
        browser.close()
    });
    test('Home Page', async () => {
        await page.goto(url);
        const title = await page.title();
        expect(title).toBe("Welcome to UberKidz!");
    });
    test("Navbar Exist", async () => {
        await page.goto(url);
        const navbar = await page.$eval(".navbar", el => (el ? true : false));
        expect(navbar).toBe(true);
    });
    test("Redirect to Login", async () => {
        await page.goto(url);
        const LOGIN_SELECTOR = '#navbarToggler > ul.navbar-nav.mr-auto.mt-2.mt-lg-0 > li:nth-child(2) > a';
        await page.click(LOGIN_SELECTOR);
        await page.waitForSelector('.navbar');
        const title = await page.title();
        expect(title).toBe("Login");
    })
    test("Redirect to Venues", async () => {
        await page.goto(url);
        const VENUE_SELECTOR = '#navbarToggler > ul.navbar-nav.mr-auto.mt-2.mt-lg-0 > li:nth-child(3) > a';
        await page.click(VENUE_SELECTOR);
        await page.waitForSelector('.navbar');
        const title = await page.title();
        expect(title).toBe("Venues");
    });
    test("Redirect to Entertainment Packages", async () => {
        await page.goto(url);
        const ENTERTAINMENT_SELECTOR = '#navbarToggler > ul.navbar-nav.mr-auto.mt-2.mt-lg-0 > li:nth-child(4) > a';
        await page.click(ENTERTAINMENT_SELECTOR);
        await page.waitForSelector('.navbar');
        const title = await page.title();
        expect(title).toBe("Entertainment Packages");
    });
    test("Redirect to Menus", async () => {
        await page.goto(url);
        const MENU_SELECTOR = '#navbarToggler > ul.navbar-nav.mr-auto.mt-2.mt-lg-0 > li:nth-child(5) > a';
        await page.click(MENU_SELECTOR);
        await page.waitForSelector('.navbar');
        const title = await page.title();
        expect(title).toBe("Menus");
    });
    test("Redirect to Contact Us", async () => {
        await page.goto(url);
        const MENU_SELECTOR = '#navbarToggler > ul.navbar-nav.mr-auto.mt-2.mt-lg-0 > li:nth-child(6) > a';
        await page.click(MENU_SELECTOR);
        await page.waitForSelector('.navbar');
        const title = await page.title();
        expect(title).toBe("Contact Us");
    });
    test("Redirect to FAQ Page", async () => {
        await page.goto(url);
        const MENU_SELECTOR = '#navbarToggler > ul.navbar-nav.mr-auto.mt-2.mt-lg-0 > li:nth-child(7) > a';
        await page.click(MENU_SELECTOR);
        await page.waitForSelector('.navbar');
        const title = await page.title();
        expect(title).toBe("FAQ Page");
    });
});